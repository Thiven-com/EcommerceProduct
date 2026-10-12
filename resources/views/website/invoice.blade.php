<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invoice - {{ $order->invoice_id ?? ('SDR-' . $order->id) }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #420916;
            margin: 0;
            padding: 25px;
            background: #fbf8f3;
        }

        .invoice-box {
            max-width: 900px;
            margin: auto;
            padding: 30px;
            background: #fff;
            border: 1px solid #eadfce;
            border-radius: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .header {
            border-bottom: 3px solid #420916;
            padding-bottom: 22px;
            margin-bottom: 25px;
        }

        .header-table td {
            width: 50%;
            vertical-align: middle;
        }

        .brand-name {
            color: #420916;
            font-size: 25px;
            font-weight: bold;
            margin: 0 0 7px;
        }

        .brand-tagline {
            color: #a47724;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .brand-logo {
            max-width: 150px;
            max-height: 60px;
            margin-bottom: 10px;
        }

        .invoice-title {
            text-align: right;
        }

        .invoice-title h1 {
            color: #420916;
            font-size: 32px;
            letter-spacing: 3px;
            margin: 0 0 12px;
        }

        .invoice-title p {
            color: #756c64;
            font-size: 11px;
            margin: 6px 0;
        }

        .invoice-title strong {
            color: #420916;
        }

        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #420916;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .info-table {
            margin-bottom: 28px;
        }

        .info-table td {
            width: 50%;
            vertical-align: top;
            padding: 17px;
            border: 1px solid #eadfce;
            background: #fffdf9;
        }

        .info-table td:first-child {
            border-right: 8px solid #fff;
        }

        .muted {
            color: #756c64;
            font-size: 11px;
            line-height: 1.9;
            word-wrap: break-word;
        }

        .muted strong {
            color: #420916;
        }

        .items-title {
            margin-bottom: 12px;
        }

        .items {
            margin-top: 10px;
            table-layout: fixed;
        }

        .items thead {
            background: #420916;
            color: #fff;
        }

        .items th {
            padding: 13px 10px;
            border: 1px solid #420916;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .5px;
            text-align: left;
        }

        .items td {
            padding: 13px 10px;
            border: 1px solid #eadfce;
            vertical-align: middle;
            overflow-wrap: anywhere;
        }

        .items tbody tr:nth-child(even) {
            background: #faf7f2;
        }

        .items th:nth-child(1),
        .items td:nth-child(1) {
            width: 43%;
        }

        .items th:nth-child(2),
        .items td:nth-child(2) {
            width: 10%;
            text-align: center;
        }

        .items th:nth-child(3),
        .items td:nth-child(3) {
            width: 22%;
            text-align: right;
            white-space: nowrap;
        }

        .items th:nth-child(4),
        .items td:nth-child(4) {
            width: 25%;
            text-align: right;
            white-space: nowrap;
        }

        .summary {
            width: 360px;
            max-width: 100%;
            margin: 25px 0 0 auto;
        }

        .summary table {
            border: 1px solid #eadfce;
        }

        .summary td {
            padding: 12px 14px;
            font-size: 11px;
            border-bottom: 1px solid #eadfce;
            background: #fffdf9;
        }

        .summary td:last-child {
            text-align: right;
            white-space: nowrap;
            font-weight: bold;
        }

        .summary .discount td {
            color: #52743d;
            background: #f4faf3;
            font-weight: bold;
        }

        .summary .total td {
            color: #fff;
            background: #420916;
            font-size: 14px;
            font-weight: bold;
            padding: 15px 14px;
            border-top: 3px solid #c88618;
            border-bottom: none;
        }

        .thank-you {
            margin-top: 35px;
            padding: 20px;
            text-align: center;
            background: #faf7f2;
            border-top: 2px solid #c88618;
            color: #756c64;
            font-size: 11px;
            line-height: 1.9;
        }

        .thank-you strong {
            color: #420916;
        }

        .footer-note {
            font-size: 9px;
            margin-top: 7px;
        }

        @media print {
            body {
                padding: 0;
                background: #fff;
            }

            .invoice-box {
                max-width: none;
                border: none;
                border-radius: 0;
                padding: 15px;
            }

            .info-table,
            .summary,
            .items tr {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    @php
        /*
        |--------------------------------------------------------------------------
        | Shipping Address
        |--------------------------------------------------------------------------
        */
        $shippingAddress = $order->shipping_address ?? [];

        if (is_string($shippingAddress)) {
            $shippingAddress = json_decode($shippingAddress, true) ?? [];
        }

        if (!is_array($shippingAddress)) {
            $shippingAddress = [];
        }

        /*
        |--------------------------------------------------------------------------
        | Order Items and Totals
        |--------------------------------------------------------------------------
        */
        $subtotal = (float) ($order->subtotal ?? 0);

        $shippingCharge = (float) (
            $order->delivery_total
            ?? $order->shipping_charge
            ?? 0
        );

        /*
         * Prefer the discount stored on the order.
         * If it is missing or zero, check coupon usage history.
         */
        $discount = (float) ($order->discount_total ?? 0);

        if ($discount <= 0 && $order->id) {
            $discount = (float) \Illuminate\Support\Facades\DB::table(
                'coupon_usage_histories'
            )
                ->where('order_id', $order->id)
                ->sum('discount_amount');
        }

        /*
         * Use the stored grand total when it exists.
         */
        $grandTotal = $order->grand_total !== null
            ? (float) $order->grand_total
            : max(0, $subtotal + $shippingCharge - $discount);

        $siteName = $site->site_name ?? 'Sudheera Sarees';

        $invoiceNumber = $order->invoice_id ?: 'SDR-' . $order->id;

        $customerName = data_get($shippingAddress, 'name')
            ?? data_get($shippingAddress, 'full_name')
            ?? data_get($shippingAddress, 'customer_name')
            ?? $order->customer_name
            ?? 'Customer';

        $addressLine = data_get($shippingAddress, 'address')
            ?? data_get($shippingAddress, 'address_line')
            ?? data_get($shippingAddress, 'address_line_1')
            ?? $order->address
            ?? '';

        $city = data_get($shippingAddress, 'city') ?? $order->city ?? '';

        $state = data_get($shippingAddress, 'state') ?? $order->state ?? '';

        $postcode = data_get($shippingAddress, 'postcode')
            ?? data_get($shippingAddress, 'postal_code')
            ?? data_get($shippingAddress, 'pincode')
            ?? $order->pincode
            ?? '';

        $country = data_get($shippingAddress, 'country') ?? '';

        $phone = data_get($shippingAddress, 'phone')
            ?? data_get($shippingAddress, 'mobile')
            ?? $order->customer_phone
            ?? 'N/A';

        $paymentMethod = $order->payment_method ?? 'Cash on Delivery';

        $paymentStatus = $order->payment_status ?? 'Pending';

        $orderStatus = $order->status ?? 'Pending';
    @endphp

    <div class="invoice-box">

        {{-- HEADER --}}
        <div class="header">
            <table class="header-table">
                <tr>
                    <td>
                        @if(!empty($site->logo))
                            <img src="{{ public_path($site->logo) }}" class="brand-logo" alt="Sudheera Sarees Logo">
                            <br>
                        @endif

                        <h2 class="brand-name">{{ $siteName }}</h2>

                        <div class="brand-tagline">
                            Grace in Every Drape
                        </div>
                    </td>

                    <td class="invoice-title">
                        <h1>INVOICE</h1>

                        <p>
                            <strong>Invoice No:</strong>
                            {{ $invoiceNumber }}
                        </p>

                        <p>
                            <strong>Order Date:</strong>
                            {{ optional($order->created_at)->format('d M Y') ?? 'N/A' }}
                        </p>

                        <p>
                            <strong>Order ID:</strong>
                            #{{ $order->id }}
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        {{-- BILLING AND PAYMENT --}}
        <table class="info-table">
            <tr>
                <td>
                    <div class="section-title">Bill To</div>

                    <div class="muted">
                        <strong>{{ $customerName }}</strong>
                        <br>

                        @if($addressLine)
                            {{ $addressLine }}<br>
                        @endif

                        @if($city)
                            {{ $city }}
                        @endif

                        @if($state)
                            {{ $city ? ', ' : '' }}{{ $state }}
                        @endif

                        @if($postcode)
                            {{ ($city || $state) ? ' - ' : '' }}{{ $postcode }}
                        @endif

                        @if($country)
                            <br>{{ $country }}
                        @endif

                        <br>
                        <strong>Phone:</strong> {{ $phone }}
                    </div>
                </td>

                <td>
                    <div class="section-title">Payment Information</div>

                    <div class="muted">
                        <strong>Method:</strong>
                        {{ ucwords(str_replace(['_', '-'], ' ', $paymentMethod)) }}
                        <br>

                        <strong>Payment Status:</strong>
                        {{ ucwords(str_replace(['_', '-'], ' ', $paymentStatus)) }}
                        <br>

                        <strong>Order Status:</strong>
                        {{ ucwords(str_replace(['_', '-'], ' ', $orderStatus)) }}
                    </div>
                </td>
            </tr>
        </table>

        {{-- ORDER ITEMS --}}
        <div class="section-title items-title">
            Order Items
        </div>

        <table class="items">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @forelse($order->items as $item)
                    @php
                        /*
                         * Support both relationship naming conventions:
                         * variant and productVariant.
                         */
                        $variant = $item->variant ?? $item->productVariant ?? null;
                        $product = $variant->product ?? null;

                        $productName = $item->product_title
                            ?? $product->title
                            ?? $product->name
                            ?? 'Saree Product';

                        $quantity = max(1, (int) ($item->quantity ?? 1));

                        $unitPrice = (float) (
                            $item->unit_price
                            ?? $item->price
                            ?? 0
                        );

                        $itemSubtotal = $item->subtotal !== null
                            ? (float) $item->subtotal
                            : $unitPrice * $quantity;
                    @endphp

                    <tr>
                        <td>{{ $productName }}</td>

                        <td>{{ $quantity }}</td>

                        <td>
                            ₹{{ number_format($unitPrice, 2) }}
                        </td>

                        <td>
                            ₹{{ number_format($itemSubtotal, 2) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center;">
                            No order items found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- ORDER TOTALS --}}
        <div class="summary">
            <table>
                <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <td>₹{{ number_format($subtotal, 2) }}</td>
                    </tr>

                    <tr>
                        <td>Shipping Charge</td>
                        <td>
                            @if($shippingCharge <= 0)
                                Free
                            @else
                                ₹{{ number_format($shippingCharge, 2) }}
                            @endif
                        </td>
                    </tr>

                    <tr class="discount">
                        <td>Coupon Discount</td>
                        <td>
                            − ₹{{ number_format($discount, 2) }}
                        </td>
                    </tr>

                    <tr class="total">
                        <td>Grand Total</td>
                        <td>₹{{ number_format($grandTotal, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- FOOTER --}}
        <div class="thank-you">
            Thank you for choosing <strong>{{ $siteName }}</strong>.

            <div>
                We appreciate your order and hope you love your saree.
            </div>

            <div class="footer-note">
                This is a computer-generated invoice and does not require a signature.
            </div>
        </div>

    </div>

    @if (request()->boolean('print'))
        <script>
            window.addEventListener('load', function () {
                window.print();
            });
        </script>
    @endif

</body>

</html>