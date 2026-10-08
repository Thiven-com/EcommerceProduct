<?php

namespace App\Http\Controllers\CustomerApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\ProductVariant;
use App\Models\FlashSaleProduct;
use App\Http\Resources\CartCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:sanctum');
    }

    /** List current user's cart */
    public function index()
    {
        $user = auth('sanctum')->user();

        $items = CartItem::with([
            'variant.product:id,title,slug',
            'variant.attributeValues.attribute'
        ])
            ->where('user_id', $user->id)
            ->get();

        return new CartCollection($items);
    }

    /** Add a variant to cart (apply flash sale if active) */
    // public function add(Request $request)
    // {
    //     $user = auth('sanctum')->user();


    //     $validator = Validator::make($request->all(), [
    //         'variant_id' => 'required|integer|exists:product_variants,id',
    //         'quantity' => 'sometimes|integer|min:1|max:999',
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => 0,
    //             'message' => $validator->errors()->first()
    //         ]);
    //     }
    //     $data = $validator->validated();
    //     $qty = $data['quantity'] ?? 1;

    //     $variant = ProductVariant::select('id', 'price', 'stock', 'actual_price', 'product_min_order', 'product_max_order')->findOrFail($data['variant_id']);
    //     if ($variant->stock < 1) {

    //         return response()->json([
    //             'success' => 0,
    //             'message' => 'Out of stock'
    //         ], 422);
    //     }

    //     // if ($variant->product_min_order > $qty) {
    //     //     $qty = $variant->product_min_order;
    //     // }

    //     // ✅ Inline normalization
    //     $minQty = $variant->product_min_order ?? 1;
    //     $maxQty = $variant->product_max_order ?? 999;

    //     $qty = max($qty, $minQty);
    //     $qty = min($qty, $maxQty);
    //     // $qty = min($qty, $variant->stock);

    //     // 🔹 Check if variant is in active flash sale
    //     $price = $this->getEffectivePrice($variant);

    //     $item = CartItem::where('user_id', $user->id)
    //         ->where('product_variant_id', $variant->id)
    //         ->first();

    //     if ($item) {
    //         // $newQty = min($item->quantity + $qty, $variant->stock);
    //         $newQty = $qty;
    //         // $newQty = $item->quantity + $qty;

    //         // ✅ Apply limits AFTER increment
    //         $newQty = max($newQty, $minQty);
    //         $newQty = min($newQty, $maxQty);
    //         // $newQty = min($newQty, $variant->stock);

    //         $item->update([
    //             'quantity' => $newQty,
    //             'unit_price' => $price,
    //         ]);
    //     } else {
    //         $item = new CartItem();
    //         $item->user_id = $user->id;
    //         $item->product_variant_id = $variant->id;
    //         $item->quantity = $qty;
    //         // $item->quantity           = min($qty, $variant->stock);
    //         $item->unit_price = $price; // snapshot with flash price if available
    //         $item->save();
    //     }
    //     $items = CartItem::with([
    //         'variant.product:id,title,slug',
    //         'variant.attributeValues.attribute'
    //     ])
    //         ->where('user_id', $user->id)
    //         ->get();

    //     $data = new CartCollection($items);

    //     return response()->json(['success' => 1, 'data' => $data, 'message' => 'Added to cart', 'id' => $item->id]);
    // }

    public function add(Request $request)
    {
        $user = auth('sanctum')->user();

        $validator = Validator::make($request->all(), [
            'variant_id' => 'required|integer|exists:product_variants,id',
            'quantity' => 'sometimes|integer|min:1|max:999',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'message' => $validator->errors()->first()
            ]);
        }

        $data = $validator->validated();
        $qty = $data['quantity'] ?? 1;

        $variant = ProductVariant::select(
            'id',
            'price',
            'stock',
            'actual_price',
            'product_min_order',
            'product_max_order',
            'preorder',
            'preorder_stock'
        )->findOrFail($data['variant_id']);

        // ✅ Stock logic
        $isPreorder = $variant->preorder ?? false;

        if ($variant->stock < 1) {
            if ($isPreorder) {
                if ($variant->preorder_stock < 1) {
                    return response()->json([
                        'success' => 0,
                        'message' => 'Preorder stock not available'
                    ]);
                }
                $availableStock = $variant->preorder_stock;
            } else {
                return response()->json([
                    'success' => 0,
                    'message' => 'Out of stock'
                ]);
            }
        } else {
            $availableStock = $variant->stock;
        }

        // ✅ Decide type
        $type = ($variant->stock < 1 && $isPreorder) ? 'preorder' : 'order';

        // ✅ Min / Max
        $minQty = $variant->product_min_order ?? 1;
        $maxQty = $variant->product_max_order ?? 999;

        $qty = max($qty, $minQty);
        $qty = min($qty, $maxQty);
        $qty = min($qty, $availableStock);

        $price = $this->getEffectivePrice($variant);

        $item = CartItem::where('user_id', $user->id)
            ->where('product_variant_id', $variant->id)
            ->first();

        if ($item) {
            $newQty = $qty;

            $newQty = max($newQty, $minQty);
            $newQty = min($newQty, $maxQty);
            $newQty = min($newQty, $availableStock);

            $item->update([
                'quantity' => $newQty,
                'unit_price' => $price,
                'type' => $type,
            ]);
        } else {
            $item = new CartItem();
            $item->user_id = $user->id;
            $item->product_variant_id = $variant->id;
            $item->quantity = $qty;
            $item->unit_price = $price;
            $item->type = $type;
            $item->save();
        }

        $items = CartItem::with([
            'variant.product:id,title,slug',
            'variant.attributeValues.attribute'
        ])
            ->where('user_id', $user->id)
            ->get();

        $data = new CartCollection($items);

        return response()->json([
            'success' => 1,
            'data' => $data,
            'message' => 'Added to cart',
            'id' => $item->id
        ]);
    }

    /** Update quantity of a cart line */
    // public function updateQuantity(Request $request, CartItem $cartItem)
    // {
    //     $user = auth('sanctum')->user();

    //     if ($cartItem->user_id !== $user->id) {
    //         return response()->json(['message' => 'Forbidden'], 403);
    //     }


    //     $variant = ProductVariant::select('id', 'price', 'stock', 'actual_price', 'product_min_order', 'product_max_order')->findOrFail($cartItem->product_variant_id);

    //     $minQty = $variant->product_min_order ?? 1;
    //     $maxQty = $variant->product_max_order ?? 10;

    //     $data = $request->validate([
    //         'quantity' => "required|integer|min:$minQty|max:$maxQty",
    //     ]);
    //     // if ($variant->stock < $data['quantity']) {
    //     //     return response()->json(['message' => 'Insufficient stock'], 422);
    //     // }

    //     // if ($variant->stock < 1) {
    //     //     return response()->json([
    //     //         'success' => 0,
    //     //         'message' => 'Out of stock'
    //     //     ], 422);
    //     // }

    //     $qty = $data['quantity'];

    //     $qty = max($qty, $minQty);
    //     $qty = min($qty, $maxQty);
    //     // $qty = min($qty, $variant->stock);

    //     // 🔹 Apply flash sale if active
    //     $price = $this->getEffectivePrice($variant);

    //     $cartItem->quantity = $qty;
    //     $cartItem->unit_price = $price;
    //     $cartItem->save();

    //     return response()->json(['success' => 1, 'message' => 'Quantity updated']);
    // }

    public function updateQuantity(Request $request, CartItem $cartItem)
    {
        $user = auth('sanctum')->user();

        if ($cartItem->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $variant = ProductVariant::select(
            'id',
            'price',
            'stock',
            'actual_price',
            'product_min_order',
            'product_max_order',
            'preorder',
            'preorder_stock'
        )->findOrFail($cartItem->product_variant_id);

        $minQty = $variant->product_min_order ?? 1;
        $maxQty = $variant->product_max_order ?? 10;

        $data = $request->validate([
            'quantity' => "required|integer|min:$minQty|max:$maxQty",
        ]);

        $qty = $data['quantity'];

        // ✅ Determine stock source
        $isPreorder = $variant->preorder ?? false;

        if ($variant->stock < 1) {
            if ($isPreorder) {
                if ($variant->preorder_stock < 1) {
                    return response()->json([
                        'success' => 0,
                        'message' => 'Preorder stock not available'
                    ]);
                }
                $availableStock = $variant->preorder_stock;
                $type = 'preorder';
            } else {
                return response()->json([
                    'success' => 0,
                    'message' => 'Out of stock'
                ]);
            }
        } else {
            $availableStock = $variant->stock;
            $type = 'order';
        }

        // ✅ Apply limits
        $qty = max($qty, $minQty);
        $qty = min($qty, $maxQty);
        $qty = min($qty, $availableStock);

        // 🔹 Apply pricing (flash sale etc.)
        $price = $this->getEffectivePrice($variant);

        // ✅ Update cart item
        $cartItem->quantity = $qty;
        $cartItem->unit_price = $price;
        $cartItem->type = $type;
        $cartItem->save();

        return response()->json([
            'success' => 1,
            'message' => 'Quantity updated'
        ]);
    }

    /** Remove a single cart line */
    // public function remove(CartItem $cartItem)
    // {
    //     $user = auth('sanctum')->user();

    //     if ($cartItem->user_id !== $user->id) {
    //         return response()->json(['success' => 0, 'message' => 'Forbidden'], 403);
    //     }
    //     if (!isset($cartItem->id)) {
    //         return response()->json(['success' => 0, 'message' => 'Cart Details Not Found']);
    //     }
    //     $cartItem->delete();
    //     return response()->json(['success' => 1, 'message' => 'Removed from cart']);
    // }

    public function remove($id)
    {
        $user = auth('sanctum')->user();

        $cartItem = CartItem::find($id);

        if (!$cartItem) {
            return response()->json([
                'success' => 0,
                'message' => 'Cart item not found'
            ], 404);
        }

        if ($cartItem->user_id !== $user->id) {
            return response()->json([
                'success' => 0,
                'message' => 'Forbidden'
            ], 403);
        }

        $cartItem->delete();

        return response()->json([
            'success' => 1,
            'message' => 'Removed from cart'
        ]);
    }

    /** Clear the entire cart for current user */
    public function clear()
    {
        $user = auth('sanctum')->user();

        CartItem::where('user_id', $user->id)->delete();
        return response()->json(['success' => 1, 'message' => 'Cart cleared']);
    }

    /** 🔹 Helper: Get effective price (flash sale or normal) */
    private function getEffectivePrice(ProductVariant $variant)
    {
        $fsp = FlashSaleProduct::where('product_variant_id', $variant->id)
            ->whereHas('flashSale', function ($q) {
                $q->where('status', 1)
                    ->where('starts_at', '<=', Carbon::now())
                    ->where('ends_at', '>=', Carbon::now());
            })
            ->first();

        if ($fsp) {
            if ($fsp->discount_type === 'fixed') {
                return max(0, $variant->price - $fsp->discount_value);
            } elseif ($fsp->discount_type === 'percent') {
                return max(0, $variant->price * (1 - $fsp->discount_value / 100));
            }
        }

        return $variant->price; // fallback normal price
    }
}
