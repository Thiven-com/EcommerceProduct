<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sudheera Sarees</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('website') }}/images/llll.png">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('website') }}/images/llll.png">

    <!-- Apple / iPhone -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('website') }}/images/llll.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /*=========
    header and topbar
    ========*/
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* =========================================================
   FIXED TOP BAR + NAVBAR
========================================================= */

        .sudheera-fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;

            z-index: 999999;

            background: #ffffff;

            box-shadow:
                0 3px 18px rgba(0, 0, 0, 0.08);
        }


        /* =========================================================
   TOP BAR
========================================================= */

        .sudheera-fixed-header .top-bar {
            width: 100%;
            height: 40px;

            background: #76001f;
            color: #ffffff;

            display: flex;
            align-items: center;
        }


        /* =========================================================
   MAIN NAVBAR
========================================================= */

        .sudheera-fixed-header .main-navbar {
            width: 100%;
            height: 70px;

            background: #fffdf9;

            border-bottom: 1px solid #eeeeee;

            display: flex;
            align-items: center;

            position: relative;
            z-index: 1000;
        }


        /* =========================================================
   PAGE OFFSET
========================================================= */

        /*
   Top Bar = 40px
   Navbar   = 70px
   Total    = 110px
*/

        body {
            padding-top: 110px;
        }


        /* =========================================================
   DROPDOWN MUST APPEAR ABOVE CONTENT
========================================================= */

        .sudheera-fixed-header .nav-dropdown .dropdown-menu {
            z-index: 999999;
        }


        /* =========================================================
   MOBILE
========================================================= */

        @media (max-width: 991px) {

            .sudheera-fixed-header .top-bar {
                height: 32px;
            }

            .sudheera-fixed-header .main-navbar {
                height: 65px;
            }

            body {
                padding-top: 97px;
            }

        }


        /* =========================================================
   SMALL MOBILE
========================================================= */

        @media (max-width: 480px) {

            .sudheera-fixed-header .top-bar {
                height: 32px;
            }

            .sudheera-fixed-header .main-navbar {
                height: 60px;
            }

            body {
                padding-top: 92px;
            }

        }

        body {
            font-family: Arial, sans-serif;
        }

        /* Top Bar */
        .top-bar {
            width: 100%;
            height: 40px;
            background: #76001f;
            color: #ffffff;

            display: flex;
            align-items: center;
        }

        .top-bar-container {
            width: 100%;
            padding: 0 30px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Left / Center Message */
        .top-bar-message {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 10px;

            font-size: 13px;
            font-weight: 400;
            white-space: nowrap;
        }

        /* Right Links */
        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 10px;

            font-size: 13px;
        }

        .top-bar-right a {
            color: #ffffff;
            text-decoration: none;
        }

        .top-bar-right a:hover {
            text-decoration: underline;
        }

        .separator {
            opacity: 0.6;
        }

        /* Mobile */
        @media (max-width: 768px) {

            .top-bar {
                height: 32px;
            }

            .top-bar-container {
                padding: 0 10px;
                justify-content: center;
            }

            .top-bar-message {
                font-size: 9px;
                gap: 5px;
            }

            .top-bar-right {
                display: none;
            }
        }

        @media (max-width: 480px) {

            .top-bar-message {
                font-size: 8px;
                gap: 4px;
            }
        }

        < !-- navbar-->
        /* =========================================
   MAIN NAVBAR
========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main-navbar {
            width: 100%;
            height: 70px;
            background: #fffdf9;
            border-bottom: 1px solid #eeeeee;

            display: flex;
            align-items: center;

            position: relative;
            z-index: 1000;
        }

        .navbar-container {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 40px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }


        /* =========================================
   LOGO
========================================= */

        .navbar-logo {
            flex-shrink: 0;
        }

        .navbar-logo img {
            width: 150px;
            height: auto;
            display: block;
        }

        @media (max-width: 767px) {
            .navbar-logo {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            .navbar-logo img {
                width: 100px !important;
            }
        }

        .navbar-logo a {
            display: flex;
            align-items: center;
            gap: 8px;

            color: #651024;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 38px;
            color: #9b7b3c;
        }

        .logo-text {
            line-height: 1;
        }

        .logo-name {
            font-family: Georgia, serif;
            font-size: 22px;
            letter-spacing: 1px;
            color: #5b1625;
        }

        .logo-tagline {
            margin-top: 4px;

            font-size: 7px;
            letter-spacing: 2px;
            color: #777;
            text-align: center;
        }


        /* =========================================
   NAVIGATION
========================================= */

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 25px;

            height: 100%;
        }

        .nav-link {
            position: relative;

            height: 70px;

            display: flex;
            align-items: center;

            color: #222;
            text-decoration: none;

            font-size: 14px;
            font-weight: 500;

            white-space: nowrap;

            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #7a1429;
        }


        /* Active */
        .nav-link.active {
            color: #7a1429;
        }

        .nav-link.active::after {
            content: "";

            position: absolute;
            bottom: 17px;
            left: 0;

            width: 100%;
            height: 1px;

            background: #7a1429;
        }

        /* =========================================
   NAV DROPDOWN
========================================= */

        .nav-dropdown {
            position: relative;
            display: inline-block;
        }

        .nav-dropdown .nav-link {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        .dropdown-arrow {
            font-size: 10px;
            transition: transform 0.3s ease;
        }


        /* Dropdown */

        .nav-dropdown .dropdown-menu {
            display: block !important;

            position: absolute;
            top: calc(100% + 5px);
            left: 50%;

            width: 210px;

            padding: 8px 0;
            margin: 0;

            background: #fff;

            border: 1px solid #eee;
            border-radius: 10px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);

            opacity: 0;
            visibility: hidden;
            pointer-events: none;

            transform: translateX(-50%) translateY(10px);

            transition: all 0.25s ease;

            z-index: 99999;
        }


        /* Dropdown links */

        .nav-dropdown .dropdown-menu a {
            display: block;

            padding: 11px 18px;

            color: #333;
            text-decoration: none;

            font-size: 13px;
        }

        .nav-dropdown .dropdown-menu a:hover {
            background: #faf3f4;
            color: #73122e;
        }


        /* OPEN */

        .nav-dropdown.open .dropdown-menu {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;

            transform: translateX(-50%) translateY(0);
        }


        /* Arrow */

        .nav-dropdown.open .dropdown-arrow {
            transform: rotate(180deg);
        }


        /* =========================================
   RIGHT SECTION
========================================= */

        .navbar-right {
            display: flex;
            align-items: center;

            gap: 18px;

            flex-shrink: 0;
        }


        /* =========================================
   SEARCH
========================================= */

        .search-box {
            width: 200px;
            height: 37px;

            border: 1px solid #dddddd;
            border-radius: 20px;

            background: #fff;

            display: flex;
            align-items: center;

            padding-left: 14px;
        }

        .search-box input {
            width: 100%;
            height: 100%;

            border: none;
            outline: none;

            background: transparent;

            font-size: 10px;
            color: #333;
        }

        .search-box input::placeholder {
            color: #777;
        }

        .search-btn {
            width: 38px;
            height: 100%;

            border: none;
            background: transparent;

            font-size: 25px;

            cursor: pointer;
        }


        /* =========================================
   ICONS
========================================= */

        .nav-icon {
            position: relative;

            color: #222;
            text-decoration: none;

            font-size: 25px;

            width: 24px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-icon:hover {
            color: #7a1429;
        }

        .icon-count {
            position: absolute;

            top: -2px;
            right: -8px;

            min-width: 14px;
            height: 14px;

            padding: 0 3px;

            border-radius: 50%;

            background: #7a1429;
            color: #fff;

            font-size: 8px;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* =========================================
   MOBILE BUTTON
========================================= */

        .mobile-menu-btn {
            display: none;

            border: none;
            background: transparent;

            font-size: 25px;

            cursor: pointer;
        }


        /* =========================================
   TABLET
========================================= */

        @media (max-width: 1200px) {

            .navbar-container {
                padding: 0 20px;
                gap: 15px;
            }

            .navbar-menu {
                gap: 15px;
            }

            .nav-link {
                font-size: 11px;
            }

            .search-box {
                width: 150px;
            }

            .navbar-right {
                gap: 12px;
            }
        }


        /* =========================================
   MOBILE
========================================= */

        @media (max-width: 991px) {

            .main-navbar {
                height: 65px;
            }

            .navbar-container {
                padding: 0 15px;
            }

            .navbar-menu,
            .navbar-right {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
                margin-left: auto;
            }

            .logo-name {
                font-size: 20px;
            }
        }


        /* =========================================
   SMALL MOBILE
========================================= */

        @media (max-width: 480px) {

            .main-navbar {
                height: 60px;
            }

            .navbar-container {
                padding: 0 12px;
            }

            .logo-icon {
                width: 32px;
                font-size: 30px;
            }

            .logo-name {
                font-size: 18px;
            }

            .logo-tagline {
                font-size: 6px;
                letter-spacing: 1.5px;
            }
        }
    </style>

</head>

<body>
    <div class="sudheera-fixed-header">
        <!-- TOP BAR -->
        <div class="top-bar">

            <div class="top-bar-container">

                <!-- Announcement -->
                <div class="top-bar-message">

                    <span>✿ Free Shipping on Orders Above ₹999</span>

                    <span class="separator">|</span>

                    <span>COD Available</span>

                    <span class="separator">|</span>

                    <span>↻ 7-Day Easy Returns</span>

                </div>

                <!-- Right Links -->
                <div class="top-bar-right">

                    <a href="{{ route('track-order') }}">Track Order</a>

                    <span class="separator">|</span>

                    {{-- <a href="#">Help</a> --}}

                    {{-- <span class="separator">|</span> --}}

                    <a href="{{ route('contactus') }}">Contact</a>

                    <span class="separator">|</span>

                    <a href="#" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="#" aria-label="Pinterest">
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>

                </div>

            </div>

        </div>


        <!-- =========================================
     PAGE LOADER
========================================= -->

        <!-- =========================================
     SUDHEERA SAREES - HOME PAGE LOADER
========================================= -->

        <!-- =========================================
     SUDHEERA SAREES - PREMIUM INTRO
========================================= -->

        <!-- =========================================
     SUDHEERA SAREES - PREMIUM LOADER
========================================= -->

        <div id="pageLoader">

            <div class="loader-light"></div>

            <div class="loader-content">

                <div class="loader-flower">

                    <img src="{{ asset('website') }}/images/llll.png" alt="Sudheera Sarees">

                </div>


                <div class="loader-brand">
                    SUDHEERA
                </div>


                <div class="loader-sarees">
                    SAREES
                </div>


                <div class="loader-divider">
                    <span></span>
                </div>


                <div class="loader-tagline">
                    GRACE IN EVERY DRAPE
                </div>

            </div>

        </div>

        <style>
            /* =========================================
   SUDHEERA SAREES
   LUXURY LOADER
========================================= */

            #pageLoader {

                position: fixed;

                inset: 0;

                width: 100%;
                height: 100vh;

                background: #2d000b;

                display: flex;

                align-items: center;
                justify-content: center;

                overflow: hidden;

                z-index: 999999;

                opacity: 1;

                visibility: visible;

                transition:
                    opacity 1.2s cubic-bezier(.65, 0, .35, 1),
                    visibility 1.2s;
            }


            /* =========================================
   MOVING LIGHT
========================================= */

            .loader-light {

                position: absolute;

                top: -20%;

                left: -40%;

                width: 35%;

                height: 140%;

                background:
                    linear-gradient(90deg,
                        transparent,
                        rgba(190, 150, 85, .10),
                        rgba(255, 255, 255, .7),
                        rgba(190, 150, 85, .10),
                        transparent);

                transform: skewX(-18deg);

                animation:
                    luxuryLight 2.8s ease-in-out .3s forwards;
            }


            @keyframes luxuryLight {

                0% {
                    left: -40%;
                }

                100% {
                    left: 110%;
                }

            }


            /* =========================================
   CONTENT
========================================= */

            .loader-content {

                position: relative;

                z-index: 5;

                display: flex;

                flex-direction: column;

                align-items: center;

                justify-content: center;

                text-align: center;

                transform: translateY(0);

                animation:
                    contentExit 1.1s cubic-bezier(.65, 0, .35, 1) 3.2s forwards;
            }


            /* =========================================
   FLOWER
========================================= */

            .loader-flower {

                position: relative;

                width: 110px;

                height: 110px;

                display: flex;

                align-items: center;

                justify-content: center;

                opacity: 0;

                transform:
                    scale(.65) translateY(20px);

                animation:
                    flowerReveal 1.4s cubic-bezier(.16, 1, .3, 1) .15s forwards;
            }


            .loader-flower img {

                width: 100%;

                height: 100%;

                object-fit: contain;

                display: block;

                filter:
                    drop-shadow(0 8px 18px rgba(91, 32, 41, .10));
            }


            /* =========================================
   FLOWER HALO
========================================= */

            .loader-flower::after {

                content: "";

                position: absolute;

                width: 75px;

                height: 75px;

                border-radius: 50%;

                background:
                    rgba(183, 143, 78, .12);

                filter: blur(25px);

                z-index: -1;

                animation:
                    haloPulse 2s ease-in-out .5s infinite;
            }


            @keyframes haloPulse {

                0% {
                    transform: scale(.7);

                    opacity: .25;
                }

                50% {
                    transform: scale(1.15);

                    opacity: .65;
                }

                100% {
                    transform: scale(.7);

                    opacity: .25;
                }

            }


            /* =========================================
   FLOWER REVEAL
========================================= */

            @keyframes flowerReveal {

                0% {

                    opacity: 0;

                    transform:
                        scale(.65) translateY(20px);
                }

                55% {

                    opacity: 1;

                    transform:
                        scale(1.06) translateY(-3px);
                }

                100% {

                    opacity: 1;

                    transform:
                        scale(1) translateY(0);
                }

            }


            /* =========================================
   BRAND
========================================= */

            .loader-brand {

                margin-top: 17px;

                font-family:
                    "Times New Roman",
                    Georgia,
                    serif;

                font-size: 38px;

                font-weight: 500;

                letter-spacing: 13px;

                color: #5d202b;

                opacity: 0;

                transform:
                    translateY(15px);

                animation:
                    brandReveal 1.3s cubic-bezier(.16, 1, .3, 1) .9s forwards;
            }


            @keyframes brandReveal {

                0% {

                    opacity: 0;

                    transform:
                        translateY(15px);

                    letter-spacing: 20px;
                }

                100% {

                    opacity: 1;

                    transform:
                        translateY(0);

                    letter-spacing: 9px;
                }

            }


            /* =========================================
   SAREES
========================================= */

            .loader-sarees {

                margin-top: 3px;

                font-family:
                    Arial,
                    sans-serif;

                font-size: 10px;

                font-weight: 400;

                letter-spacing: 8px;

                color: #aa8042;

                opacity: 0;

                transform:
                    translateY(8px);

                animation:
                    sareesReveal 1s ease 1.35s forwards;
            }


            @keyframes sareesReveal {

                0% {

                    opacity: 0;

                    transform:
                        translateY(8px);

                    letter-spacing: 13px;
                }

                100% {

                    opacity: 1;

                    transform:
                        translateY(0);

                    letter-spacing: 7px;
                }

            }


            /* =========================================
   DIVIDER
========================================= */

            .loader-divider {

                width: 150px;

                height: 1px;

                margin-top: 18px;

                background:
                    rgba(93, 32, 43, .12);

                overflow: hidden;

                opacity: 0;

                animation:
                    dividerReveal .5s ease 1.65s forwards;
            }


            .loader-divider span {

                display: block;

                width: 0;

                height: 100%;

                background:
                    linear-gradient(90deg,
                        transparent,
                        #b18a4b,
                        transparent);

                animation:
                    dividerSweep 1.2s ease 1.7s forwards;
            }


            @keyframes dividerReveal {

                to {
                    opacity: 1;
                }

            }


            @keyframes dividerSweep {

                0% {
                    width: 0;
                }

                100% {
                    width: 100%;
                }

            }


            /* =========================================
   TAGLINE
========================================= */

            .loader-tagline {

                margin-top: 10px;

                font-family:
                    Arial,
                    sans-serif;

                font-size: 8px;

                letter-spacing: 4px;

                color: #81736d;

                opacity: 0;

                transform:
                    translateY(7px);

                animation:
                    taglineReveal .9s ease 1.9s forwards;
            }


            @keyframes taglineReveal {

                0% {

                    opacity: 0;

                    transform:
                        translateY(7px);
                }

                100% {

                    opacity: 1;

                    transform:
                        translateY(0);
                }

            }


            /* =========================================
   FINAL EXIT
========================================= */

            @keyframes contentExit {

                0% {

                    opacity: 1;

                    transform:
                        scale(1) translateY(0);
                }

                70% {

                    opacity: 1;

                    transform:
                        scale(1.025) translateY(-3px);
                }

                100% {

                    opacity: 0;

                    transform:
                        scale(1.08) translateY(-8px);
                }

            }


            /* =========================================
   MOBILE
========================================= */

            @media (max-width: 600px) {

                .loader-flower {

                    width: 82px;

                    height: 82px;
                }


                .loader-brand {

                    margin-top: 14px;

                    font-size: 27px;

                    letter-spacing: 7px;
                }


                .loader-sarees {

                    font-size: 8px;

                    letter-spacing: 6px;
                }


                .loader-divider {

                    width: 110px;

                    margin-top: 14px;
                }


                .loader-tagline {

                    font-size: 6px;

                    letter-spacing: 2.5px;
                }

            }


            /* =========================================
   SMALL MOBILE
========================================= */

            @media (max-width: 400px) {

                .loader-flower {

                    width: 72px;

                    height: 72px;
                }


                .loader-brand {

                    font-size: 23px;

                    letter-spacing: 5px;
                }


                .loader-sarees {

                    font-size: 7px;

                    letter-spacing: 5px;
                }


                .loader-divider {

                    width: 95px;
                }


                .loader-tagline {

                    font-size: 5px;

                    letter-spacing: 2px;
                }

            }
        </style>


        <!-- NAVBAR -->
        <header class="main-navbar">

            <div class="navbar-container">

                <!-- Logo -->
                <div class="navbar-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('website') }}/images/sudheera.png" alt="" style="width: 150px;">
                    </a>
                </div>


                <!-- Navigation -->
                <nav class="navbar-menu">

                    <a href="{{ route('home') }}" class="nav-link active">
                        Home
                    </a>


                    <div class="nav-dropdown">

                        <a href="javascript:void(0);" class="nav-link">
                            Sarees

                            <span class="dropdown-arrow">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </a>

                        <div class="dropdown-menu">

                            @foreach($featuredProducts as $product)

                                <a href="{{ route('productdetails', ['slug' => $product->slug]) }}">
                                    {{ $product->title }}
                                </a>

                            @endforeach

                        </div>

                    </div>

                    <a href="{{ route('shop') }}" class="nav-link">
                        Shop All
                    </a>
                    <a href="{{ route('blog') }}" class="nav-link">
                        Blogs
                    </a>
                    <a href="{{ route('aboutus') }}" class="nav-link">
                        About Us
                    </a>

                    <a href="{{ route('offers') }}" class="nav-link">
                        Offers
                    </a>

                </nav>


                <!-- Right Section -->
                <div class="navbar-right">

                    <!-- Search -->
                    <div class="search-box">
                        <form action="{{ route('shop') }}" method="GET" class="search-form">
                            <input type="text" name="search" placeholder="Search for Sarees, Fabrics..."
                                value="{{ request('search') }}">

                            <button type="submit" class="search-btn" aria-label="Search">
                                ⌕
                            </button>
                        </form>
                    </div>
                    <style>
                        .search-box {
                            width: 100%;
                        }

                        .search-form {
                            display: flex;
                            align-items: center;
                            width: 100%;
                        }

                        .search-form input {
                            flex: 1;
                            min-width: 0;
                            border: none;
                            outline: none;
                            background: transparent;
                        }

                        .search-form .search-btn {
                            border: none;
                            background: transparent;
                            cursor: pointer;
                            font-size: 22px;
                        }
                    </style>


                    <!-- Account -->
                    @if(Auth::guard('customer')->check())
                        <a href="{{ route('account') }}" class="nav-icon" title="My Account">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-icon" title="Login">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    @endif


                    <!-- Wishlist -->
                    @if(Auth::guard('customer')->check())

                        @php
                            $customer = Auth::guard('customer')->user();

                            $wishlistCount = \App\Models\WishlistItem::where('user_id', $customer->id)
                                ->count();
                        @endphp

                        <a href="{{ route('wishlist') }}" class="nav-icon wishlist-icon" title="Wishlist">

                            <i class="fa-regular fa-heart"></i>

                            <span class="icon-count">
                                {{ $wishlistCount }}
                            </span>

                        </a>

                    @else

                        <a href="{{ route('login') }}" class="nav-icon wishlist-icon" title="Login">

                            <i class="fa-regular fa-heart"></i>

                            <span class="icon-count">0</span>

                        </a>

                    @endif


                    <!-- Cart -->
                    @if(Auth::guard('customer')->check())

                        @php
                            $cartCount = \App\Models\CartItem::where(
                                'user_id',
                                Auth::guard('customer')->id()
                            )->sum('quantity');
                        @endphp

                        <a href="{{ route('cart') }}" class="nav-icon cart-icon" title="Cart">

                            <i class="fa-solid fa-cart-shopping"></i>

                            <span class="icon-count" id="cart-count">
                                {{ $cartCount }}
                            </span>

                        </a>

                    @else

                        <a href="{{ route('login') }}" class="nav-icon cart-icon" title="Login">

                            <i class="fa-solid fa-cart-shopping"></i>

                            <span class="icon-count" id="cart-count">0</span>

                        </a>

                    @endif

                </div>


                <!-- Mobile Menu -->
                <button class="mobile-menu-btn" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <style>
                    /* =========================================================
   NAVBAR MENU
========================================================= */

                    .navbar-menu {
                        display: flex;
                        align-items: center;
                        gap: 25px;
                        height: 100%;
                    }

                    .navbar-right {
                        display: flex;
                        align-items: center;
                        gap: 18px;
                    }

                    .mobile-menu-btn {
                        display: none;
                    }


                    /* =========================================================
   NORMAL NAV LINKS
========================================================= */

                    .navbar-menu>.nav-link,
                    .nav-dropdown>.nav-link {

                        position: relative;

                        height: 70px;

                        display: flex;
                        align-items: center;

                        color: #222;
                        text-decoration: none;

                        font-size: 14px;
                        font-weight: 500;

                        white-space: nowrap;

                        transition: all 0.25s ease;
                    }

                    .navbar-menu>.nav-link:hover,
                    .nav-dropdown>.nav-link:hover {
                        color: #7a1429;
                    }


                    /* =========================================================
   ACTIVE LINK
========================================================= */

                    .nav-link.active {
                        color: #7a1429;
                    }

                    .nav-link.active::after {

                        content: "";

                        position: absolute;

                        bottom: 17px;
                        left: 0;

                        width: 100%;
                        height: 1px;

                        background: #7a1429;
                    }


                    /* =========================================================
   SAREES DROPDOWN - DESKTOP
========================================================= */

                    .nav-dropdown {

                        position: relative;

                        display: inline-flex;

                        align-items: center;

                        height: 100%;
                    }


                    /* Sarees link */

                    .nav-dropdown>.nav-link {

                        display: flex;

                        align-items: center;

                        justify-content: center;

                        gap: 6px;

                        cursor: pointer;
                    }


                    /* Dropdown arrow */

                    .dropdown-arrow {

                        display: inline-flex;

                        align-items: center;
                        justify-content: center;

                        font-size: 9px;

                        transition: transform 0.3s ease;
                    }


                    /* =========================================================
   DESKTOP DROPDOWN BOX
========================================================= */

                    .nav-dropdown .dropdown-menu {

                        position: absolute;

                        top: calc(100% + 5px);

                        left: 50%;

                        width: 220px;

                        padding: 8px 0;

                        margin: 0;

                        display: block;

                        background: #ffffff;

                        border: 1px solid #eee;

                        border-radius: 12px;

                        box-shadow:
                            0 12px 35px rgba(0, 0, 0, 0.14);

                        opacity: 0;

                        visibility: hidden;

                        pointer-events: none;

                        transform:
                            translateX(-50%) translateY(10px);

                        transition:
                            opacity 0.25s ease,
                            visibility 0.25s ease,
                            transform 0.25s ease;

                        z-index: 99999;
                    }


                    /* =========================================================
   DESKTOP DROPDOWN LINKS
========================================================= */

                    .nav-dropdown .dropdown-menu a {

                        position: relative;

                        display: flex;

                        align-items: center;

                        width: 100%;

                        padding: 12px 18px;

                        color: #3b2525;

                        background: transparent;

                        text-decoration: none;

                        font-size: 13px;

                        font-weight: 500;

                        transition: all 0.25s ease;
                    }


                    /* Small gold icon */

                    .nav-dropdown .dropdown-menu a::before {

                        content: "✦";

                        margin-right: 10px;

                        color: #a98145;

                        font-size: 8px;

                        transition: transform 0.25s ease;
                    }


                    /* Hover */

                    .nav-dropdown .dropdown-menu a:hover {

                        background:
                            linear-gradient(135deg,
                                #fff7f3,
                                #f9eee9);

                        color: #651027;

                        padding-left: 23px;
                    }

                    .nav-dropdown .dropdown-menu a:hover::before {

                        transform: rotate(45deg);

                    }


                    /* =========================================================
   OPEN DROPDOWN
========================================================= */

                    .nav-dropdown.open .dropdown-menu {

                        opacity: 1;

                        visibility: visible;

                        pointer-events: auto;

                        transform:
                            translateX(-50%) translateY(0);
                    }


                    /* Arrow rotation */

                    .nav-dropdown.open .dropdown-arrow {

                        transform: rotate(180deg);

                        color: #651027;
                    }


                    /* =========================================================
   RIGHT SECTION
========================================================= */

                    .navbar-right {

                        display: flex;

                        align-items: center;

                        gap: 18px;

                        flex-shrink: 0;
                    }


                    /* =========================================================
   TABLET
========================================================= */

                    @media (max-width: 1200px) {

                        .navbar-container {

                            padding: 0 20px;

                            gap: 15px;
                        }


                        .navbar-menu {

                            gap: 15px;
                        }


                        .nav-link {

                            font-size: 11px;
                        }


                        .search-box {

                            width: 150px;
                        }


                        .navbar-right {

                            gap: 12px;
                        }


                        .nav-dropdown .dropdown-menu {

                            width: 200px;
                        }


                        .nav-dropdown .dropdown-menu a {

                            font-size: 12px;

                            padding: 11px 15px;
                        }
                    }


                    /* =========================================================
   MOBILE NAVBAR
========================================================= */

                    @media (max-width: 991px) {

                        .main-navbar {

                            height: 65px;

                            position: relative;

                            z-index: 10000;
                        }


                        .navbar-container {

                            width: 100%;

                            padding: 0 15px;

                            position: relative;
                        }


                        /* -----------------------------------------
       HIDE RIGHT DESKTOP SECTION
    ----------------------------------------- */

                        .navbar-right {

                            display: none !important;
                        }


                        /* -----------------------------------------
       MOBILE MENU BUTTON
    ----------------------------------------- */

                        .mobile-menu-btn {

                            width: 42px;

                            height: 42px;

                            display: flex !important;

                            align-items: center;

                            justify-content: center;

                            margin-left: auto;

                            border: 1px solid rgba(101, 16, 39, 0.15);

                            border-radius: 12px;

                            background: #fff8f4;

                            color: #651027;

                            font-size: 19px;

                            cursor: pointer;

                            position: relative;

                            z-index: 10002;

                            transition: all 0.25s ease;
                        }


                        .mobile-menu-btn:hover,
                        .mobile-menu-btn.active {

                            background: #651027;

                            color: #ffffff;

                            border-color: #651027;

                            box-shadow:
                                0 5px 15px rgba(101, 16, 39, 0.20);
                        }


                        .mobile-menu-btn i {

                            transition:
                                transform 0.25s ease;
                        }


                        .mobile-menu-btn.active i {

                            transform: rotate(90deg);
                        }


                        /* =====================================================
       MOBILE MENU
    ===================================================== */

                        .navbar-menu {

                            position: absolute;

                            top: calc(100% + 8px);

                            left: 10px;

                            right: 10px;

                            width: auto;

                            height: auto;

                            max-height:
                                calc(100vh - 85px);

                            padding: 12px;

                            display: none !important;

                            flex-direction: column;

                            align-items: stretch;

                            gap: 3px;

                            background:
                                linear-gradient(145deg,
                                    #fffaf6 0%,
                                    #ffffff 50%,
                                    #fdf2ed 100%);

                            border:
                                1px solid rgba(139, 64, 75, 0.12);

                            border-radius: 18px;

                            box-shadow:
                                0 15px 40px rgba(55, 20, 25, 0.18);

                            overflow-y: auto;

                            z-index: 10001;
                        }


                        /* OPEN MOBILE MENU */

                        .navbar-menu.mobile-open {

                            display: flex !important;

                            animation:
                                mobileMenuOpen 0.25s ease;
                        }


                        @keyframes mobileMenuOpen {

                            from {

                                opacity: 0;

                                transform:
                                    translateY(-10px);
                            }

                            to {

                                opacity: 1;

                                transform:
                                    translateY(0);
                            }
                        }


                        /* =====================================================
       MOBILE NORMAL LINKS
    ===================================================== */

                        .navbar-menu>.nav-link,
                        .navbar-menu>.nav-dropdown>.nav-link {

                            width: 100%;

                            min-height: 50px;

                            height: auto;

                            display: flex;

                            align-items: center;

                            justify-content: space-between;

                            padding: 14px 16px;

                            margin: 0;

                            border-radius: 12px;

                            color: #3b2525;

                            font-size: 13px;

                            font-weight: 600;

                            text-decoration: none;

                            white-space: normal;

                            transition: all 0.25s ease;
                        }


                        .navbar-menu>.nav-link:hover,
                        .navbar-menu>.nav-dropdown>.nav-link:hover {

                            background:
                                linear-gradient(135deg,
                                    #f8e9e3,
                                    #fff4ef);

                            color: #651027;

                            padding-left: 20px;
                        }


                        /* Remove desktop active underline */

                        .navbar-menu .nav-link.active::after {

                            display: none;
                        }


                        /* =====================================================
       MOBILE SAREES DROPDOWN
    ===================================================== */

                        .nav-dropdown {

                            width: 100%;

                            display: block;

                            height: auto;

                            position: relative;
                        }


                        .nav-dropdown>.nav-link {

                            cursor: pointer;
                        }


                        /* =====================================================
       MOBILE DROPDOWN BOX
    ===================================================== */

                        .nav-dropdown .dropdown-menu {

                            position: static !important;

                            width: 100% !important;

                            display: none !important;

                            padding: 6px;

                            margin: 0 0 5px;

                            background: #fffaf7;

                            border:
                                1px solid #f0dfd8;

                            border-radius: 12px;

                            box-shadow: none;

                            opacity: 1 !important;

                            visibility: visible !important;

                            pointer-events: auto !important;

                            transform: none !important;
                        }


                        /* OPEN */

                        .nav-dropdown.open .dropdown-menu {

                            display: block !important;

                            animation:
                                dropdownOpen 0.2s ease;
                        }


                        @keyframes dropdownOpen {

                            from {

                                opacity: 0;

                                transform:
                                    translateY(-5px);
                            }

                            to {

                                opacity: 1;

                                transform:
                                    translateY(0);
                            }
                        }


                        /* =====================================================
       MOBILE DROPDOWN LINKS
    ===================================================== */

                        .nav-dropdown .dropdown-menu a {

                            display: flex;

                            align-items: center;

                            width: 100%;

                            padding: 11px 13px;

                            border-radius: 8px;

                            color: #694d48;

                            font-size: 12px;

                            text-decoration: none;

                            transition: all 0.2s ease;
                        }


                        .nav-dropdown .dropdown-menu a::before {

                            content: "✦";

                            margin-right: 9px;

                            font-size: 8px;

                            color: #a98145;
                        }


                        .nav-dropdown .dropdown-menu a:hover {

                            background: #f9eee9;

                            color: #651027;

                            padding-left: 18px;
                        }


                        /* =====================================================
       MOBILE DROPDOWN ARROW
    ===================================================== */

                        .dropdown-arrow {

                            width: 28px;

                            height: 28px;

                            display: flex;

                            align-items: center;

                            justify-content: center;

                            flex-shrink: 0;

                            border-radius: 50%;

                            background: #f8ebe5;

                            color: #651027;

                            font-size: 10px;

                            transition: all 0.25s ease;
                        }


                        .nav-dropdown.open .dropdown-arrow {

                            transform: rotate(180deg);

                            background: #651027;

                            color: #ffffff;
                        }
                    }


                    /* =========================================================
   SMALL MOBILE
========================================================= */

                    @media (max-width: 480px) {

                        .main-navbar {

                            height: 60px;
                        }


                        .navbar-container {

                            padding: 0 12px;
                        }


                        .logo-icon {

                            width: 32px;

                            height: 32px;

                            font-size: 30px;
                        }


                        .logo-name {

                            font-size: 18px;
                        }


                        .logo-tagline {

                            font-size: 6px;

                            letter-spacing: 1.5px;
                        }


                        .mobile-menu-btn {

                            width: 39px;

                            height: 39px;

                            border-radius: 10px;

                            font-size: 17px;
                        }


                        .navbar-menu {

                            left: 7px;

                            right: 7px;

                            top: calc(100% + 6px);

                            padding: 9px;

                            border-radius: 16px;

                            max-height:
                                calc(100vh - 75px);
                        }


                        .navbar-menu>.nav-link,
                        .navbar-menu>.nav-dropdown>.nav-link {

                            min-height: 47px;

                            padding: 12px 14px;

                            font-size: 12px;
                        }


                        .nav-dropdown .dropdown-menu a {

                            padding: 10px 11px;

                            font-size: 11px;
                        }
                    }
                </style>
                {{--
                Your existing HTML for the navigation can remain exactly as it is.

                The important addition is the desktop dropdown section:

                .nav-dropdown .dropdown-menu {
                position: absolute;
                top: calc(100% + 5px);
                left: 50%;
                width: 220px;
                ...
                }

                and:

                .nav-dropdown.open .dropdown-menu {
                opacity: 1;
                visibility: visible;
                pointer-events: auto;
                transform: translateX(-50%) translateY(0);
                } --}}

            </div>

        </header>
    </div>

    @yield('content')
    {{-- @include('sweetalert::alert') --}}

    <!-------footer----->
    <style>
        /* =========================================
   SUDHEERA FOOTER
========================================= */

        .sudheera-footer {
            width: 100%;

            margin-top: 30px;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #430014;
        }


        /* =========================================
   NEWSLETTER AREA
========================================= */

        .footer-newsletter {
            position: relative;

            width: 100%;

            min-height: 105px;

            padding: 14px 48px 15px 50px;

            display: flex;

            align-items: center;

            gap: 25px;

            overflow: hidden;

            background:
                linear-gradient(90deg,
                    #470015 0%,
                    #65001e 48%,
                    #4c0016 100%);
        }


        /* =========================================
   LOTUS
========================================= */

        .footer-lotus {
            flex-shrink: 0;

            width: 42px;
            height: 55px;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #d6a94b;

            font-size: 40px;

            opacity: 0.95;
        }


        /* =========================================
   NEWSLETTER CONTENT
========================================= */

        .newsletter-content {
            position: relative;

            z-index: 3;

            width: 390px;

            flex-shrink: 0;
        }

        .newsletter-content h2 {
            margin: 0;

            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: 22px;

            line-height: 1.15;

            font-weight: 600;

            color: #e6bd67;
        }

        .newsletter-content p {
            margin: 2px 0 7px;

            font-size: 10px;

            line-height: 1.3;

            color: rgba(255,
                    240,
                    220,
                    0.82);
        }


        /* =========================================
   SUBSCRIBE FORM
========================================= */

        .subscribe-form {
            width: 355px;

            height: 30px;

            display: flex;

            overflow: hidden;

            border-radius: 3px;

            background: #fff;
        }

        .subscribe-form input {
            flex: 1;

            min-width: 0;

            height: 100%;

            padding: 0 11px;

            border: none;

            outline: none;

            font-size: 8px;

            color: #332c29;

            background: #fff;
        }

        .subscribe-form input::placeholder {
            color: #817773;
        }

        .subscribe-form button {
            width: 98px;

            height: 100%;

            border: none;

            outline: none;

            cursor: pointer;

            font-size: 7px;

            font-weight: 700;

            letter-spacing: 0.2px;

            color: #fff;

            background:
                linear-gradient(90deg,
                    #a66b20,
                    #c58b36);

            transition:
                background 0.25s ease,
                transform 0.2s ease;
        }

        .subscribe-form button:hover {
            background:
                linear-gradient(90deg,
                    #bd7c27,
                    #d49b46);
        }

        .subscribe-form button:active {
            transform: scale(0.98);
        }

        .subscribe-form button span {
            margin-left: 7px;

            font-size: 10px;
        }


        /* =========================================
   FOOTER HIGHLIGHTS
========================================= */

        .footer-highlights {
            position: relative;

            z-index: 3;

            margin-left: auto;

            padding-right: 55px;

            display: flex;

            align-items: center;

            gap: 28px;
        }

        .footer-highlight {
            display: flex;

            align-items: center;

            gap: 6px;

            color: rgba(255,
                    236,
                    204,
                    0.9);

            white-space: nowrap;
        }

        .highlight-icon {
            width: 30px;
            height: 30px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(213,
                    171,
                    86,
                    0.5);

            border-radius: 50%;

            color: #d7aa51;

            font-size: 20px;
        }

        .footer-highlight span {
            font-size: 12px;

            font-weight: 500;
        }


        /* =========================================
   DECORATIVE SAREE / FLORAL SIDE
========================================= */

        .footer-saree-decoration {
            position: absolute;

            z-index: 1;

            right: -10px;

            bottom: -55px;

            width: 270px;

            height: 140px;

            border-radius: 50% 0 0 0;

            transform:
                rotate(-7deg);

            opacity: 0.95;

            background:
                radial-gradient(ellipse at 75% 15%,
                    rgba(255, 222, 165, 0.95) 0 5%,
                    transparent 6%),
                radial-gradient(ellipse at 60% 35%,
                    rgba(209, 155, 68, 0.9) 0 4%,
                    transparent 5%),
                linear-gradient(135deg,
                    #9c1534,
                    #650019 45%,
                    #3d0010 100%);

            box-shadow:
                -25px -12px 35px rgba(193, 126, 38, 0.22);
        }


        /* =========================================
   FOOTER BOTTOM
========================================= */

        .footer-bottom {
            width: 100%;

            padding: 12px 50px;

            background: #30000e;

            border-top: 1px solid rgba(216,
                    173,
                    86,
                    0.12);
        }

        .footer-bottom-inner {
            max-width: 1200px;

            margin: auto;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .footer-bottom p {
            margin: 0;

            font-size: 11px;

            color: rgba(255,
                    238,
                    216,
                    0.55);
        }

        .footer-links {
            display: flex;

            gap: 20px;
        }

        .footer-links a {
            text-decoration: none;

            font-size: 11px;

            color: rgba(255,
                    238,
                    216,
                    0.65);

            transition:
                color 0.2s ease;
        }

        .footer-links a:hover {
            color: #e1b85e;
        }


        /* =========================================
   TABLET
========================================= */

        @media (max-width: 1000px) {

            .footer-newsletter {
                padding-left: 30px;
                padding-right: 30px;

                gap: 15px;
            }

            .newsletter-content {
                width: 350px;
            }

            .subscribe-form {
                width: 330px;
            }

            .footer-highlights {
                gap: 15px;

                padding-right: 20px;
            }

            .footer-highlight span {
                font-size: 7px;
            }

        }


        /* =========================================
   MOBILE
========================================= */

        @media (max-width: 700px) {

            .footer-newsletter {
                min-height: auto;

                padding: 24px 18px;

                flex-direction: column;

                align-items: flex-start;

                gap: 16px;
            }

            .footer-lotus {
                position: absolute;

                top: 12px;

                right: 18px;

                width: 35px;
                height: 35px;

                font-size: 30px;
            }

            .newsletter-content {
                width: 100%;
            }

            .newsletter-content h2 {
                font-size: 19px;
            }

            .newsletter-content p {
                font-size: 9px;

                max-width: 300px;
            }

            .subscribe-form {
                width: 100%;

                max-width: 430px;

                height: 35px;
            }

            .subscribe-form input {
                font-size: 10px;
            }

            .subscribe-form button {
                width: 105px;

                font-size: 8px;
            }

            .footer-highlights {
                width: 100%;

                margin: 0;

                padding: 0;

                display: grid;

                grid-template-columns:
                    repeat(2, 1fr);

                gap: 12px;
            }

            .footer-highlight {
                gap: 7px;
            }

            .footer-highlight span {
                font-size: 9px;
            }

            .footer-saree-decoration {
                right: -80px;

                opacity: 0.3;
            }

            .footer-bottom {
                padding: 15px 18px;
            }

            .footer-bottom-inner {
                flex-direction: column;

                gap: 10px;

                text-align: center;
            }

            .footer-links {
                gap: 12px;

                flex-wrap: wrap;

                justify-content: center;
            }

        }


        /* =========================================
   SMALL MOBILE
========================================= */

        @media (max-width: 400px) {

            .subscribe-form button {
                width: 90px;
            }

            .subscribe-form button span {
                margin-left: 3px;
            }

            .footer-highlight span {
                font-size: 8px;
            }

        }
    </style>
    <style>
        @media (max-width: 767px) {
            .newsletter-content {
                margin-left: 0 !important;
            }
        }
    </style>

    <footer class="sudheera-footer">

        {{-- <div class="footer-newsletter">



            <!-- Newsletter Content -->
            <div class="newsletter-content" style="margin-left: 50px;">

                <h2>
                    Join the Sudheera Family
                </h2>

                <p>
                    Subscribe for latest collections, exclusive offers & style inspiration
                </p>

                <form class="subscribe-form">

                    <input type="email" placeholder="Enter your email address" required>

                    <button type="submit">
                        SUBSCRIBE
                        <span>→</span>
                    </button>

                </form>

            </div>


            <!-- Footer Highlights -->
            <div class="footer-highlights">

                <div class="footer-highlight">

                    <div class="highlight-icon">
                        ◉
                    </div>

                    <span>
                        Exclusive Offers
                    </span>

                </div>


                <div class="footer-highlight">

                    <div class="highlight-icon">
                        ◇
                    </div>

                    <span>
                        New Arrivals
                    </span>

                </div>


                <div class="footer-highlight">

                    <div class="highlight-icon">
                        ▣
                    </div>

                    <span>
                        Style Guides
                    </span>

                </div>


                <div class="footer-highlight">

                    <div class="highlight-icon">
                        ♡
                    </div>
                    <span>
                        Wishlist
                    </span>

                </div>

            </div>


            <!-- Decorative saree -->
            <div class="footer-saree-decoration"></div>

        </div> --}}


        <!-- =========================================================
     FOOTER
========================================================= -->

        <!------- FOOTER ------->
        <style>
            /* =========================================
       SUDHEERA FOOTER
    ========================================= */

            .sudheera-footer {
                width: 100%;
                margin-top: 0px;
                background: #2c2118;
                color: #fff;
                font-family: Arial, Helvetica, sans-serif;
            }

            /* =========================================
       NEWSLETTER TOP
    ========================================= */

            .sudheera-footer-newsletter {
                background: linear-gradient(90deg,
                        #470015 0%,
                        #65001e 50%,
                        #470015 100%);

                padding: 28px 0;
            }

            .sudheera-newsletter-inner {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 30px;
            }

            .sudheera-newsletter-content h3 {
                margin: 0 0 6px;
                color: #e6bd67;
                font-family: Georgia, "Times New Roman", serif;
                font-size: 24px;
                font-weight: 600;
            }

            .sudheera-newsletter-content p {
                margin: 0;
                color: rgba(255, 240, 220, 0.82);
                font-size: 12px;
                line-height: 1.5;
            }

            .sudheera-newsletter-form {
                display: flex;
                width: 430px;
                max-width: 100%;
                height: 44px;
            }

            .sudheera-newsletter-form input {
                flex: 1;
                min-width: 0;
                border: 0;
                outline: none;
                padding: 0 15px;
                background: #fff;
                color: #333;
                font-size: 12px;
            }

            .sudheera-newsletter-form input::placeholder {
                color: #888;
            }

            .sudheera-newsletter-form button {
                width: 125px;
                border: 0;
                outline: none;
                background: #a96b18;
                color: #fff;
                cursor: pointer;
                font-size: 11px;
                font-weight: 600;
                letter-spacing: .7px;
                transition: .3s ease;
            }

            .sudheera-newsletter-form button:hover {
                background: #875310;
            }


            /* =========================================
       MAIN FOOTER
    ========================================= */

            .sudheera-footer-main {
                padding: 10px 0 10px;

                display: grid;
                grid-template-columns:
                    1.7fr 1fr 1.2fr 1.2fr 1.5fr;

                gap: 45px;
            }


            /* =========================================
       LOGO
    ========================================= */

            .sudheera-footer-logo {
                display: inline-block;
                margin-bottom: 18px;

                color: #fff;
                text-decoration: none;

                font-family: Georgia, "Times New Roman", serif;
                font-size: 27px;
                letter-spacing: 1.5px;
            }

            .sudheera-footer-logo span {
                display: block;

                margin-top: -2px;

                color: #c99a59;

                font-family: inherit;
                font-size: 11px;
                letter-spacing: 4px;
            }


            /* =========================================
       ABOUT
    ========================================= */

            .sudheera-footer-about p {
                max-width: 320px;

                margin: 0;

                color: #c7beb5;

                font-size: 13px;
                line-height: 1.8;
            }


            /* =========================================
       FOOTER HEADINGS
    ========================================= */

            .sudheera-footer-col h4 {
                margin: 5px 0 22px;

                color: #fff;

                font-size: 15px;
                font-weight: 500;
            }


            /* =========================================
       LINKS
    ========================================= */

            .sudheera-footer-col ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .sudheera-footer-col ul li {
                margin-bottom: 12px;
            }

            .sudheera-footer-col ul li a {
                color: #c7beb5;

                text-decoration: none;

                font-size: 13px;

                transition: .3s ease;
            }

            .sudheera-footer-col ul li a:hover {
                color: #c99a59;
                padding-left: 4px;
            }


            /* =========================================
       SOCIAL ICONS
    ========================================= */

            .sudheera-social {
                display: flex;
                gap: 9px;

                margin-top: 22px;
            }

            .sudheera-social a {
                width: 36px;
                height: 36px;

                display: flex;
                align-items: center;
                justify-content: center;

                border: 1px solid #66584c;
                border-radius: 50%;

                color: #d4c5b6;
                text-decoration: none;

                transition: .3s ease;
            }

            .sudheera-social a:hover {
                background: #a96b18;
                border-color: #a96b18;
                color: #fff;
            }


            /* =========================================
       CONTACT
    ========================================= */

            .sudheera-contact-item {
                display: flex;
                align-items: flex-start;

                gap: 11px;

                margin-bottom: 17px;
            }

            .sudheera-contact-icon {
                width: 20px;
                flex-shrink: 0;

                color: #c99a59;

                font-size: 15px;
            }

            .sudheera-contact-item p,
            .sudheera-contact-item a {
                margin: 0;

                color: #c7beb5;

                font-size: 12px;
                line-height: 1.7;

                text-decoration: none;
            }

            .sudheera-contact-item a:hover {
                color: #c99a59;
            }


            /* =========================================
       FOOTER BOTTOM
    ========================================= */

            .sudheera-footer-bottom {
                min-height: 65px;

                border-top: 1px solid #51463d;

                display: flex;
                align-items: center;
                justify-content: space-between;

                gap: 20px;
            }

            .sudheera-footer-bottom p {
                margin: 0;

                color: #958b82;

                font-size: 11px;
            }

            .sudheera-footer-payment {
                display: flex;
                align-items: center;

                gap: 10px;

                color: #958b82;

                font-size: 11px;
            }


            /* =========================================
       TABLET
    ========================================= */

            @media (max-width: 1100px) {

                .sudheera-footer-main {
                    grid-template-columns:
                        1.5fr 1fr 1fr 1fr;

                    gap: 35px;
                }

                .sudheera-footer-contact {
                    grid-column: span 2;
                }

            }


            /* =========================================
       MOBILE
    ========================================= */

            @media (max-width: 767px) {

                .sudheera-footer-newsletter {
                    padding: 30px 0;
                }

                .sudheera-newsletter-inner {
                    flex-direction: column;
                    align-items: flex-start;

                    gap: 18px;
                }

                .sudheera-newsletter-content h3 {
                    font-size: 21px;
                }

                .sudheera-newsletter-content p {
                    font-size: 11px;
                }

                .sudheera-newsletter-form {
                    width: 100%;
                    height: 42px;
                }

                .sudheera-newsletter-form button {
                    width: 110px;
                }


                .sudheera-footer-main {
                    grid-template-columns: repeat(2, 1fr);

                    gap: 35px 25px;

                    padding: 45px 0 35px;
                }

                .sudheera-footer-about {
                    grid-column: span 2;
                }

                .sudheera-footer-contact {
                    grid-column: span 2;
                }

                .sudheera-footer-about p {
                    max-width: 100%;
                }


                .sudheera-footer-bottom {
                    min-height: auto;

                    padding: 20px 0;

                    flex-direction: column;

                    justify-content: center;

                    text-align: center;

                    gap: 10px;
                }

                .sudheera-footer-payment {
                    justify-content: center;

                    flex-wrap: wrap;
                }

            }


            /* =========================================
       SMALL MOBILE
    ========================================= */

            @media (max-width: 480px) {

                .sudheera-footer-main {
                    grid-template-columns: 1fr;

                    gap: 28px;
                }

                .sudheera-footer-about,
                .sudheera-footer-contact {
                    grid-column: span 1;
                }

                .sudheera-footer-col h4 {
                    margin-bottom: 15px;
                }

                .sudheera-newsletter-form {
                    height: 40px;
                }

                .sudheera-newsletter-form input {
                    font-size: 11px;
                }

                .sudheera-newsletter-form button {
                    width: 100px;
                    font-size: 10px;
                }

            }
        </style>


        <footer class="sudheera-footer">


            <!-- =========================================
         MAIN FOOTER
    ========================================= -->

            <div class="container">

                <div class="sudheera-footer-main">


                    <!-- ABOUT -->

                    <div class="sudheera-footer-col sudheera-footer-about">

                        <a href="{{ route('home') }}" class="sudheera-footer-logo">

                            <img src="{{ asset('website') }}/images/llll.png" alt=""
                                style="width: 200px; justify-content: center;">

                        </a>


                        <p>
                            Discover timeless elegance with our collection of
                            beautifully crafted sarees. Traditional artistry,
                            premium fabrics and modern designs made for every
                            special occasion.
                        </p>


                        <div class="sudheera-social">

                            <a href="#" aria-label="Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>

                            <a href="#" aria-label="Instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>

                            <a href="#" aria-label="Youtube">
                                <i class="fa-brands fa-youtube"></i>
                            </a>

                            <a href="#" aria-label="Pinterest">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </a>

                        </div>

                    </div>


                    <!-- QUICK LINKS -->

                    <div class="sudheera-footer-col">

                        <h4>
                            Quick Links
                        </h4>

                        <ul>

                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">
                                    Shop
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('aboutus') }}">
                                    About Us
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('blog') }}">
                                    Blogs
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contactus') }}">
                                    Contact Us
                                </a>
                            </li>

                        </ul>

                    </div>


                    <!-- CUSTOMER SERVICE -->

                    <div class="sudheera-footer-col">

                        <h4>
                            Customer Service
                        </h4>

                        <ul>

                            <li>
                                <a href="{{ route('account') }}">
                                    My Account
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('wishlist') }}">
                                    Wishlist
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('cart') }}">
                                    Shopping Cart
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shippingdelivery') }}">
                                    Shipping & Delivery
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('returnexchange') }}">
                                    Returns & Exchange
                                </a>
                            </li>

                        </ul>

                    </div>


                    <!-- INFORMATION -->

                    <div class="sudheera-footer-col">

                        <h4>
                            Information
                        </h4>

                        <ul>

                            <li>
                                <a href="{{ route('privacypolicy') }}">
                                    Privacy Policy
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('terms') }}">
                                    Terms & Conditions
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('faq') }}">
                                    FAQs
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contactus') }}">
                                    Contact
                                </a>
                            </li>

                        </ul>

                    </div>


                    <!-- CONTACT -->

                    <div class="sudheera-footer-col sudheera-footer-contact">

                        <h4>
                            Get In Touch
                        </h4>


                        <div class="sudheera-contact-item">

                            <span class="sudheera-contact-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </span>

                            <p>
                                123 Silk Street,<br>
                                Bengaluru, Karnataka,<br>
                                India - 560001
                            </p>

                        </div>


                        <div class="sudheera-contact-item">

                            <span class="sudheera-contact-icon">
                                <i class="fa-solid fa-phone"></i>
                            </span>

                            <a href="tel:+919876543210">
                                +91 98765 43210
                            </a>

                        </div>


                        <div class="sudheera-contact-item">

                            <span class="sudheera-contact-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </span>

                            <a href="mailto:info@sudheerasarees.com">
                                info@sudheerasarees.com
                            </a>

                        </div>

                    </div>


                </div>




            </div>

        </footer>


        <style>
            /* =========================================================
   SUDHEERA FOOTER
========================================================= */

            .sudheera-footer {
                background: linear-gradient(90deg,
                        #470015 0%,
                        #65001e 48%,
                        #4c0016 100%);

                color: #fff;
                padding-top: 0px;
            }


            /* =========================================================
   MAIN FOOTER
========================================================= */

            .sudheera-footer-main {
                display: grid;
                grid-template-columns: 1.7fr 1fr 1.2fr 1.2fr 1.5fr;
                gap: 45px;
                padding-bottom: 10px;
                padding-top: 20px;
                margin-left: 20px;
                margin-right: 20px;
            }


            /* =========================================================
   LOGO
========================================================= */

            .sudheera-footer-logo {
                display: inline-block;
                margin-bottom: 20px;
                color: #fff;
                text-decoration: none;
                font-family: "Instrument Serif", serif;
                font-size: 27px;
                letter-spacing: 1.5px;
            }

            .sudheera-footer-logo span {
                display: block;
                font-family: inherit;
                font-size: 12px;
                letter-spacing: 4px;
                color: #c99a59;
                margin-top: -3px;
            }


            /* =========================================================
   ABOUT
========================================================= */

            .footer-about p {
                max-width: 320px;
                color: #c7beb5;
                font-size: 13px;
                line-height: 1.8;
                margin: 0;
            }


            /* =========================================================
   FOOTER HEADINGS
========================================================= */

            .sudheera-footer-col h4 {
                color: #fff;
                font-size: 15px;
                font-weight: 500;
                margin: 5px 0 22px;
            }


            /* =========================================================
   LINKS
========================================================= */

            .sudheera-footer-col ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .sudheera-footer-col ul li {
                margin-bottom: 12px;
            }

            .sudheera-footer-col ul li a {
                color: #c7beb5;
                text-decoration: none;
                font-size: 13px;
                transition: all .3s ease;
            }

            .sudheera-footer-col ul li a:hover {
                color: #c99a59;
                padding-left: 4px;
            }


            /* =========================================================
   SOCIAL
========================================================= */

            .sudheera-social {
                display: flex;
                gap: 9px;
                margin-top: 24px;
            }

            .sudheera-social a {
                width: 36px;
                height: 36px;
                border: 1px solid #66584c;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #d4c5b6;
                text-decoration: none;
                transition: .3s ease;
            }

            .sudheera-social a:hover {
                background: #a96b18;
                border-color: #a96b18;
                color: #fff;
            }


            /* =========================================================
   CONTACT
========================================================= */

            .footer-contact-item {
                display: flex;
                align-items: flex-start;
                gap: 11px;
                margin-bottom: 17px;
            }

            .footer-contact-icon {
                color: #c99a59;
                font-size: 15px;
                width: 20px;
                flex-shrink: 0;
            }

            .footer-contact-item p,
            .footer-contact-item a {
                margin: 0;
                color: #c7beb5;
                font-size: 12px;
                line-height: 1.7;
                text-decoration: none;
            }

            .footer-contact-item a:hover {
                color: #c99a59;
            }


            /* =========================================================
   NEWSLETTER
========================================================= */

            .sudheera-footer-newsletter {
                border-top: 1px solid #51463d;
                border-bottom: 1px solid #51463d;
                padding: 30px 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 30px;
            }

            .newsletter-content h3 {
                margin: 0 0 5px;
                color: #fff;
                font-family: "Instrument Serif", serif;
                font-size: 25px;
                font-weight: 400;
            }

            .newsletter-content p {
                margin: 0;
                color: #bdb2a8;
                font-size: 12px;
                margin-bottom: 10px;
            }


            /* =========================================================
   NEWSLETTER FORM
========================================================= */

            .newsletter-form {
                display: flex;
                width: 430px;
                max-width: 100%;
                height: 46px;
            }

            .newsletter-form input {
                flex: 1;
                min-width: 0;
                border: 1px solid #66584c;
                border-right: 0;
                background: transparent;
                color: #fff;
                padding: 0 15px;
                outline: none;
                font-size: 12px;
            }

            .newsletter-form input::placeholder {
                color: #958b82;
            }

            .newsletter-form button {
                width: 125px;
                border: 0;
                background: #a96b18;
                color: #fff;
                cursor: pointer;
                font-size: 11px;
                font-weight: 600;
                letter-spacing: .7px;
                transition: .3s ease;
            }

            .newsletter-form button:hover {
                background: #875310;
            }


            /* =========================================================
   FOOTER BOTTOM
========================================================= */

            .sudheera-footer-bottom {
                min-height: 65px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
            }

            .sudheera-footer-bottom p {
                margin: 0;
                color: #958b82;
                font-size: 11px;
            }

            .footer-payment {
                display: flex;
                align-items: center;
                gap: 10px;
                color: #958b82;
                font-size: 11px;
            }


            /* =========================================================
   TABLET
========================================================= */

            @media (max-width: 1100px) {

                .sudheera-footer-main {
                    grid-template-columns: 1.5fr 1fr 1fr 1fr;
                    gap: 35px;
                }

                .footer-contact {
                    grid-column: span 2;
                }

            }


            /* =========================================================
   MOBILE
========================================================= */

            @media (max-width: 767px) {

                .sudheera-footer {
                    padding-top: 45px;
                }

                .sudheera-footer-main {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 35px 25px;
                    padding-bottom: 35px;
                }

                .footer-about {
                    grid-column: span 2;
                }

                .footer-contact {
                    grid-column: span 2;
                }

                .footer-about p {
                    max-width: 100%;
                }

                .sudheera-footer-newsletter {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 18px;
                }

                .newsletter-form {
                    width: 100%;
                }

                .sudheera-footer-bottom {
                    padding: 20px 0;
                    flex-direction: column;
                    justify-content: center;
                    text-align: center;
                }

            }


            /* =========================================================
   SMALL MOBILE
========================================================= */

            @media (max-width: 480px) {

                .sudheera-footer-main {
                    grid-template-columns: 1fr;
                    gap: 28px;
                }

                .footer-about,
                .footer-contact {
                    grid-column: span 1;
                }

                .sudheera-footer-col h4 {
                    margin-bottom: 15px;
                }

                .newsletter-form {
                    height: 44px;
                }

                .newsletter-form button {
                    width: 105px;
                }

            }
        </style>


        <!-- Bottom Footer -->
        <div class="footer-bottom">

            <div class="footer-bottom-inner">

                <p>
                    © 2026 Sudheera. All rights reserved.
                </p>

                <div class="footer-links">

                    <a href="#">
                        Privacy Policy
                    </a>

                    <a href="#">
                        Terms & Conditions
                    </a>

                    <a href="#">
                        Contact Us
                    </a>

                </div>

            </div>

        </div>

    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            /* =====================================================
               MOBILE MENU TOGGLE
            ===================================================== */

            const mobileMenuBtn = document.querySelector(".mobile-menu-btn");
            const navbarMenu = document.querySelector(".navbar-menu");

            if (mobileMenuBtn && navbarMenu) {

                mobileMenuBtn.addEventListener("click", function (e) {

                    e.preventDefault();
                    e.stopPropagation();

                    navbarMenu.classList.toggle("mobile-open");
                    mobileMenuBtn.classList.toggle("active");

                    /* Change hamburger to X */
                    const icon = mobileMenuBtn.querySelector("i");

                    if (navbarMenu.classList.contains("mobile-open")) {
                        icon.classList.remove("fa-bars");
                        icon.classList.add("fa-xmark");
                    } else {
                        icon.classList.remove("fa-xmark");
                        icon.classList.add("fa-bars");
                    }

                });
            }


            /* =====================================================
               SAREES DROPDOWN
            ===================================================== */

            const dropdown = document.querySelector(".nav-dropdown");

            if (dropdown) {

                const dropdownButton = dropdown.querySelector(".nav-link");

                if (dropdownButton) {

                    dropdownButton.addEventListener("click", function (e) {

                        e.preventDefault();
                        e.stopPropagation();

                        dropdown.classList.toggle("open");

                    });
                }


                /* Prevent dropdown menu links from triggering parent */
                const dropdownMenu = dropdown.querySelector(".dropdown-menu");

                if (dropdownMenu) {

                    dropdownMenu.addEventListener("click", function (e) {
                        e.stopPropagation();
                    });

                }
            }


            /* =====================================================
               CLOSE MOBILE MENU WHEN CLICKING OUTSIDE
            ===================================================== */

            document.addEventListener("click", function (e) {

                if (
                    navbarMenu &&
                    mobileMenuBtn &&
                    !navbarMenu.contains(e.target) &&
                    !mobileMenuBtn.contains(e.target)
                ) {

                    navbarMenu.classList.remove("mobile-open");
                    mobileMenuBtn.classList.remove("active");

                    const icon = mobileMenuBtn.querySelector("i");

                    if (icon) {
                        icon.classList.remove("fa-xmark");
                        icon.classList.add("fa-bars");
                    }

                }

            });


            /* =====================================================
               CLOSE MOBILE MENU AFTER CLICKING NORMAL LINK
            ===================================================== */

            if (navbarMenu) {

                const normalLinks = navbarMenu.querySelectorAll(
                    ".nav-link:not(.nav-dropdown > .nav-link)"
                );

                normalLinks.forEach(function (link) {

                    link.addEventListener("click", function () {

                        navbarMenu.classList.remove("mobile-open");
                        mobileMenuBtn.classList.remove("active");

                        const icon = mobileMenuBtn.querySelector("i");

                        if (icon) {
                            icon.classList.remove("fa-xmark");
                            icon.classList.add("fa-bars");
                        }

                    });

                });

            }

        });
    </script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {

            const loader =
                document.getElementById("pageLoader");

            if (!loader) {
                return;
            }


            /* =========================================
               CHECK FIRST VISIT
            ========================================= */

            const loaderShown =
                sessionStorage.getItem("sudheeraLoaderShown");


            /* =========================================
               ALREADY SHOWN
            ========================================= */

            if (loaderShown === "true") {

                loader.remove();

                return;
            }


            /* =========================================
               FIRST VISIT
            ========================================= */

            sessionStorage.setItem(
                "sudheeraLoaderShown",
                "true"
            );


            /* =========================================
               FAST PREMIUM INTRO
            ========================================= */

            setTimeout(function () {

                loader.style.opacity = "0";

                loader.style.visibility = "hidden";

                loader.style.pointerEvents = "none";


                setTimeout(function () {

                    loader.remove();

                }, 700);

            }, 2200);

        });

    </script>

</body>

</html>