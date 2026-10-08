<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;


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
    public function product_details()
    {
        return view('website.product-details');
    }
    public function blog()
    {
        $blogs = Blog::where('status', 'show')
            ->orderBy('created_at', 'desc')
            ->get();

        $blogCategories = BlogCategory::orderBy('id', 'asc')
            ->get()
            ->keyBy('id');

        return view('website.blog', compact('blogs', 'blogCategories'));
    }
    public function blog_details($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 'show')
            ->firstOrFail();

        $blogCategory = BlogCategory::where('id', $blog->category_id)
            ->first();

        $relatedBlogs = Blog::where('status', 'show')
            ->where('id', '!=', $blog->id)
            ->where('category_id', $blog->category_id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // If there are less than 3 blogs in the same category,
        // get other latest blogs to complete the 3 cards.
        if ($relatedBlogs->count() < 3) {

            $remaining = 3 - $relatedBlogs->count();

            $additionalBlogs = Blog::where('status', 'show')
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->orderBy('created_at', 'desc')
                ->take($remaining)
                ->get();

            $relatedBlogs = $relatedBlogs->concat($additionalBlogs);
        }

        $relatedCategories = BlogCategory::whereIn(
            'id',
            $relatedBlogs->pluck('category_id')->filter()->unique()
        )
            ->get()
            ->keyBy('id');

        return view('website.blogdetails', compact(
            'blog',
            'blogCategory',
            'relatedBlogs',
            'relatedCategories'
        ));
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