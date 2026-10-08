@extends('layouts.website')

@section('content')

<style>
    /* =========================================================
       SUDHEERA SAREES - PREMIUM CART
    ========================================================= */

    .sudheera-cart-page {
        background: #fffdf9;
        color: #2d241e;
    }

    /* =========================================================
       BREADCRUMB
    ========================================================= */

    .sudheera-cart-breadcrumb {
        background: #f8f3eb;
        border-bottom: 1px solid #eee5d9;
        padding: 0;
    }

    .sudheera-cart-breadcrumb .breadcrumb-content {
        padding: 28px 0;
    }

    .sudheera-cart-breadcrumb ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-left: 20px;
    }

    .sudheera-cart-breadcrumb li,
    .sudheera-cart-breadcrumb a {
        font-size: 13px;
        color: #81766c;
        text-decoration: none;
    }

    .sudheera-cart-breadcrumb .current {
        color: #a96b18;
        font-weight: 600;
    }


    /* =========================================================
       MAIN SECTION
    ========================================================= */

    .sudheera-cart-section {
        padding: 55px 0 80px;
        margin-left: 20px;
        margin-right: 20px;
    }

    .sudheera-cart-heading {
        text-align: center;
        margin-bottom: 45px;
    }

    .sudheera-cart-heading .small-title {
        display: block;
        margin-bottom: 8px;
        color: #a96b18;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .sudheera-cart-heading h1 {
        margin: 0 0 10px;
        color: #2d241e;
        font-family: "Instrument Serif", serif;
        font-size: 46px;
        font-weight: 500;
        line-height: 1.2;
    }

    .sudheera-cart-heading p {
        margin: 0;
        color: #81766c;
        font-size: 14px;
    }


    /* =========================================================
       CART LEFT
    ========================================================= */

    .sudheera-cart-left {
        background: #fff;
        border: 1px solid #eee6dc;
        border-radius: 12px;
        padding: 25px 28px;
    }

    .sudheera-cart-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 18px;
        border-bottom: 1px solid #eee6dc;
        margin-bottom: 0;
    }

    .sudheera-cart-top h4 {
        margin: 0;
        color: #2d241e;
        font-size: 17px;
        font-weight: 600;
    }

    .sudheera-cart-top span {
        color: #91867b;
        font-size: 12px;
    }


    /* =========================================================
       PRODUCT
    ========================================================= */

    .sudheera-cart-item {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 145px 110px;
        gap: 25px;
        align-items: center;
        padding: 25px 0;
        border-bottom: 1px solid #eee6dc;
    }

    .sudheera-cart-item:last-child {
        border-bottom: 0;
    }

    .sudheera-product {
        display: flex;
        align-items: center;
        gap: 20px;
        min-width: 0;
    }

    .sudheera-product-image {
        width: 105px;
        height: 130px;
        flex-shrink: 0;
        display: block;
        overflow: hidden;
        border-radius: 6px;
        background: #f5eee5;
    }

    .sudheera-product-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: fill;
        transition: .5s ease;
    }

    .sudheera-product-image:hover img {
        transform: scale(1.06);
    }

    .sudheera-product-info {
        min-width: 0;
    }

    .sudheera-product-name {
        display: block;
        color: #2e261f;
        font-size: 16px;
        font-weight: 600;
        line-height: 1.45;
        text-decoration: none;
        margin-bottom: 8px;
    }

    .sudheera-product-name:hover {
        color: #a96b18;
    }

    .sudheera-product-variant {
        display: inline-block;
        padding: 5px 9px;
        background: #f8f2ea;
        border-radius: 4px;
        color: #82766a;
        font-size: 11px;
        margin-bottom: 9px;
    }

    .sudheera-product-price {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sudheera-price-new {
        color: #a96b18;
        font-size: 15px;
        font-weight: 700;
    }

    .sudheera-price-old {
        color: #aaa;
        font-size: 12px;
        text-decoration: line-through;
    }

    .sudheera-remove {
        margin-top: 10px;
        padding: 0;
        border: 0;
        background: transparent;
        color: #968b82;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 1px;
        cursor: pointer;
        transition: .3s ease;
    }

    .sudheera-remove:hover {
        color: #a96b18;
    }


    /* =========================================================
       QUANTITY
    ========================================================= */

    .sudheera-quantity {
        text-align: center;
    }

    .sudheera-quantity-label {
        display: block;
        margin-bottom: 8px;
        color: #91867b;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .sudheera-quantity-box {
        display: inline-flex;
        align-items: center;
        height: 40px;
        border: 1px solid #ded5ca;
        border-radius: 5px;
        overflow: hidden;
        background: #fff;
    }

    .sudheera-quantity-box button {
        width: 35px;
        height: 40px;
        padding: 0;
        border: 0;
        background: transparent;
        color: #665b52;
        font-size: 16px;
        cursor: pointer;
        transition: .3s ease;
    }

    .sudheera-quantity-box button:hover {
        color: #a96b18;
        background: #faf5ee;
    }

    .sudheera-quantity-box input {
        width: 40px;
        height: 40px;
        padding: 0;
        border: 0;
        border-left: 1px solid #eee6dc;
        border-right: 1px solid #eee6dc;
        outline: none;
        text-align: center;
        color: #332a23;
        font-size: 13px;
        background: #fff;
    }

    .sudheera-update {
        display: block;
        margin: 7px auto 0;
        padding: 0;
        border: 0;
        background: transparent;
        color: #a96b18;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 1px;
        cursor: pointer;
    }


    /* =========================================================
       ITEM TOTAL
    ========================================================= */

    .sudheera-item-total {
        text-align: right;
        color: #2e261f;
        font-size: 15px;
        font-weight: 600;
    }


    /* =========================================================
       SIDEBAR
    ========================================================= */

    .sudheera-cart-sidebar {
        position: sticky;
        top: 20px;
        background: #f8f3eb;
        border: 1px solid #eee4d8;
        border-radius: 12px;
        padding: 28px;
    }


    /* =========================================================
       FREE SHIPPING
    ========================================================= */

    .sudheera-shipping-message {
        padding-bottom: 22px;
        margin-bottom: 24px;
        border-bottom: 1px solid #e4d9cc;
    }

    .sudheera-shipping-message p {
        margin: 0 0 12px;
        color: #5f554d;
        font-size: 12px;
    }

    .sudheera-shipping-message strong {
        color: #a96b18;
    }

    .sudheera-progress {
        width: 100%;
        height: 5px;
        overflow: hidden;
        background: #ded4c8;
        border-radius: 20px;
    }

    .sudheera-progress span {
        display: block;
        width: 65%;
        height: 100%;
        background: #a96b18;
        border-radius: 20px;
    }


    /* =========================================================
       GIFT
    ========================================================= */

    .sudheera-gift-box {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        padding: 18px;
        margin-bottom: 28px;
        background: #fff;
        border: 1px solid #e8ded2;
        border-radius: 8px;
    }

    .sudheera-gift-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5e6d2;
        border-radius: 50%;
        font-size: 19px;
    }

    .sudheera-gift-content h5 {
        margin: 0 0 5px;
        color: #342a22;
        font-size: 13px;
        font-weight: 600;
    }

    .sudheera-gift-content p {
        margin: 0 0 8px;
        color: #83776d;
        font-size: 11px;
        line-height: 1.6;
    }

    .sudheera-gift-content a {
        color: #a96b18;
        font-size: 10px;
        font-weight: 700;
        text-decoration: none;
        letter-spacing: .5px;
    }


    /* =========================================================
       SUMMARY
    ========================================================= */

    .sudheera-summary-title {
        margin: 0 0 20px;
        color: #2d241e;
        font-family: "Instrument Serif", serif;
        font-size: 28px;
        font-weight: 500;
    }

    .sudheera-summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
        color: #655b52;
        font-size: 13px;
    }

    .sudheera-summary-row span:last-child {
        color: #342a23;
        font-weight: 500;
    }

    .sudheera-summary-row.discount span:last-child {
        color: #a96b18;
    }

    .sudheera-summary-row.total {
        padding-top: 18px;
        margin-top: 18px;
        border-top: 1px solid #ddd2c5;
        color: #2e261f;
        font-size: 17px;
        font-weight: 600;
    }

    .sudheera-summary-row.total span:last-child {
        color: #a96b18;
        font-size: 20px;
        font-weight: 700;
    }

    .sudheera-saved {
        padding: 9px 12px;
        margin: 16px 0 20px;
        background: #f0e5d5;
        border-radius: 5px;
        color: #8c5e24;
        text-align: center;
        font-size: 11px;
        font-weight: 600;
    }


    /* =========================================================
       CHECKOUT
    ========================================================= */

    .sudheera-checkout-btn {
        display: flex;
        width: 100%;
        height: 52px;
        align-items: center;
        justify-content: center;
        background: #a96b18;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.3px;
        transition: .3s ease;
    }

    .sudheera-checkout-btn:hover {
        background: #875310;
        color: #fff;
        transform: translateY(-2px);
    }

    .sudheera-continue {
        display: block;
        margin-top: 16px;
        color: #665d55;
        text-align: center;
        font-size: 11px;
        text-decoration: underline;
    }


    /* =========================================================
       EMPTY CART
    ========================================================= */

    .sudheera-empty-cart {
        padding: 80px 20px;
        background: #fff;
        border: 1px solid #eee5da;
        border-radius: 10px;
        text-align: center;
    }

    .sudheera-empty-cart img {
        width: 160px;
        max-width: 100%;
        margin-bottom: 18px;
    }

    .sudheera-empty-cart h4 {
        margin-bottom: 8px;
        color: #342a23;
        font-family: "Instrument Serif", serif;
        font-size: 28px;
    }

    .sudheera-empty-cart p {
        margin-bottom: 22px;
        color: #888078;
        font-size: 13px;
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 991px) {

        .sudheera-cart-section {
            padding: 40px 0 60px;
        }

        .sudheera-cart-heading h1 {
            font-size: 40px;
        }

        .sudheera-cart-item {
            grid-template-columns: minmax(0, 1fr) 130px 80px;
            gap: 15px;
        }

        .sudheera-product-image {
            width: 90px;
            height: 115px;
        }

        .sudheera-cart-sidebar {
            position: static;
            margin-top: 25px;
        }
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767px) {

        .sudheera-cart-breadcrumb .breadcrumb-content {
            padding: 22px 0;
        }

        .sudheera-cart-section {
            padding: 30px 0 45px;
        }

        .sudheera-cart-heading {
            margin-bottom: 28px;
        }

        .sudheera-cart-heading .small-title {
            font-size: 9px;
        }

        .sudheera-cart-heading h1 {
            font-size: 32px;
        }

        .sudheera-cart-heading p {
            font-size: 12px;
        }

        .sudheera-cart-left {
            padding: 18px 15px;
        }

        .sudheera-cart-top {
            padding-bottom: 15px;
        }

        .sudheera-cart-top h4 {
            font-size: 15px;
        }

        .sudheera-cart-item {
            grid-template-columns: 1fr;
            gap: 10px;
            position: relative;
            padding: 18px 0;
        }

        .sudheera-product {
            gap: 13px;
            padding-right: 60px;
        }

        .sudheera-product-image {
            width: 78px;
            height: 100px;
        }

        .sudheera-product-name {
            font-size: 13px;
        }

        .sudheera-product-variant {
            font-size: 9px;
            padding: 4px 7px;
        }

        .sudheera-price-new {
            font-size: 12px;
        }

        .sudheera-price-old {
            font-size: 10px;
        }

        .sudheera-item-total {
            position: absolute;
            top: 20px;
            right: 0;
            font-size: 12px;
        }

        .sudheera-quantity {
            text-align: left;
            padding-left: 91px;
        }

        .sudheera-quantity-label {
            text-align: left;
        }

        .sudheera-quantity-box {
            height: 36px;
        }

        .sudheera-quantity-box button {
            width: 31px;
            height: 36px;
        }

        .sudheera-quantity-box input {
            width: 35px;
            height: 36px;
        }

        .sudheera-cart-sidebar {
            padding: 20px 16px;
            border-radius: 9px;
        }

        .sudheera-summary-title {
            font-size: 24px;
        }
    }


    /* =========================================================
       SMALL MOBILE
    ========================================================= */

    @media (max-width: 480px) {

        .sudheera-cart-heading h1 {
            font-size: 29px;
        }

        .sudheera-cart-left {
            padding: 15px 12px;
        }

        .sudheera-product-image {
            width: 70px;
            height: 90px;
        }

        .sudheera-product {
            gap: 10px;
            padding-right: 55px;
        }

        .sudheera-product-name {
            font-size: 12px;
        }

        .sudheera-quantity {
            padding-left: 80px;
        }

        .sudheera-summary-row {
            font-size: 12px;
        }

        .sudheera-summary-row.total {
            font-size: 15px;
        }

        .sudheera-summary-row.total span:last-child {
            font-size: 18px;
        }
    }
</style>


<!-- =========================================================
     BREADCRUMB
========================================================= -->

<section class="sudheera-cart-breadcrumb">

    <div class="container">

        <div class="breadcrumb-content">

            <ul>
                <li>
                    <a href="#">Home</a>
                </li>

                <li>/</li>

                <li class="current">
                    Cart
                </li>
            </ul>

        </div>

    </div>

</section>


<!-- =========================================================
     CART
========================================================= -->

<section class="sudheera-cart-page">

    <div class="sudheera-cart-section">

        <div class="container">

            <!-- HEADING -->

            <div class="sudheera-cart-heading">

                <span class="small-title">
                    Sudheera Sarees
                </span>

                <h1>
                    Your Shopping Cart
                </h1>

                <p>
                    Review your favourite sarees before completing your order.
                </p>

            </div>


            <div class="row gy-30">


                <!-- =================================================
                     LEFT CART
                ================================================== -->

                <div class="col-lg-7">

                    <div class="sudheera-cart-left">

                        <div class="sudheera-cart-top">

                            <h4>
                                Your Items
                            </h4>

                            <span>
                                3 Items
                            </span>

                        </div>


                        <!-- PRODUCT 1 -->

                        <div class="sudheera-cart-item">

                            <div class="sudheera-product">

                                <a href="#" class="sudheera-product-image">

                                    <img
                                        loading="lazy"
                                        src="{{ asset('website') }}/images/product1.webp"
                                        alt="Kanchipuram Pure Silk Saree">

                                </a>

                                <div class="sudheera-product-info">

                                    <a href="#" class="sudheera-product-name">
                                        Kanchipuram Pure Silk Saree
                                    </a>

                                    <div class="sudheera-product-variant">
                                        Colour: Maroon
                                    </div>

                                    <div class="sudheera-product-price">

                                        <span class="sudheera-price-new">
                                            ₹4,999.00
                                        </span>

                                        <span class="sudheera-price-old">
                                            ₹6,499.00
                                        </span>

                                    </div>

                                    <button class="sudheera-remove">
                                        REMOVE
                                    </button>

                                </div>

                            </div>


                            <div class="sudheera-quantity">

                                <span class="sudheera-quantity-label">
                                    Quantity
                                </span>

                                <div class="sudheera-quantity-box">

                                    <button type="button">−</button>

                                    <input type="number" value="1" min="1">

                                    <button type="button">+</button>

                                </div>

                                <button class="sudheera-update">
                                    UPDATE
                                </button>

                            </div>


                            <div class="sudheera-item-total">
                                ₹4,999.00
                            </div>

                        </div>


                        <!-- PRODUCT 2 -->

                        <div class="sudheera-cart-item">

                            <div class="sudheera-product">

                                <a href="#" class="sudheera-product-image">

                                    <img
                                        loading="lazy"
                                        src="{{ asset('website') }}/images/product2.webp"
                                        alt="Traditional Banarasi Silk Saree">

                                </a>

                                <div class="sudheera-product-info">

                                    <a href="#" class="sudheera-product-name">
                                        Traditional Banarasi Silk Saree
                                    </a>

                                    <div class="sudheera-product-variant">
                                        Colour: Royal Blue
                                    </div>

                                    <div class="sudheera-product-price">

                                        <span class="sudheera-price-new">
                                            ₹3,499.00
                                        </span>

                                        <span class="sudheera-price-old">
                                            ₹4,599.00
                                        </span>

                                    </div>

                                    <button class="sudheera-remove">
                                        REMOVE
                                    </button>

                                </div>

                            </div>


                            <div class="sudheera-quantity">

                                <span class="sudheera-quantity-label">
                                    Quantity
                                </span>

                                <div class="sudheera-quantity-box">

                                    <button type="button">−</button>

                                    <input type="number" value="1" min="1">

                                    <button type="button">+</button>

                                </div>

                                <button class="sudheera-update">
                                    UPDATE
                                </button>

                            </div>


                            <div class="sudheera-item-total">
                                ₹3,499.00
                            </div>

                        </div>


                        <!-- PRODUCT 3 -->

                        <div class="sudheera-cart-item">

                            <div class="sudheera-product">

                                <a href="#" class="sudheera-product-image">

                                    <img
                                        loading="lazy"
                                        src="{{ asset('website') }}/images/product3.webp"
                                        alt="Handloom Cotton Saree">

                                </a>

                                <div class="sudheera-product-info">

                                    <a href="#" class="sudheera-product-name">
                                        Handloom Cotton Saree
                                    </a>

                                    <div class="sudheera-product-variant">
                                        Colour: Green
                                    </div>

                                    <div class="sudheera-product-price">

                                        <span class="sudheera-price-new">
                                            ₹1,899.00
                                        </span>

                                        <span class="sudheera-price-old">
                                            ₹2,499.00
                                        </span>

                                    </div>

                                    <button class="sudheera-remove">
                                        REMOVE
                                    </button>

                                </div>

                            </div>


                            <div class="sudheera-quantity">

                                <span class="sudheera-quantity-label">
                                    Quantity
                                </span>

                                <div class="sudheera-quantity-box">

                                    <button type="button">−</button>

                                    <input type="number" value="1" min="1">

                                    <button type="button">+</button>

                                </div>

                                <button class="sudheera-update">
                                    UPDATE
                                </button>

                            </div>


                            <div class="sudheera-item-total">
                                ₹1,899.00
                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     RIGHT SIDEBAR
                ================================================== -->

                <div class="col-lg-5">

                    <div class="sudheera-cart-sidebar">


                        <!-- SHIPPING -->

                        <div class="sudheera-shipping-message">

                            <p>
                                You're <strong>₹603 away</strong> from FREE SHIPPING
                            </p>

                            <div class="sudheera-progress">
                                <span></span>
                            </div>

                        </div>


                        <!-- GIFT -->

                        <div class="sudheera-gift-box">

                            <div class="sudheera-gift-icon">
                                🎁
                            </div>

                            <div class="sudheera-gift-content">

                                <h5>
                                    Make it a special gift
                                </h5>

                                <p>
                                    Add beautiful gift wrapping and a
                                    personalised message.
                                </p>

                                <a href="#">
                                    ADD GIFT WRAP
                                </a>

                            </div>

                        </div>


                        <!-- SUMMARY -->

                        <h3 class="sudheera-summary-title">
                            Order Summary
                        </h3>


                        <div class="sudheera-summary-row">

                            <span>
                                Subtotal
                            </span>

                            <span>
                                ₹10,397.00
                            </span>

                        </div>


                        <div class="sudheera-summary-row">

                            <span>
                                Shipping
                            </span>

                            <span>
                                ₹0.00
                            </span>

                        </div>


                        <div class="sudheera-summary-row discount">

                            <span>
                                Discount
                            </span>

                            <span>
                                - ₹500.00
                            </span>

                        </div>


                        <div class="sudheera-summary-row total">

                            <span>
                                Total
                            </span>

                            <span>
                                ₹9,897.00
                            </span>

                        </div>


                        <div class="sudheera-saved">

                            You saved ₹2,700.00 on this order

                        </div>


                        <a href="#" class="sudheera-checkout-btn">

                            PROCEED TO CHECKOUT

                        </a>


                        <a href="#" class="sudheera-continue">

                            Continue Shopping

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection