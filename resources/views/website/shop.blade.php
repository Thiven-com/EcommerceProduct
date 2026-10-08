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

<!-- Category -->

<div class="filter-group">

    <div class="filter-group-title">
        Shop By Category
    </div>

    @forelse($categories as $category)

        @php
            $categoryCount = $categoryCounts[$category->id] ?? 0;
        @endphp

        <label class="filter-option">

            <div class="filter-option-left">

                <input
                    type="checkbox"
                    class="category-filter"
                    value="{{ $category->slug }}"
                    {{ request('category') == $category->slug ? 'checked' : '' }}
                >

                <span>
                    {{ $category->title }}
                </span>

            </div>

            <span class="filter-number">
                {{ str_pad($categoryCount, 2, '0', STR_PAD_LEFT) }}
            </span>

        </label>

    @empty

        <span style="font-size:13px;color:#999;">
            No categories available
        </span>

    @endforelse

</div>




                        <!-- Price -->

<!-- Price -->

<div class="filter-group">

    <div class="filter-group-title">
        Price Range
    </div>

    <div class="filter-price">

        <input
            type="number"
            name="min_price"
            id="minPrice"
            placeholder="Min ₹"
            value="{{ request('min_price') }}"
        >

        <input
            type="number"
            name="max_price"
            id="maxPrice"
            placeholder="Max ₹"
            value="{{ request('max_price') }}"
        >

    </div>

</div>

<button
    type="button"
    class="filter-button"
    onclick="applyFilters()"
>
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


<select
    class="sort-select"
    id="sortProducts"
    onchange="applySort(this.value)"
>

    <option
        value=""
        {{ !request('sort') ? 'selected' : '' }}
    >
        Sort By: Featured
    </option>

    <option
        value="best-selling"
        {{ request('sort') == 'best-selling' ? 'selected' : '' }}
    >
        Best Selling
    </option>

    <option
        value="price-low"
        {{ request('sort') == 'price-low' ? 'selected' : '' }}
    >
        Price: Low to High
    </option>

    <option
        value="price-high"
        {{ request('sort') == 'price-high' ? 'selected' : '' }}
    >
        Price: High to Low
    </option>

    <option
        value="new-arrivals"
        {{ request('sort') == 'new-arrivals' ? 'selected' : '' }}
    >
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

    @forelse($products as $product)

        @php

            $variant = $product->variant;

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

            } elseif (!empty($product->image)) {

                $productImage = $product->image;

            }

            /*
            |--------------------------------------------------------------------------
            | Product Badge
            |--------------------------------------------------------------------------
            */

            $badge = null;
            $badgeClass = '';

            if (
                $product->orders > 0 &&
                $loop->iteration <= 2
            ) {

                $badge = 'Bestseller';

            } elseif (
                $product->created_at &&
                $product->created_at->gt(now()->subDays(30))
            ) {

                $badge = 'New';
                $badgeClass = 'new';

            } elseif ($product->is_feature === 'yes') {

                $badge = 'Featured';

            }

        @endphp


        <div class="sudheera-product-card">

            <!-- Product Image -->

            <div class="product-image-wrap">

                <a
                    href="{{ route('productdetails', ['slug' => $product->slug]) }}"
                    class="sudheera-product-card-link"
                >

                    @if($productImage)

                        <img
                            src="{{ asset($productImage) }}"
                            alt="{{ $product->title }}"
                            loading="lazy"
                        >

                    @else

                        <img
                            src="{{ asset('website/images/product-placeholder.png') }}"
                            alt="{{ $product->title }}"
                            loading="lazy"
                        >

                    @endif

                </a>


                @if($badge)

                    <span class="product-badge {{ $badgeClass }}">
                        {{ $badge }}
                    </span>

                @endif


                <button
                    type="button"
                    class="product-wishlist"
                    data-product-id="{{ $product->id }}"
                >
                    ♡
                </button>

            </div>


            <!-- Product Information -->

            <div class="product-info">


                @if($product->category)

                    <div class="product-category">

                        {{ $product->category->title }}

                    </div>

                @endif


                <a
                    href="{{ route('productdetails', ['slug' => $product->slug]) }}"
                    class="sudheera-product-card-link"
                >

                    <h3 class="product-name">

                        {{ $product->title }}

                    </h3>

                </a>


                <!-- Rating -->

                <div class="product-rating">

                    <span class="stars">
                        ★★★★★
                    </span>

                    <span class="rating-count">

                        @if($product->orders > 0)

                            Bestselling

                        @else

                            Available

                        @endif

                    </span>

                </div>


                <!-- Price -->

                <div class="product-price">

                    @if(is_numeric($sellingPrice))

                        <span class="price-current">

                            ₹{{ number_format((float) $sellingPrice, 0) }}

                        </span>

                    @endif


                    @if(
                        is_numeric($actualPrice) &&
                        is_numeric($sellingPrice) &&
                        (float) $actualPrice > (float) $sellingPrice
                    )

                        <span class="price-old">

                            ₹{{ number_format((float) $actualPrice, 0) }}

                        </span>

                    @endif


                    @if($discount > 0)

                        <span class="price-off">

                            {{ $discount }}% OFF

                        </span>

                    @endif

                </div>


                <!-- Add To Cart -->

                <button
                    type="button"
                    class="add-cart-btn"
                    data-product-id="{{ $product->id }}"
                    data-variant-id="{{ $variant?->id }}"
                >
                    ADD TO CART
                </button>


            </div>

        </div>


    @empty

        <div
            style="
                grid-column: 1 / -1;
                text-align:center;
                padding:60px 20px;
                color:#777;
            "
        >

            <h3>
                No products found
            </h3>

            <p>
                Try changing your filters or browse another category.
            </p>

        </div>

    @endforelse

</div>

                    </div>

                </div>

            </div>

        </section>

    </div>
    @if($products->hasPages())

    <div class="shop-pagination">

        {{ $products->links('pagination::bootstrap-5') }}

    </div>

@endif


<script>

    /*
    |--------------------------------------------------------------------------
    | Apply Category + Price Filters
    |--------------------------------------------------------------------------
    */

    function applyFilters() {

        const url = new URL(
            "{{ route('shop') }}",
            window.location.origin
        );

        const selectedCategory =
            document.querySelector('.category-filter:checked');

        const minPrice =
            document.getElementById('minPrice')?.value;

        const maxPrice =
            document.getElementById('maxPrice')?.value;


        if (selectedCategory && selectedCategory.value) {

            url.searchParams.set(
                'category',
                selectedCategory.value
            );

        }


        if (minPrice) {

            url.searchParams.set(
                'min_price',
                minPrice
            );

        }


        if (maxPrice) {

            url.searchParams.set(
                'max_price',
                maxPrice
            );

        }


        window.location.href = url.toString();

    }


    /*
    |--------------------------------------------------------------------------
    | Category Filter
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.category-filter')
        .forEach(function (checkbox) {

            checkbox.addEventListener('change', function () {

                document
                    .querySelectorAll('.category-filter')
                    .forEach(function (item) {

                        if (item !== checkbox) {

                            item.checked = false;

                        }

                    });

                applyFilters();

            });

        });


    /*
    |--------------------------------------------------------------------------
    | Sort Products
    |--------------------------------------------------------------------------
    */

    function applySort(sortValue) {

        const url = new URL(
            "{{ route('shop') }}",
            window.location.origin
        );


        const selectedCategory =
            document.querySelector('.category-filter:checked');

        const minPrice =
            document.getElementById('minPrice')?.value;

        const maxPrice =
            document.getElementById('maxPrice')?.value;


        if (selectedCategory && selectedCategory.value) {

            url.searchParams.set(
                'category',
                selectedCategory.value
            );

        }


        if (minPrice) {

            url.searchParams.set(
                'min_price',
                minPrice
            );

        }


        if (maxPrice) {

            url.searchParams.set(
                'max_price',
                maxPrice
            );

        }


        if (sortValue) {

            url.searchParams.set(
                'sort',
                sortValue
            );

        }


        window.location.href = url.toString();

    }


    /*
    |--------------------------------------------------------------------------
    | Clear All Filters
    |--------------------------------------------------------------------------
    */

    document
        .querySelector('.filter-clear')
        ?.addEventListener('click', function (event) {

            event.preventDefault();

            window.location.href =
                "{{ route('shop') }}";

        });


    /*
    |--------------------------------------------------------------------------
    | Wishlist Visual State
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.product-wishlist')
        .forEach(function (button) {

            button.addEventListener('click', function (event) {

                event.preventDefault();
                event.stopPropagation();


                if (this.innerHTML.trim() === '♡') {

                    this.innerHTML = '♥';

                } else {

                    this.innerHTML = '♡';

                }

            });

        });


    /*
    |--------------------------------------------------------------------------
    | Add To Cart Visual State
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.add-cart-btn')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                const originalText =
                    this.innerHTML;


                this.innerHTML =
                    'ADDED ✓';

                this.disabled = true;


                const currentButton = this;


                setTimeout(function () {

                    currentButton.innerHTML =
                        originalText;

                    currentButton.disabled =
                        false;

                }, 1500);

            });

        });

</script>

@endsection