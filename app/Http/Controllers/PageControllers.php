<?php

namespace App\Http\Controllers;


class PageControllers extends Controller
{
    //
    public function home()
    {
        return view('website.home');
    }
    public function shop()
    {
        return view('website.shop');
    }
    public function product_details()
    {
        return view('website.product-details');
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