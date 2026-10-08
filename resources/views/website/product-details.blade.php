@extends('layouts.website')

@section('content')

<style>
    /* =========================================================
       PRODUCT DETAILS PAGE
    ========================================================= */

    :root {
        --sudheera-maroon: #650019;
        --sudheera-dark: #420014;
        --sudheera-gold: #b58a52;
        --sudheera-cream: #faf8f2;
        --sudheera-border: #e8e1d7;
        --sudheera-text: #222;
        --sudheera-muted: #777;
    }

    .product-details-page {
        background: #fff;
        padding-bottom: 70px;
    }


    /* =========================================================
       BREADCRUMB
    ========================================================= */

    .product-breadcrumb {
        padding: 35px 0 20px;
    }

    .product-breadcrumb-list {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .product-breadcrumb-list li {
        font-size: 13px;
        color: #888;
    }

    .product-breadcrumb-list a {
        color: #555;
        text-decoration: none;
        transition: .25s ease;
    }

    .product-breadcrumb-list a:hover {
        color: var(--sudheera-maroon);
    }

    .breadcrumb-divider {
        color: #bbb;
    }

    .breadcrumb-current {
        color: var(--sudheera-maroon) !important;
    }


    /* =========================================================
       MAIN PRODUCT AREA
    ========================================================= */

    .product-details-wrapper {
        display: grid;
        grid-template-columns: minmax(0, 1.08fr) minmax(0, .92fr);
        gap: 55px;
        align-items: start;
    }


    /* =========================================================
       PRODUCT GALLERY
    ========================================================= */

    .product-gallery {
        position: sticky;
        top: 90px;
    }

    .product-gallery-layout {
        display: grid;
        grid-template-columns: 88px minmax(0, 1fr);
        gap: 14px;
    }

    .product-thumbnails {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .product-thumb {
        width: 88px;
        height: 105px;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid var(--sudheera-border);
        background: var(--sudheera-cream);
        cursor: pointer;
        transition: .25s ease;
    }

    .product-thumb:hover,
    .product-thumb.active {
        border-color: var(--sudheera-maroon);
    }

    .product-thumb img {
        width: 100%;
        height: 100%;
        object-fit: fill;
        display: block;
    }

    .product-main-image {
        position: relative;
        width: 100%;
        aspect-ratio: 1 / 1.15;
        overflow: hidden;
        border-radius: 18px;
        background: #f7f4ed;
    }

    .product-main-image img {
        width: 100%;
        height: 100%;
        object-fit: fill;
        display: block;
        transition: transform .6s ease;
    }

    .product-main-image:hover img {
        transform: scale(1.035);
    }


    /* =========================================================
       IMAGE BADGES
    ========================================================= */

    .product-image-badge {
        position: absolute;
        top: 18px;
        left: 18px;
        z-index: 3;

        padding: 7px 13px;

        background: var(--sudheera-maroon);
        color: #fff;

        border-radius: 50px;

        font-size: 11px;
        font-weight: 600;
        letter-spacing: .5px;
        text-transform: uppercase;
    }

    .product-image-wishlist {
        position: absolute;
        top: 16px;
        right: 16px;
        z-index: 3;

        width: 44px;
        height: 44px;

        border: 0;
        border-radius: 50%;

        background: rgba(255,255,255,.94);

        display: flex;
        align-items: center;
        justify-content: center;

        color: var(--sudheera-dark);

        cursor: pointer;
        transition: .25s ease;
    }

    .product-image-wishlist:hover {
        color: var(--sudheera-maroon);
        transform: scale(1.06);
    }

    .product-image-wishlist i {
        font-size: 19px;
    }


    /* =========================================================
       PRODUCT INFO
    ========================================================= */

    .product-information {
        padding-top: 5px;
    }

    .product-brand {
        font-size: 12px;
        color: var(--sudheera-maroon);
        text-transform: uppercase;
        letter-spacing: 1.8px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .product-title {
        margin: 0 0 13px;

        font-size: 34px;
        line-height: 1.18;

        color: var(--sudheera-dark);
        font-weight: 500;

        letter-spacing: -.3px;
    }

    .product-rating-row {
        display: flex;
        align-items: center;
        gap: 12px;

        margin-bottom: 18px;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 3px;

        color: #c18a37;
        font-size: 13px;
    }

    .product-review-text {
        font-size: 13px;
        color: #777;
    }

    .product-review-divider {
        width: 1px;
        height: 16px;
        background: #ddd;
    }

    .product-price-row {
        display: flex;
        align-items: baseline;
        flex-wrap: wrap;
        gap: 11px;

        margin-bottom: 19px;
    }

    .product-current-price {
        font-size: 28px;
        font-weight: 700;
        color: #181818;
    }

    .product-old-price {
        font-size: 15px;
        color: #999;
        text-decoration: line-through;
    }

    .product-discount {
        padding: 5px 9px;

        border-radius: 5px;

        background: #f6e8e8;
        color: var(--sudheera-maroon);

        font-size: 11px;
        font-weight: 700;
    }

    .product-tax-note {
        font-size: 12px;
        color: #888;
        margin-bottom: 22px;
    }


    /* =========================================================
       SHORT DESCRIPTION
    ========================================================= */

    .product-short-description {
        font-size: 14px;
        line-height: 1.8;
        color: #666;

        margin-bottom: 25px;

        max-width: 620px;
    }


    /* =========================================================
       PRODUCT OPTIONS
    ========================================================= */

    .product-option {
        padding: 20px 0;
        border-top: 1px solid var(--sudheera-border);
    }

    .product-option:last-of-type {
        border-bottom: 1px solid var(--sudheera-border);
    }

    .option-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 13px;
    }

    .option-title {
        margin: 0;

        font-size: 13px;
        font-weight: 600;

        color: #333;
        text-transform: uppercase;
        letter-spacing: .6px;
    }

    .option-selected {
        font-size: 13px;
        color: #777;
    }

    .variant-options {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
    }

    .variant-option {
        min-width: 70px;
        height: 40px;

        padding: 0 17px;

        border: 1px solid #d9d2c9;
        border-radius: 6px;

        background: #fff;

        color: #444;
        font-size: 13px;

        cursor: pointer;

        transition: .25s ease;
    }

    .variant-option:hover,
    .variant-option.active {
        border-color: var(--sudheera-maroon);
        background: var(--sudheera-maroon);
        color: #fff;
    }


    /* =========================================================
       QUANTITY + CART
    ========================================================= */

    .purchase-area {
        padding-top: 24px;
    }

    .quantity-cart-row {
        display: grid;
        grid-template-columns: 125px 1fr;
        gap: 12px;
    }

    .quantity-selector {
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        border: 1px solid #ddd4ca;
        border-radius: 8px;

        overflow: hidden;
    }

    .quantity-btn {
        width: 38px;
        height: 100%;

        border: 0;
        background: transparent;

        color: #555;
        font-size: 18px;

        cursor: pointer;
    }

    .quantity-value {
        font-size: 14px;
        font-weight: 600;
    }

    .add-cart-button {
        height: 52px;

        border: 1px solid var(--sudheera-maroon);
        border-radius: 8px;

        background: var(--sudheera-maroon);
        color: #fff;

        font-size: 14px;
        font-weight: 600;

        letter-spacing: .4px;

        cursor: pointer;

        transition: .3s ease;
    }

    .add-cart-button:hover {
        background: var(--sudheera-dark);
        border-color: var(--sudheera-dark);
    }

    .buy-now-button {
        width: 100%;
        height: 52px;

        margin-top: 11px;

        border: 1px solid var(--sudheera-gold);
        border-radius: 8px;

        background: #fff;
        color: var(--sudheera-dark);

        font-size: 14px;
        font-weight: 600;

        cursor: pointer;
        transition: .3s ease;
    }

    .buy-now-button:hover {
        background: var(--sudheera-gold);
        color: #fff;
    }


    /* =========================================================
       DELIVERY
    ========================================================= */

    .delivery-box {
        margin-top: 25px;
        padding: 18px;

        background: #faf8f3;
        border-radius: 10px;
    }

    .delivery-title {
        display: flex;
        align-items: center;
        gap: 9px;

        margin-bottom: 13px;

        color: var(--sudheera-dark);
        font-size: 14px;
        font-weight: 600;
    }

    .delivery-title i {
        font-size: 17px;
        color: var(--sudheera-maroon);
    }

    .pincode-row {
        display: flex;
        gap: 8px;
    }

    .pincode-input {
        flex: 1;

        height: 43px;

        border: 1px solid #ddd4ca;
        border-radius: 6px;

        padding: 0 13px;

        outline: none;

        font-size: 13px;
        background: #fff;
    }

    .pincode-input:focus {
        border-color: var(--sudheera-maroon);
    }

    .check-pincode {
        height: 43px;

        padding: 0 19px;

        border: 0;
        border-radius: 6px;

        background: var(--sudheera-dark);
        color: #fff;

        font-size: 12px;
        font-weight: 600;

        cursor: pointer;
    }


    /* =========================================================
       SERVICE FEATURES
    ========================================================= */

    .product-features {
        display: grid;
        grid-template-columns: repeat(3, 1fr);

        gap: 10px;

        margin-top: 22px;
    }

    .product-feature {
        padding: 15px 10px;

        text-align: center;

        border: 1px solid #eee7dd;
        border-radius: 9px;
    }

    .product-feature i {
        display: block;

        margin-bottom: 7px;

        font-size: 18px;
        color: var(--sudheera-maroon);
    }

    .product-feature span {
        font-size: 11px;
        color: #666;
        line-height: 1.4;
    }


    /* =========================================================
       PRODUCT INFORMATION TABS
    ========================================================= */

    .product-extra-section {
        margin-top: 75px;

        border-top: 1px solid var(--sudheera-border);
    }

    .product-tabs {
        display: flex;
        justify-content: center;
        gap: 45px;

        border-bottom: 1px solid var(--sudheera-border);
    }

    .product-tab {
        position: relative;

        padding: 20px 0;

        border: 0;
        background: transparent;

        color: #777;

        font-size: 13px;
        font-weight: 600;

        cursor: pointer;
    }

    .product-tab.active {
        color: var(--sudheera-maroon);
    }

    .product-tab.active::after {
        content: "";

        position: absolute;
        bottom: -1px;
        left: 0;

        width: 100%;
        height: 2px;

        background: var(--sudheera-maroon);
    }

    .tab-content {
        padding: 35px 10px;

        max-width: 900px;
        margin: auto;
    }

    .tab-panel {
        display: none;
    }

    .tab-panel.active {
        display: block;
    }

    .tab-panel h4 {
        margin-bottom: 14px;

        color: var(--sudheera-dark);

        font-size: 20px;
        font-weight: 500;
    }

    .tab-panel p {
        color: #666;

        font-size: 14px;
        line-height: 1.9;
    }

    .details-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);

        gap: 0;

        border: 1px solid #eee7dd;
        border-radius: 10px;
        overflow: hidden;
    }

    .details-item {
        display: flex;
        justify-content: space-between;

        padding: 14px 17px;

        border-bottom: 1px solid #eee7dd;

        font-size: 13px;
    }

    .details-item:nth-child(odd) {
        border-right: 1px solid #eee7dd;
    }

    .details-label {
        color: #888;
    }

    .details-value {
        color: #333;
        font-weight: 500;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 991px) {

        .product-details-wrapper {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .product-gallery {
            position: static;
        }

        .product-title {
            font-size: 29px;
        }
    }


    @media (max-width: 767px) {

        .product-breadcrumb {
            padding-top: 20px;
        }

        .product-gallery-layout {
            display: flex;
            flex-direction: column-reverse;
        }

        .product-thumbnails {
            flex-direction: row;
            overflow-x: auto;
            padding-bottom: 3px;
        }

        .product-thumb {
            flex: 0 0 72px;
            width: 72px;
            height: 85px;
        }

        .product-main-image {
            aspect-ratio: 1 / 1.15;
            border-radius: 14px;
        }

        .product-title {
            font-size: 25px;
        }

        .product-current-price {
            font-size: 24px;
        }

        .quantity-cart-row {
            grid-template-columns: 105px 1fr;
        }

        .product-features {
            grid-template-columns: repeat(3, 1fr);
        }

        .product-tabs {
            gap: 22px;
            justify-content: flex-start;
            overflow-x: auto;
        }

        .product-tab {
            white-space: nowrap;
        }

        .details-list {
            grid-template-columns: 1fr;
        }

        .details-item:nth-child(odd) {
            border-right: 0;
        }
    }


    @media (max-width: 480px) {

        .product-details-page {
            padding-bottom: 40px;
        }

        .product-main-image {
            border-radius: 12px;
        }

        .product-image-badge {
            top: 12px;
            left: 12px;
        }

        .product-image-wishlist {
            top: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
        }

        .product-title {
            font-size: 22px;
        }

        .product-short-description {
            font-size: 13px;
        }

        .product-features {
            gap: 6px;
        }

        .product-feature {
            padding: 12px 5px;
        }

        .product-feature span {
            font-size: 10px;
        }
    }
</style>


<!-- =========================================================
     PRODUCT DETAILS PAGE
========================================================= -->

<section class="product-details-page" style="margin-left: 20px; margin-right: 20px;">

    <div class="container">

        <!-- Breadcrumb -->
        <div class="product-breadcrumb">

            <ul class="product-breadcrumb-list">

                <li>
                    <a href="#">Home</a>
                </li>

                <li class="breadcrumb-divider">/</li>

                <li>
                    <a href="#">Sarees</a>
                </li>

                <li class="breadcrumb-divider">/</li>

                <li class="breadcrumb-current">
                    Silk Saree
                </li>

            </ul>

        </div>


        <!-- Main Product -->
        <div class="product-details-wrapper">


            <!-- =================================================
                 LEFT - GALLERY
            ================================================= -->

            <div class="product-gallery">

                <div class="product-gallery-layout">


                    <!-- Thumbnails -->
                    <div class="product-thumbnails">

                        <div class="product-thumb active"
                           onclick="changeProductImage(this, '{{ asset('website') }}/images/product11.jpg')">

                            <img
                                src="{{ asset('website') }}/images/product11.jpg"
                                alt="Saree">
                        </div>


                        <div class="product-thumb"
                            onclick="changeProductImage(this, '{{ asset('website') }}/images/product1.webp')">

                            <img
                                src="{{ asset('website') }}/images/product1.webp"
                                alt="Saree">
                        </div>


                        <div class="product-thumb"
                            onclick="changeProductImage(this, '{{ asset('website') }}/images/product2.webp')">

                            <img
                                src="{{ asset('website') }}/images/product2.webp"
                                alt="Saree">
                        </div>


                        <div class="product-thumb"
                            onclick="changeProductImage(this, '{{ asset('website') }}/images/product3.webp')">

                            <img
                                src="{{ asset('website') }}/images/product3.webp"
                                alt="Saree">
                        </div>

                    </div>


                    <!-- Main Image -->
                    <div class="product-main-image">

                        <span class="product-image-badge">
                            New Arrival
                        </span>

                        <button class="product-image-wishlist"
                            title="Add to Wishlist">

                            <i class="fa-regular fa-heart"></i>

                        </button>

                        <img
                            id="mainProductImage"
                            src="{{ asset('website') }}/images/product11.jpg"
                            alt="Premium Silk Saree">

                    </div>

                </div>

            </div>


            <!-- =================================================
                 RIGHT - PRODUCT INFORMATION
            ================================================= -->

            <div class="product-information">

                <div class="product-brand">
                    SUDHEERA COLLECTION
                </div>

                <h1 class="product-title">
                    Traditional Pure Silk Saree with Zari Border
                </h1>


                <!-- Rating -->

                <div class="product-rating-row">

                    <div class="product-rating">

                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>

                    </div>

                    <span class="product-review-text">
                        4.8 (126 Reviews)
                    </span>

                    <span class="product-review-divider"></span>

                    <span class="product-review-text">
                        38 Sold
                    </span>

                </div>


                <!-- Price -->

                <div class="product-price-row">

                    <span class="product-current-price">
                        ₹3,999
                    </span>

                    <span class="product-old-price">
                        ₹5,499
                    </span>

                    <span class="product-discount">
                        27% OFF
                    </span>

                </div>

                <div class="product-tax-note">
                    Inclusive of all taxes
                </div>


                <!-- Description -->

                <div class="product-short-description">

                    Elevate your wardrobe with this beautifully crafted
                    traditional silk saree. Designed with an elegant zari
                    border and premium finish, perfect for festive occasions,
                    weddings and celebrations.

                </div>


                <!-- Color -->

                <div class="product-option">

                    <div class="option-heading">

                        <h5 class="option-title">
                            Color
                        </h5>

                        <span class="option-selected">
                            Wine
                        </span>

                    </div>

                    <div class="variant-options">

                        <button class="variant-option active">
                            Wine
                        </button>

                        <button class="variant-option">
                            Purple
                        </button>

                        <button class="variant-option">
                            Green
                        </button>

                        <button class="variant-option">
                            Maroon
                        </button>

                    </div>

                </div>


                <!-- Size -->

                <div class="product-option">

                    <div class="option-heading">

                        <h5 class="option-title">
                            Blouse
                        </h5>

                        <span class="option-selected">
                            Included
                        </span>

                    </div>

                    <div class="variant-options">

                        <button class="variant-option active">
                            Included
                        </button>

                        <button class="variant-option">
                            Without Blouse
                        </button>

                    </div>

                </div>


                <!-- Purchase -->

                <div class="purchase-area">

                    <div class="quantity-cart-row">


                        <div class="quantity-selector">

                            <button class="quantity-btn"
                                onclick="changeQuantity(-1)">
                                −
                            </button>

                            <span class="quantity-value"
                                id="quantityValue">
                                1
                            </span>

                            <button class="quantity-btn"
                                onclick="changeQuantity(1)">
                                +
                            </button>

                        </div>


                        <button class="add-cart-button">

                            <i class="fa-solid fa-bag-shopping me-2"></i>

                            ADD TO CART

                        </button>

                    </div>


                    <button class="buy-now-button">

                        BUY IT NOW

                    </button>

                </div>


                <!-- Delivery -->

                <div class="delivery-box">

                    <div class="delivery-title">

                        <i class="fa-solid fa-truck"></i>

                        Check Delivery Availability

                    </div>

                    <div class="pincode-row">

                        <input
                            type="text"
                            class="pincode-input"
                            placeholder="Enter Pincode"
                            maxlength="6">

                        <button class="check-pincode">
                            CHECK
                        </button>

                    </div>

                </div>


                <!-- Features -->

                <div class="product-features">

                    <div class="product-feature">

                        <i class="fa-solid fa-truck-fast"></i>

                        <span>
                            Fast Delivery
                        </span>

                    </div>

                    <div class="product-feature">

                        <i class="fa-solid fa-rotate-left"></i>

                        <span>
                            Easy Returns
                        </span>

                    </div>

                    <div class="product-feature">

                        <i class="fa-solid fa-shield-halved"></i>

                        <span>
                            Secure Payment
                        </span>

                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================================
             PRODUCT INFORMATION
        ===================================================== -->

        <div class="product-extra-section">


            <div class="product-tabs">

                <button class="product-tab active"
                    onclick="openTab(event, 'descriptionTab')">

                    DESCRIPTION

                </button>

                <button class="product-tab"
                    onclick="openTab(event, 'detailsTab')">

                    PRODUCT DETAILS

                </button>

                <button class="product-tab"
                    onclick="openTab(event, 'shippingTab')">

                    SHIPPING & RETURNS

                </button>

            </div>


            <div class="tab-content">


                <!-- Description -->

                <div id="descriptionTab"
                    class="tab-panel active">

                    <h4>
                        About the Saree
                    </h4>

                    <p>
                        This elegant saree is thoughtfully designed for
                        women who appreciate timeless Indian craftsmanship.
                        The premium fabric, detailed zari work and graceful
                        drape make it an ideal choice for weddings, festivals,
                        family celebrations and special occasions.
                    </p>

                    <p>
                        Pair it with traditional jewellery and a statement
                        blouse to complete your festive look.
                    </p>

                </div>


                <!-- Details -->

                <div id="detailsTab"
                    class="tab-panel">

                    <h4>
                        Product Details
                    </h4>

                    <div class="details-list">

                        <div class="details-item">

                            <span class="details-label">
                                Fabric
                            </span>

                            <span class="details-value">
                                Pure Silk
                            </span>

                        </div>

                        <div class="details-item">

                            <span class="details-label">
                                Saree Length
                            </span>

                            <span class="details-value">
                                5.5 Meters
                            </span>

                        </div>

                        <div class="details-item">

                            <span class="details-label">
                                Blouse Length
                            </span>

                            <span class="details-value">
                                0.8 Meter
                            </span>

                        </div>

                        <div class="details-item">

                            <span class="details-label">
                                Pattern
                            </span>

                            <span class="details-value">
                                Zari Border
                            </span>

                        </div>

                        <div class="details-item">

                            <span class="details-label">
                                Occasion
                            </span>

                            <span class="details-value">
                                Festive / Wedding
                            </span>

                        </div>

                        <div class="details-item">

                            <span class="details-label">
                                Wash Care
                            </span>

                            <span class="details-value">
                                Dry Clean
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Shipping -->

                <div id="shippingTab"
                    class="tab-panel">

                    <h4>
                        Shipping & Returns
                    </h4>

                    <p>
                        Orders are carefully packed and dispatched within
                        the estimated delivery period. Delivery timelines
                        may vary depending on your location.
                    </p>

                    <p>
                        Products can be returned according to the applicable
                        return policy. Please ensure the product is unused
                        and returned with its original packaging.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<script>

    /* =========================================================
       PRODUCT IMAGE
    ========================================================= */

    function changeProductImage(element, image) {

        document
            .getElementById('mainProductImage')
            .src = image;

        document
            .querySelectorAll('.product-thumb')
            .forEach(function (thumb) {

                thumb.classList.remove('active');

            });

        element.classList.add('active');
    }


    /* =========================================================
       QUANTITY
    ========================================================= */

    let quantity = 1;

    function changeQuantity(value) {

        quantity += value;

        if (quantity < 1) {
            quantity = 1;
        }

        document
            .getElementById('quantityValue')
            .textContent = quantity;
    }


    /* =========================================================
       VARIANTS
    ========================================================= */

    document
        .querySelectorAll('.variant-option')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                let parent = this.parentElement;

                parent
                    .querySelectorAll('.variant-option')
                    .forEach(function (item) {

                        item.classList.remove('active');

                    });

                this.classList.add('active');

            });

        });


    /* =========================================================
       TABS
    ========================================================= */

    function openTab(event, tabId) {

        document
            .querySelectorAll('.tab-panel')
            .forEach(function (panel) {

                panel.classList.remove('active');

            });

        document
            .querySelectorAll('.product-tab')
            .forEach(function (tab) {

                tab.classList.remove('active');

            });

        document
            .getElementById(tabId)
            .classList.add('active');

        event.currentTarget.classList.add('active');
    }

</script>

@endsection