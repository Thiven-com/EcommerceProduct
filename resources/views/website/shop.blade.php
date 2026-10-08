@extends('layouts.website')

@section('content')

    <style>
        /* =========================================================
                                       SUDHEERA SHOP PAGE
                                    ========================================================= */

        .sudheera-shop {
            background: #fffdf9;
            color: #241719;
        }

        /* Breadcrumb */
        .shop-breadcrumb {
            padding: 45px 0 18px;
        }

        .shop-breadcrumb-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #777;
            margin-left: 30px;
        }

        .shop-breadcrumb-list a {
            color: #6b001b;
            text-decoration: none;
        }

        /* Header */
        .shop-heading {
            padding: 15px 0 25px;
        }

        .shop-heading-inner {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;
        }

        .shop-eyebrow {
            color: #8a2035;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .shop-title {
            font-family: Georgia, serif;
            font-size: 42px;
            line-height: 1.1;
            font-weight: 400;
            margin: 0;
            color: #420014;
        }

        .shop-subtitle {
            color: #777;
            margin: 9px 0 0;
            font-size: 14px;
        }

        .shop-count {
            color: #555;
            font-size: 13px;
            white-space: nowrap;
        }

        /* Main */
        .shop-main {
            padding: 10px 0 70px;
        }

        .shop-layout {
            display: grid;
            grid-template-columns: 250px minmax(0, 1fr);
            gap: 30px;
            margin: 20px;
        }

        /* =========================================================
                                       SIDEBAR
                                    ========================================================= */

        .shop-sidebar {
            background: #fff;
            border: 1px solid #eadfd9;
            border-radius: 16px;
            padding: 22px;
            height: fit-content;
            position: sticky;
            top: 90px;
        }

        .filter-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee5df;
        }

        .filter-title h5 {
            margin: 0;
            font-family: Georgia, serif;
            font-size: 20px;
            font-weight: 400;
            color: #470018;
        }

        .filter-clear {
            font-size: 11px;
            color: #8a2035;
            text-decoration: none;
            text-transform: uppercase;
        }

        .filter-group {
            padding: 22px 0;
            border-bottom: 1px solid #eee5df;
        }

        .filter-group:last-child {
            border-bottom: 0;
        }

        .filter-group-title {
            font-size: 13px;
            font-weight: 700;
            color: #3b2025;
            margin-bottom: 15px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
            cursor: pointer;
        }

        .filter-option-left {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .filter-option input {
            width: 16px;
            height: 16px;
            accent-color: #72001e;
            cursor: pointer;
        }

        .filter-option span {
            font-size: 13px;
            color: #555;
        }

        .filter-number {
            font-size: 11px !important;
            color: #aaa !important;
        }

        .filter-price {
            display: flex;
            gap: 8px;
        }

        .filter-price input {
            width: 50%;
            height: 38px;
            border: 1px solid #ddd1cb;
            border-radius: 8px;
            padding: 0 10px;
            outline: none;
            font-size: 12px;
        }

        .filter-button {
            width: 100%;
            height: 44px;
            border: 0;
            border-radius: 8px;
            background: #650019;
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .5px;
            margin-top: 5px;
        }

        /* =========================================================
                                       TOOLBAR
                                    ========================================================= */

        .shop-toolbar {
            min-height: 52px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e9dfda;
            margin-bottom: 20px;
        }

        .shop-toolbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .mobile-filter-btn {
            display: none;
            border: 1px solid #ddd1cb;
            background: #fff;
            border-radius: 8px;
            height: 40px;
            padding: 0 14px;
            font-size: 12px;
        }

        .category-pills {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .category-pill {
            border: 1px solid #ded3ce;
            background: #fff;
            color: #555;
            border-radius: 20px;
            padding: 7px 13px;
            font-size: 11px;
            cursor: pointer;
        }

        .category-pill.active {
            background: #650019;
            color: #fff;
            border-color: #650019;
        }

        .sort-box {
            position: relative;
        }

        .sort-select {
            border: 1px solid #ddd1cb;
            background: #fff;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 12px;
            color: #444;
            outline: none;
            min-width: 155px;
        }

        /* =========================================================
                                       PRODUCT GRID
                                    ========================================================= */

        .sudheera-product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .sudheera-product-card {
            min-width: 0;
            background: #fff;
            border: 1px solid #eee4df;
            border-radius: 15px;
            overflow: hidden;
            transition: all .3s ease;
        }

        .sudheera-product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 35px rgba(75, 0, 20, .10);
        }

        .product-image-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1.18;
            overflow: hidden;
            background: #f4eee9;
        }

        .product-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: fill;
            display: block;
            transition: transform .5s ease;
        }

        .sudheera-product-card:hover .product-image-wrap img {
            transform: scale(1.05);
        }

        .product-badge {
            position: absolute;
            left: 10px;
            top: 10px;
            background: #650019;
            color: #fff;
            padding: 5px 9px;
            border-radius: 5px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .product-badge.new {
            background: #497d45;
        }

        .product-wishlist {
            position: absolute;
            right: 10px;
            top: 10px;
            width: 32px;
            height: 32px;
            border: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, .95);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #650019;
            cursor: pointer;
            transition: .25s ease;
        }

        .product-wishlist:hover {
            background: #650019;
            color: #fff;
        }

        .product-info {
            padding: 13px;
        }

        .product-category {
            font-size: 10px;
            color: #9b7b6d;
            margin-bottom: 5px;
        }

        .product-name {
            color: #2e2021;
            font-size: 14px;
            font-weight: 600;
            margin: 0 0 7px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 8px;
        }

        .stars {
            color: #d59b24;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .rating-count {
            font-size: 10px;
            color: #999;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .price-current {
            font-size: 17px;
            font-weight: 700;
            color: #380013;
        }

        .price-old {
            font-size: 11px;
            color: #aaa;
            text-decoration: line-through;
        }

        .price-off {
            font-size: 9px;
            background: #f7e5e4;
            color: #9a3340;
            padding: 3px 5px;
            border-radius: 4px;
            font-weight: 600;
        }

        .add-cart-btn {
            width: 100%;
            height: 40px;
            border: 1px solid #650019;
            background: #650019;
            color: #fff;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            transition: .25s ease;
        }

        .add-cart-btn:hover {
            background: #fff;
            color: #650019;
        }

        /* =========================================================
                                       MOBILE FILTER
                                    ========================================================= */

        .mobile-filter-panel {
            display: none;
            background: #fff;
            border: 1px solid #eadfd9;
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 20px;
        }

        /* =========================================================
                                       RESPONSIVE
                                    ========================================================= */

        @media (max-width: 1199px) {

            .shop-layout {
                grid-template-columns: 220px minmax(0, 1fr);
                gap: 20px;
            }

            .sudheera-product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 991px) {

            .shop-layout {
                display: block;
            }

            .shop-sidebar {
                display: none;
            }

            .mobile-filter-btn {
                display: block;
            }

            .mobile-filter-panel.show {
                display: block;
            }

            .sudheera-product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 767px) {

            .shop-breadcrumb {
                padding-top: 25px;
            }

            .shop-heading-inner {
                display: block;
            }

            .shop-title {
                font-size: 32px;
            }

            .shop-count {
                margin-top: 10px;
            }

            .shop-toolbar {
                align-items: flex-start;
                padding: 12px 0;
                gap: 10px;
            }

            .shop-toolbar-left {
                flex-wrap: wrap;
            }

            .category-pills {
                display: none;
            }

            .sort-select {
                min-width: 135px;
            }

            .sudheera-product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .product-image-wrap {
                aspect-ratio: 1 / 1.25;
            }

            .product-info {
                padding: 10px;
            }

            .product-name {
                font-size: 12px;
            }

            .price-current {
                font-size: 15px;
            }

            .add-cart-btn {
                height: 38px;
            }
        }

        @media (max-width: 480px) {

            .shop-title {
                font-size: 28px;
            }

            .sudheera-product-grid {
                gap: 8px;
            }

            .product-image-wrap {
                aspect-ratio: 1 / 1.3;
            }

            .product-wishlist {
                width: 28px;
                height: 28px;
                right: 7px;
                top: 7px;
            }

            .product-badge {
                left: 7px;
                top: 7px;
            }

            .product-info {
                padding: 8px;
            }

            .product-rating {
                margin-bottom: 5px;
            }

            .product-price {
                gap: 4px;
                margin-bottom: 8px;
            }

            .price-old {
                font-size: 9px;
            }

            .price-off {
                font-size: 8px;
            }

            .add-cart-btn {
                height: 36px;
                font-size: 10px;
            }
        }

        .sudheera-product-card-link,
        .sudheera-product-card-link:hover,
        .sudheera-product-card-link:focus,
        .sudheera-product-card-link:active {
            text-decoration: none !important;
            color: inherit !important;
        }

        .sudheera-product-card-link * {
            text-decoration: none !important;
        }

        .sudheera-product-card-link h3,
        .sudheera-product-card-link .product-name,
        .sudheera-product-card-link .product-category,
        .sudheera-product-card-link .product-rating,
        .sudheera-product-card-link .rating-count,
        .sudheera-product-card-link .product-price,
        .sudheera-product-card-link .price-current,
        .sudheera-product-card-link .price-old,
        .sudheera-product-card-link .price-off {
            text-decoration: none !important;
        }
    </style>


    <div class="sudheera-shop">

        <!-- =====================================================
                                         BREADCRUMB
                                    ====================================================== -->

        <section class="shop-breadcrumb">
            <div class="container">

                <ul class="shop-breadcrumb-list">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <li>/</li>

                    <li>Shop</li>
                </ul>

            </div>
        </section>




        <!-- =====================================================
                                         SHOP MAIN
                                    ====================================================== -->

        <section class="shop-main">

            <div class="container">

                <div class="shop-layout">


                    <!-- =================================================
                                                     SIDEBAR
                                                ================================================== -->

                    <aside class="shop-sidebar">

                        <div class="filter-title">

                            <h5>
                                Filter
                            </h5>

                            <a href="#" class="filter-clear">
                                Clear All
                            </a>

                        </div>


                        <!-- Category -->

                        <div class="filter-group">

                            <div class="filter-group-title">
                                Shop By Category
                            </div>

                            <label class="filter-option">

                                <div class="filter-option-left">

                                    <input type="checkbox">

                                    <span>
                                        Silk Sarees
                                    </span>

                                </div>

                                <span class="filter-number">
                                    08
                                </span>

                            </label>


                            <label class="filter-option">

                                <div class="filter-option-left">

                                    <input type="checkbox">

                                    <span>
                                        Cotton Sarees
                                    </span>

                                </div>

                                <span class="filter-number">
                                    06
                                </span>

                            </label>


                            <label class="filter-option">

                                <div class="filter-option-left">

                                    <input type="checkbox">

                                    <span>
                                        Party Wear
                                    </span>

                                </div>

                                <span class="filter-number">
                                    04
                                </span>

                            </label>


                            <label class="filter-option">

                                <div class="filter-option-left">

                                    <input type="checkbox">

                                    <span>
                                        Designer Sarees
                                    </span>

                                </div>

                                <span class="filter-number">
                                    03
                                </span>

                            </label>


                            <label class="filter-option">

                                <div class="filter-option-left">

                                    <input type="checkbox">

                                    <span>
                                        Linen Sarees
                                    </span>

                                </div>

                                <span class="filter-number">
                                    03
                                </span>

                            </label>

                        </div>


                        <!-- Fabric -->

                        <div class="filter-group">

                            <div class="filter-group-title">
                                Fabric
                            </div>

                            <label class="filter-option">

                                <div class="filter-option-left">
                                    <input type="checkbox">
                                    <span>Pure Silk</span>
                                </div>

                            </label>

                            <label class="filter-option">

                                <div class="filter-option-left">
                                    <input type="checkbox">
                                    <span>Cotton</span>
                                </div>

                            </label>

                            <label class="filter-option">

                                <div class="filter-option-left">
                                    <input type="checkbox">
                                    <span>Organza</span>
                                </div>

                            </label>

                            <label class="filter-option">

                                <div class="filter-option-left">
                                    <input type="checkbox">
                                    <span>Georgette</span>
                                </div>

                            </label>

                        </div>


                        <!-- Price -->

                        <div class="filter-group">

                            <div class="filter-group-title">
                                Price Range
                            </div>

                            <div class="filter-price">

                                <input type="number" placeholder="Min ₹">

                                <input type="number" placeholder="Max ₹">

                            </div>

                        </div>


                        <button class="filter-button">
                            APPLY FILTER
                        </button>

                    </aside>


                    <!-- =================================================
                                                     PRODUCTS
                                                ================================================== -->

                    <div class="shop-products-area">


                        <!-- Toolbar -->

                        <div class="shop-toolbar">

                            <div class="shop-toolbar-left">

                                <button type="button" class="mobile-filter-btn"
                                    onclick="document.querySelector('.mobile-filter-panel').classList.toggle('show')">
                                    ☰ FILTER
                                </button>

                                <select class="sort-select">

                                    <option>
                                        Sort By: Featured
                                    </option>

                                    <option>
                                        Best Selling
                                    </option>

                                    <option>
                                        Price: Low to High
                                    </option>

                                    <option>
                                        Price: High to Low
                                    </option>

                                    <option>
                                        New Arrivals
                                    </option>

                                </select>

                            </div>




                        </div>


                        <!-- Mobile Filter -->

                        <div class="mobile-filter-panel">

                            <div class="filter-group-title">
                                Shop By Category
                            </div>

                            <label class="filter-option">

                                <div class="filter-option-left">
                                    <input type="checkbox">
                                    <span>Silk Sarees</span>
                                </div>

                            </label>

                            <label class="filter-option">

                                <div class="filter-option-left">
                                    <input type="checkbox">
                                    <span>Cotton Sarees</span>
                                </div>

                            </label>

                            <label class="filter-option">

                                <div class="filter-option-left">
                                    <input type="checkbox">
                                    <span>Party Wear</span>
                                </div>

                            </label>

                            <label class="filter-option">

                                <div class="filter-option-left">
                                    <input type="checkbox">
                                    <span>Designer Sarees</span>
                                </div>

                            </label>

                        </div>


                        <!-- =================================================
                                                         PRODUCT GRID
                                                    ================================================== -->

                        <div class="sudheera-product-grid">


                            <!-- PRODUCT 1 -->

                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">
                                        <img src="{{ asset('website') }}/images/product1.webp" alt="Kanchipuram Silk Saree">
                                    </a>

                                    <span class="product-badge">
                                        Bestseller
                                    </span>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Pure Silk
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">
                                        <h3 class="product-name">
                                            Kanchipuram Silk Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.9 (342)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹4,999
                                        </span>

                                        <span class="price-old">
                                            ₹6,999
                                        </span>

                                        <span class="price-off">
                                            28% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>


                            <!-- PRODUCT 2 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product2.webp" alt="Organza Floral Saree">
                                    </a>

                                    <span class="product-badge new">
                                        New
                                    </span>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Organza
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Organza Floral Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.8 (210)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹2,799
                                        </span>

                                        <span class="price-old">
                                            ₹4,499
                                        </span>

                                        <span class="price-off">
                                            38% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>



                            <!-- PRODUCT 3 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product3.webp" alt="Banarasi Silk Saree">
                                    </a>

                                    <span class="product-badge">
                                        Bestseller
                                    </span>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Banarasi Silk
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Banarasi Silk Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.9 (418)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹6,299
                                        </span>

                                        <span class="price-old">
                                            ₹9,999
                                        </span>

                                        <span class="price-off">
                                            37% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>


                            <!-- PRODUCT 4 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product4.webp" alt="Chanderi Saree">
                                    </a>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Chanderi
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Elegant Chanderi Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.7 (156)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹2,499
                                        </span>

                                        <span class="price-old">
                                            ₹3,999
                                        </span>

                                        <span class="price-off">
                                            37% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                            <!-- PRODUCT 5 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product5.webp"
                                            alt="Designer Party Wear Saree">
                                    </a>

                                    <span class="product-badge">
                                        Bestseller
                                    </span>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Designer
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Designer Party Wear Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.8 (209)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹3,999
                                        </span>

                                        <span class="price-old">
                                            ₹6,499
                                        </span>

                                        <span class="price-off">
                                            39% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                            <!-- PRODUCT 6 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product6.webp" alt="Linen Saree">
                                    </a>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Linen
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Premium Linen Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.8 (108)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹2,299
                                        </span>

                                        <span class="price-old">
                                            ₹3,299
                                        </span>

                                        <span class="price-off">
                                            30% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                            <!-- PRODUCT 7 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product7.webp" alt="Handloom Cotton Saree">
                                    </a>

                                    <span class="product-badge new">
                                        New
                                    </span>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Cotton
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Handloom Cotton Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.8 (187)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹1,899
                                        </span>

                                        <span class="price-old">
                                            ₹2,699
                                        </span>

                                        <span class="price-off">
                                            30% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                            <!-- PRODUCT 8 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product8.webp" alt="Purple Festive Saree">
                                    </a>

                                    <span class="product-badge">
                                        Festive
                                    </span>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Party Wear
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Royal Purple Festive Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.9 (265)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹4,299
                                        </span>

                                        <span class="price-old">
                                            ₹6,299
                                        </span>

                                        <span class="price-off">
                                            32% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                            <!-- PRODUCT 9 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product9.webp" alt="Green Silk Saree">
                                    </a>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Silk
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Emerald Green Silk Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.9 (198)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹5,499
                                        </span>

                                        <span class="price-old">
                                            ₹7,999
                                        </span>

                                        <span class="price-off">
                                            31% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                            <!-- PRODUCT 10 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product10.jpg" alt="Pink Designer Saree">
                                    </a>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Designer
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Rose Pink Designer Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.8 (176)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹3,499
                                        </span>

                                        <span class="price-old">
                                            ₹5,499
                                        </span>

                                        <span class="price-off">
                                            36% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                            <!-- PRODUCT 11 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product1.webp" alt="Yellow Silk Saree">
                                    </a>

                                    <span class="product-badge new">
                                        New
                                    </span>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Silk
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Mustard Yellow Silk Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.7 (145)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹3,999
                                        </span>

                                        <span class="price-old">
                                            ₹5,999
                                        </span>

                                        <span class="price-off">
                                            33% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                            <!-- PRODUCT 12 -->
                            <div class="sudheera-product-card">

                                <div class="product-image-wrap">
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <img src="{{ asset('website') }}/images/product2.webp" alt="Peach Chanderi Saree">
                                    </a>

                                    <button class="product-wishlist">
                                        ♡
                                    </button>

                                </div>

                                <div class="product-info">

                                    <div class="product-category">
                                        Chanderi
                                    </div>
                                    <a href="{{ route('productdetails') }}" class="sudheera-product-card-link">

                                        <h3 class="product-name">
                                            Peach Traditional Saree
                                        </h3>
                                    </a>

                                    <div class="product-rating">

                                        <span class="stars">
                                            ★★★★★
                                        </span>

                                        <span class="rating-count">
                                            4.8 (132)
                                        </span>

                                    </div>

                                    <div class="product-price">

                                        <span class="price-current">
                                            ₹2,699
                                        </span>

                                        <span class="price-old">
                                            ₹3,999
                                        </span>

                                        <span class="price-off">
                                            32% OFF
                                        </span>

                                    </div>

                                    <button class="add-cart-btn">
                                        ADD TO CART
                                    </button>

                                </div>

                            </div>
                            </a>


                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>


    <script>

        /* Category pill active state */

        document.querySelectorAll('.category-pill').forEach(function (button) {

            button.addEventListener('click', function () {

                document.querySelectorAll('.category-pill')
                    .forEach(function (item) {
                        item.classList.remove('active');
                    });

                this.classList.add('active');

            });

        });


        /* Wishlist */

        document.querySelectorAll('.product-wishlist').forEach(function (button) {

            button.addEventListener('click', function () {

                if (this.innerHTML.trim() === '♡') {
                    this.innerHTML = '♥';
                } else {
                    this.innerHTML = '♡';
                }

            });

        });


        /* Add to cart visual state */

        document.querySelectorAll('.add-cart-btn').forEach(function (button) {

            button.addEventListener('click', function () {

                const originalText = this.innerHTML;

                this.innerHTML = 'ADDED ✓';

                setTimeout(() => {

                    this.innerHTML = originalText;

                }, 1500);

            });

        });

    </script>

@endsection