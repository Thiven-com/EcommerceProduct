<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\FreightCharge;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\ShippingZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use RealRashid\SweetAlert\Facades\Alert;


class OrderController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'address_id' => 'required|integer',
            'payment_method' => 'required|in:cod,online_payment',
            'coupon_code' => 'nullable|string|max:100',
            'order_type' => 'nullable|string|max:50',
        ]);

        $userId = Auth::guard('customer')->id();

        if (!$userId) {
            Alert::toast('Please login to continue.', 'warning');
            return redirect()->route('login');
        }

        $user = Customer::find($userId);

        if (!$user) {
            return redirect()->route('login');
        }

        $orderType = $request->input('order_type', 'order');

        /*
        |--------------------------------------------------------------------------
        | Validate Delivery Address
        |--------------------------------------------------------------------------
        */

        $address = Address::where('id', $request->address_id)
            ->where('customer_id', $user->id)
            ->first();

        if (!$address) {
            Alert::toast('Please select a valid delivery address.', 'error');
            return back()->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Get Cart Items
        |--------------------------------------------------------------------------
        */

        $cartItems = CartItem::with('variant.product')
            ->where('user_id', $user->id)
            ->where('type', $orderType)
            ->get();

        if ($cartItems->isEmpty()) {
            Alert::toast('Your cart is empty.', 'warning');
            return redirect()->route('cart');
        }

        /*
        |--------------------------------------------------------------------------
        | Validate Products and Stock
        |--------------------------------------------------------------------------
        */

        foreach ($cartItems as $item) {
            if (!$item->variant || !$item->variant->product) {
                Alert::toast(
                    'A product in your cart is no longer available.',
                    'error'
                );

                return redirect()->route('cart');
            }

            if (
                (int) $item->quantity < 1 ||
                (int) $item->quantity > (int) $item->variant->stock
            ) {
                Alert::toast(
                    'Insufficient stock for ' . $item->variant->product->title,
                    'error'
                );

                return redirect()->route('cart');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Prepare Shipping Address
        |--------------------------------------------------------------------------
        */

        $shippingAddress = [
            'name' => $address->name ?? $user->name,
            'phone' => $address->mobile ?? $user->mobile,
            'mobile' => $address->mobile ?? $user->mobile,
            'email' => $address->email ?? $user->email,
            'address' => $address->address,
            'landmark' => $address->landmark,
            'address_2' => $address->address_2,
            'city' => $address->city,
            'state' => $address->state,
            'pincode' => $address->pincode,
        ];

        /*
        |--------------------------------------------------------------------------
        | Calculate Subtotal and Weight
        |--------------------------------------------------------------------------
        */

        $subtotal = 0;
        $totalWeight = 0;

        foreach ($cartItems as $item) {
            $variant = $item->variant;
            $quantity = (int) $item->quantity;

            $subtotal += (float) ($variant->price ?? 0) * $quantity;
            $totalWeight += (float) ($variant->weight ?? 0) * $quantity;
        }

        $subtotal = round($subtotal, 2);

        /*
        |--------------------------------------------------------------------------
        | Calculate Shipping
        |--------------------------------------------------------------------------
        */

        $shipping = 0;

        if ($address->state) {
            $zone = ShippingZone::whereJsonContains(
                'regions',
                $address->state
            )->first();

            if (
                $zone &&
                strtolower(trim((string) $zone->free_shipping)) !== 'yes'
            ) {
                $charge = FreightCharge::where(
                    'shipping_zone_id',
                    $zone->id
                )
                    ->where('min_weight', '<=', $totalWeight)
                    ->where('max_weight', '>=', $totalWeight)
                    ->first();

                if ($charge) {
                    $shipping = (float) $charge->charge;
                } else {
                    $latestCharge = FreightCharge::where(
                        'shipping_zone_id',
                        $zone->id
                    )->orderByDesc('id')->first();

                    if (
                        $latestCharge &&
                        $totalWeight > (float) $latestCharge->max_weight
                    ) {
                        $shipping = (float) $latestCharge->charge + 30;
                    }
                }
            }
        }

        $shipping = round($shipping, 2);

        /*
        |--------------------------------------------------------------------------
        | Apply Coupon
        |--------------------------------------------------------------------------
        */

        $discount = 0;
        $coupon = null;

        $couponCode = strtoupper(trim(
            (string) $request->input('coupon_code', '')
        ));

        if ($couponCode !== '') {
            $coupon = Coupon::whereRaw('UPPER(code) = ?', [$couponCode])
                ->where('status', 'active')
                ->first();

            if (!$coupon) {
                Alert::toast('Invalid or inactive coupon code.', 'error');
                return back()->withInput();
            }

            if (
                $coupon->expiry_date &&
                \Carbon\Carbon::parse($coupon->expiry_date)
                    ->endOfDay()->isPast()
            ) {
                Alert::toast('This coupon has expired.', 'error');
                return back()->withInput();
            }

            if ($subtotal < (float) ($coupon->minimum_purchase ?? 0)) {
                Alert::toast(
                    'Minimum purchase amount is ₹' .
                    number_format(
                        (float) ($coupon->minimum_purchase ?? 0),
                        2
                    ) . ' to use this coupon.',
                    'error'
                );

                return back()->withInput();
            }

            $type = strtolower(trim((string) $coupon->type));
            $value = (float) $coupon->discount;

            if (in_array($type, ['fixed', 'flat', 'amount'])) {
                $discount = $value;
            } elseif (in_array($type, ['percentage', 'percent', '%'])) {
                $discount = round(($subtotal * $value) / 100, 2);
            }

            $discount = min(
                $subtotal,
                max(0, round($discount, 2))
            );

            if ($discount <= 0) {
                Alert::toast(
                    'This coupon does not provide a valid discount.',
                    'error'
                );

                return back()->withInput();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate Final Total
        |--------------------------------------------------------------------------
        */

        $grandTotal = max(
            0,
            round($subtotal + $shipping - $discount, 2)
        );

        /*
        |--------------------------------------------------------------------------
        | Create Order, Coupon History and Payment
        |--------------------------------------------------------------------------
        */

        DB::beginTransaction();

        try {
            $order = Order::create([
                'customer_id' => $user->id,
                'invoice_id' => 'TEMP-' . uniqid(),

                'subtotal' => $subtotal,
                'delivery_total' => $shipping,
                'discount_total' => $discount,
                'grand_total' => $grandTotal,

                'status' => 'pending',
                'payment_status' => 'pending',

                'shipping_address' => $shippingAddress,
                'billing_address' => $shippingAddress,
            ]);

            $invoiceId = 'VS' . str_pad(
                $order->id,
                5,
                '0',
                STR_PAD_LEFT
            );

            $order->update([
                'invoice_id' => $invoiceId,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Store Coupon Usage History
            |--------------------------------------------------------------------------
            */

            if ($coupon && $discount > 0) {
                DB::table('coupon_usage_histories')->insert([
                    'coupon_id' => $coupon->id,
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'discount_amount' => $discount,
                    'used_at' => now()->toDateTimeString(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Create Order Items
            |--------------------------------------------------------------------------
            */

            foreach ($cartItems as $item) {
                $unitPrice = (float) $item->variant->price;
                $quantity = (int) $item->quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_variant_id' => $item->product_variant_id,
                    'seller_id' => 0,
                    'product_title' => $item->variant->product->title,
                    'sku' => $item->variant->sku,
                    'unit_price' => $unitPrice,
                    'quantity' => $quantity,
                    'subtotal' => round($unitPrice * $quantity, 2),
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Create Payment Record
            |--------------------------------------------------------------------------
            */

            $payment = Payment::create([
                'order_id' => $order->id,
                'user_id' => $user->id,
                'amount' => $grandTotal,
                'currency' => 'INR',
                'status' => 'pending',
                'method' => $request->payment_method,
                'reference_no' => $invoiceId,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Cash on Delivery
            |--------------------------------------------------------------------------
            */

            if ($request->payment_method === 'cod') {
                $order->update([
                    'status' => 'placed',
                    'payment_status' => 'pending',
                ]);

                foreach ($cartItems as $item) {
                    $item->variant->decrement(
                        'stock',
                        (int) $item->quantity
                    );
                }

                CartItem::where('user_id', $user->id)
                    ->where('type', $orderType)
                    ->delete();

                DB::commit();

                Alert::success(
                    'Success',
                    'Your order has been placed.'
                );

                return redirect()->route('customer.orders');
            }

            /*
            |--------------------------------------------------------------------------
            | Razorpay Online Payment
            |--------------------------------------------------------------------------
            */

            if ($request->payment_method === 'online_payment') {
                $gateway = PaymentGateway::where('code', 'razorpay')
                    ->where('is_online', 1)
                    ->where('status', 1)
                    ->first();

                if (!$gateway) {
                    throw new \RuntimeException(
                        'Razorpay gateway is disabled or not configured.'
                    );
                }

                $gatewayConfig = is_array($gateway->config)
                    ? $gateway->config
                    : json_decode($gateway->config ?? '{}', true);

                $key = $gatewayConfig['key_id'] ?? null;
                $secret = $gatewayConfig['secret'] ?? null;

                if (empty($key) || empty($secret)) {
                    throw new \RuntimeException(
                        'Razorpay key_id or secret is missing from the gateway configuration.'
                    );
                }

                $api = new Api($key, $secret);

                $razorpayOrder = $api->order->create([
                    'receipt' => $invoiceId,
                    'amount' => (int) round($grandTotal * 100),
                    'currency' => 'INR',
                ]);

                $payment->update([
                    'provider' => 'razorpay',
                    'provider_order_id' => $razorpayOrder['id'],
                ]);

                DB::commit();

                return view('website.razorpay-payment', [
                    'order' => $order,
                    'payment' => $payment,
                    'razorpayOrder' => $razorpayOrder,
                    'subtotal' => $subtotal,
                    'shipping' => $shipping,
                    'discount' => $discount,
                    'grandTotal' => $grandTotal,
                    'user' => $user,
                    'razorpayKey' => $key,
                    'couponCode' => $couponCode,
                    'couponApplied' => $discount > 0,
                    'orderType' => $orderType,
                ]);
            }

            throw new \RuntimeException('Invalid payment method.');

        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Checkout order creation failed', [
                'customer_id' => $user->id,
                'error' => $e->getMessage(),
            ]);

            Alert::toast(
                'Unable to place your order. Please try again.',
                'error'
            );

            return back()->withInput();
        }
    }


    public function orders()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login');
        }

        $orders = Order::where(
            'customer_id',
            Auth::guard('customer')->id()
        )->latest()->paginate(10);

        return view('website.orders', compact('orders'));
    }

    public function show($id)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login');
        }

        $order = Order::where('customer_id', Auth::guard('customer')->id())
            ->where('id', $id)
            ->firstOrFail();

        return view('website.order-details', compact('order'));
    }

    public function paymentSuccess(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string',
        ]);

        $customerId = Auth::guard('customer')->id();

        if (!$customerId) {
            return redirect()->route('login')
                ->with('error', 'Please log in to verify your payment.');
        }

        try {
            $payment = Payment::where(
                'provider_order_id',
                $request->razorpay_order_id
            )
                ->where('user_id', $customerId)
                ->where('provider', 'razorpay')
                ->where('status', 'pending')
                ->firstOrFail();

            $gateway = PaymentGateway::where('code', 'razorpay')
                ->where('is_online', 1)
                ->where('status', 1)
                ->firstOrFail();

            $config = is_array($gateway->config)
                ? $gateway->config
                : json_decode($gateway->config, true);

            $key = $config['key_id'] ?? null;
            $secret = $config['secret'] ?? null;

            if (!$key || !$secret) {
                throw new \RuntimeException('Razorpay credentials are missing.');
            }

            $api = new Api($key, $secret);

            // Verify the payment signature before marking the order as paid.
            $api->utility->verifyPaymentSignature([
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
            ]);

            DB::transaction(function () use ($payment, $request) {
                $payment->update([
                    'provider_payment_id' => $request->razorpay_payment_id,
                    'provider_signature' => $request->razorpay_signature,
                    'status' => 'paid',
                    'paid_at' => now(),
                ]);

                $order = Order::where('id', $payment->order_id)
                    ->where('customer_id', $payment->user_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $order->update([
                    'status' => 'placed',
                    'payment_status' => 'paid',
                ]);

                // Remove only the purchased customer's cart items.
                CartItem::where('user_id', $payment->user_id)->delete();
            });

            Alert::success('Payment Successful', 'Your order has been placed.');

            return redirect()->route('customer.orders');
        } catch (\Throwable $e) {
            Log::error('Razorpay payment verification failed', [
                'customer_id' => $customerId,
                'razorpay_order_id' => $request->razorpay_order_id,
                'error' => $e->getMessage(),
            ]);

            Alert::error(
                'Payment Verification Failed',
                'We could not verify your payment. Please contact support if money was deducted.'
            );

            return redirect()->route('customer.orders');
        }
    }
}
