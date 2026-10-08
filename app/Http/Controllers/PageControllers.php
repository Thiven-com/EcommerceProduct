<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PageControllers extends Controller
{
    //
    public function home()
    {
        $now = Carbon::now();

        $banners = Banner::where('active', true)
            ->where(function ($query) use ($now) {
                $query->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', $now);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('ends_at')
                    ->orWhere('ends_at', '>=', $now);
            })
            ->orderBy('sort_order', 'asc')
            ->get();
        $categories = Category::where('status', 'show')
            ->orderBy('id', 'asc')->take(8)
            ->get();
        $products = Product::with([
            'category',
            'variant',
        ])
            ->where('status', 'show')
            ->whereHas('variant')
            ->orderBy('orders', 'desc')
            ->take(10)
            ->get();
        return view('website.home', compact('banners', 'categories', 'products'));
    }

    public function shop(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::where('status', 'show')
            ->whereNull('deleted_at')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Products Query
        |--------------------------------------------------------------------------
        */

        $productsQuery = Product::with([
            'category',
            'variant',
        ])
            ->where('status', 'show')
            ->whereHas('variant');


        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $category = $request->category;

            $productsQuery->whereHas('category', function ($query) use ($category) {

                $query->where('slug', $category)
                    ->orWhere('id', $category);

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Minimum Price
        |--------------------------------------------------------------------------
        */

        if ($request->filled('min_price')) {

            $minPrice = (float) $request->min_price;

            $productsQuery->whereHas('variant', function ($query) use ($minPrice) {

                $query->whereRaw(
                    'CAST(price AS DECIMAL(15,2)) >= ?',
                    [$minPrice]
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Maximum Price
        |--------------------------------------------------------------------------
        */

        if ($request->filled('max_price')) {

            $maxPrice = (float) $request->max_price;

            $productsQuery->whereHas('variant', function ($query) use ($maxPrice) {

                $query->whereRaw(
                    'CAST(price AS DECIMAL(15,2)) <= ?',
                    [$maxPrice]
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        switch ($request->get('sort')) {

            case 'best-selling':

                $productsQuery
                    ->orderBy('orders', 'desc')
                    ->orderBy('id', 'desc');

                break;


            case 'price-low':

                $productsQuery->orderBy(
                    Product::select('price')
                        ->from('product_variants')
                        ->whereColumn(
                            'product_variants.product_id',
                            'products.id'
                        )
                        ->limit(1),
                    'asc'
                );

                break;


            case 'price-high':

                $productsQuery->orderBy(
                    Product::select('price')
                        ->from('product_variants')
                        ->whereColumn(
                            'product_variants.product_id',
                            'products.id'
                        )
                        ->limit(1),
                    'desc'
                );

                break;


            case 'new-arrivals':

                $productsQuery->orderBy('created_at', 'desc');

                break;


            default:

                $productsQuery
                    ->orderBy('is_feature', 'desc')
                    ->orderBy('orders', 'desc')
                    ->orderBy('id', 'desc');

                break;
        }


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $products = $productsQuery
            ->paginate(12)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Category Product Counts
        |--------------------------------------------------------------------------
        */

        $categoryCounts = Product::where('status', 'show')
            ->whereHas('variant')
            ->selectRaw('category_id, COUNT(*) as total')
            ->groupBy('category_id')
            ->pluck('total', 'category_id');


        /*
        |--------------------------------------------------------------------------
        | Return Shop Page
        |--------------------------------------------------------------------------
        */

        return view('website.shop', compact(
            'products',
            'categories',
            'categoryCounts'
        ));
    }
    // public function product_details()
    // {
    //     return view('website.product-details');
    // }

    public function product_details($slug)
    {
        $product = Product::with([
            'category',
            'brand',

            // Product variants with dynamic attributes
            'variants.attributeMappings.attribute',
            'variants.attributeMappings.value',

            // Variant media
            'variants.media',

            // Product media
            'media',
            'primaryMedia',
        ])
            ->where('slug', $slug)
            ->where('status', 'show')
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Select first variant
        |--------------------------------------------------------------------------
        */

        $variant = $product->variant;

        /*
        |--------------------------------------------------------------------------
        | Price
        |--------------------------------------------------------------------------
        */

        $sellingPrice = $variant?->price;
        $actualPrice = $variant?->actual_price;

        /*
        |--------------------------------------------------------------------------
        | Discount
        |--------------------------------------------------------------------------
        */

        $discount = 0;

        if (
            is_numeric($actualPrice) &&
            is_numeric($sellingPrice) &&
            (float) $actualPrice > 0 &&
            (float) $actualPrice > (float) $sellingPrice
        ) {
            $discount = round(
                (
                    ((float) $actualPrice - (float) $sellingPrice)
                    / (float) $actualPrice
                ) * 100
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Product Image
        |--------------------------------------------------------------------------
        */

        $productImage = null;

        if ($variant && !empty($variant->image)) {

            $productImage = $variant->image;

        } elseif ($product->primaryMedia) {

            $productImage = $product->primaryMedia->file_path ?? null;

        } elseif (!empty($product->image)) {

            $productImage = $product->image;
        }

        /*
        |--------------------------------------------------------------------------
        | Badge
        |--------------------------------------------------------------------------
        */

        $badge = null;

        if ($product->orders > 0) {

            $badge = 'Bestseller';

        } elseif (
            $product->created_at &&
            $product->created_at->gt(now()->subDays(30))
        ) {

            $badge = 'New Arrival';

        } elseif ($product->is_feature === 'yes') {

            $badge = 'Featured';
        }

        /*
        |--------------------------------------------------------------------------
        | Return Product Details Page
        |--------------------------------------------------------------------------
        */

        return view('website.product-details', compact(
            'product',
            'variant',
            'sellingPrice',
            'actualPrice',
            'discount',
            'productImage',
            'badge'
        ));
    }
    public function blog()
    {
        return view('website.blog');
    }
    public function blog_details()
    {
        return view('website.blogdetails');
    }
    public function aboutus()
    {
        return view('website.aboutus');
    }
    public function login()
    {
        return view('website.login');
    }
    public function cart()
    {
        return view('website.cart');
    }
    public function wishlist()
    {
        return view('website.wishlist');
    }
    public function contactus()
    {
        return view('website.contactus');
    }
    public function shippingdelivery()
    {
        return view('website.shippingdelivery');
    }
    public function returnexchange()
    {
        return view('website.returnexchange');
    }
    public function privacypolicy()
    {
        return view('website.privacypolicy');
    }
    public function terms()
    {
        return view('website.terms');
    }
    public function faq()
    {
        return view('website.faq');
    }
    public function track_order()
    {
        return view('website.track-order');
    }
    public function orders()
    {
        return view('website.orders');
    }
    public function order_details()
    {
        return view('website.order-details');
    }
    public function addresses()
    {
        return view('website.addresses');
    }
    public function account_settings()
    {
        return view('website.account-settings');
    }
    public function account()
    {
        return view('website.account');
    }
    public function offers()
    {
        return view('website.offers');
    }
    public function checkout()
    {
        return view('website.checkout');
    }

}