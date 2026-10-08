@extends('layouts.website')

@section('content')

<style>
    /* =========================================================
       SUDHEERA SAREES - STATIC ACCOUNT PAGE
    ========================================================= */

    .sudheera-account-page {
        background: #fbf8f3;
        min-height: 100vh;
        padding: 10px 0 70px;
        color: #420916;
    }

    /* =========================================================
       BREADCRUMB
    ========================================================= */

    .sudheera-breadcrumb-section {
        padding-bottom: 10px;
    }

    .sudheera-breadcrumb-content {
        padding-top: 50px;
    }

    .sudheera-breadcrumb-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sudheera-breadcrumb-list li {
        font-size: 13px;
        color: #83786e;
    }

    .sudheera-breadcrumb-list a {
        color: #76001f;
        text-decoration: none;
        font-weight: 600;
    }

    .sudheera-breadcrumb-list a:hover {
        color: #c88618;
    }

    /* =========================================================
       ACCOUNT LAYOUT
    ========================================================= */

    .sudheera-account-wrapper {
        padding-top: 45px;
    }

    /* =========================================================
       SIDEBAR
    ========================================================= */

    .sudheera-sidebar {
        background: #fff;
        border: 1px solid #eadfce;
        border-radius: 18px;
        padding: 10px;
        box-shadow: 0 8px 30px rgba(66, 9, 22, .05);
        position: sticky;
        top: 25px;
    }

    .sudheera-account-nav {
        display: flex;
        flex-direction: column;
    }

    .sudheera-account-link {
        display: flex;
        align-items: center;
        gap: 13px;
        min-height: 54px;
        padding: 0 15px;
        color: #62584f;
        text-decoration: none;
        border-radius: 12px;
        transition: all .3s ease;
        font-size: 13px;
        font-weight: 500;
    }

    .sudheera-account-link i:first-child {
        width: 22px;
        text-align: center;
        color: #a47724;
        font-size: 18px;
    }

    .sudheera-account-link .arrow {
        margin-left: auto;
        color: #b8aa9a;
        font-size: 13px;
    }

    .sudheera-account-link:hover {
        background: #fbf5ea;
        color: #420916;
    }

    .sudheera-account-link.active {
        background: #420916;
        color: #fff;
        box-shadow: 0 7px 18px rgba(66, 9, 22, .13);
    }

    .sudheera-account-link.active i:first-child,
    .sudheera-account-link.active .arrow {
        color: #c88618;
    }

    /* =========================================================
       MAIN CONTENT
    ========================================================= */

    .sudheera-account-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .sudheera-dashboard-card {
        position: relative;
        background: #fff;
        border: 1px solid #eadfce;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(66, 9, 22, .045);
    }

    .sudheera-dashboard-card::before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        height: 3px;
        background: linear-gradient(
            90deg,
            #420916,
            #8f3b16,
            #c88618
        );
    }

    /* =========================================================
       CARD HEADER
    ========================================================= */

    .sudheera-card-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 23px 25px;
        border-bottom: 1px solid #eee6dc;
    }

    .sudheera-card-title h6 {
        margin: 0;
        color: #420916;
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: 24px;
        font-weight: 700;
    }

    .sudheera-card-subtitle {
        margin: 4px 0 0;
        color: #91877d;
        font-size: 11px;
    }

    .sudheera-card-content {
        padding: 25px;
    }

    /* =========================================================
       PERSONAL INFORMATION
    ========================================================= */

    .sudheera-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .sudheera-info-item {
        padding: 18px;
        background: #fcfaf7;
        border: 1px solid #eee6dc;
        border-radius: 13px;
    }

    .sudheera-info-label {
        color: #9a9087;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 7px;
    }

    .sudheera-info-value {
        color: #420916;
        font-size: 14px;
        font-weight: 600;
    }

    /* =========================================================
       ADDRESS
    ========================================================= */

    .sudheera-address {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        padding: 19px;
        background: #fcfaf7;
        border: 1px solid #eee6dc;
        border-radius: 14px;
    }

    .sudheera-address-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #420916;
        color: #c88618;
        font-size: 17px;
    }

    .sudheera-address-name {
        color: #420916;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .sudheera-address-text {
        color: #756c64;
        font-size: 13px;
        line-height: 1.75;
        margin: 0;
    }

    /* =========================================================
       TESTIMONIAL
    ========================================================= */

    .sudheera-testimonial-intro {
        margin-bottom: 22px;
        padding: 15px 17px;
        background: #fff8e9;
        border-left: 3px solid #c88618;
        border-radius: 9px;
        color: #755c2c;
        font-size: 12px;
        line-height: 1.6;
    }

    .sudheera-form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .sudheera-form-group {
        margin-bottom: 0;
    }

    .sudheera-form-group.full {
        grid-column: 1 / -1;
    }

    .sudheera-form-label {
        display: block;
        margin-bottom: 7px;
        color: #420916;
        font-size: 12px;
        font-weight: 700;
    }

    .sudheera-required {
        color: #a52d2d;
    }

    .sudheera-form-control {
        width: 100%;
        min-height: 45px;
        padding: 10px 13px;
        border: 1px solid #dfd3c3;
        border-radius: 9px;
        background: #fff;
        color: #420916;
        font-size: 13px;
        outline: none;
        transition: all .3s ease;
    }

    .sudheera-form-control:focus {
        border-color: #c88618;
        box-shadow: 0 0 0 3px rgba(200, 134, 24, .10);
    }

    textarea.sudheera-form-control {
        min-height: 125px;
        resize: vertical;
    }

    .sudheera-rating-select {
        cursor: pointer;
    }

    /* =========================================================
       BUTTON
    ========================================================= */

    .sudheera-submit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 45px;
        padding: 10px 22px;
        background: #420916;
        border: 1px solid #420916;
        border-radius: 9px;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all .3s ease;
    }

    .sudheera-submit-btn:hover {
        background: linear-gradient(
            135deg,
            #420916,
            #76001f,
            #a85c17
        );
        border-color: #76001f;
        transform: translateY(-1px);
        color: #fff;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 991px) {

        .sudheera-sidebar {
            position: static;
            margin-bottom: 25px;
        }

        .sudheera-info-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 767px) {

        .sudheera-account-page {
            padding-bottom: 50px;
        }

        .sudheera-breadcrumb-content {
            padding-top: 30px;
        }

        .sudheera-account-wrapper {
            padding-top: 25px;
        }

        .sudheera-sidebar {
            border-radius: 15px;
        }

        .sudheera-account-link {
            min-height: 50px;
        }

        .sudheera-card-title {
            padding: 20px;
        }

        .sudheera-card-title h6 {
            font-size: 21px;
        }

        .sudheera-card-content {
            padding: 20px;
        }

        .sudheera-info-grid,
        .sudheera-form-grid {
            grid-template-columns: 1fr;
        }

        .sudheera-form-group.full {
            grid-column: auto;
        }

        .sudheera-address {
            padding: 15px;
        }

        .sudheera-submit-btn {
            width: 100%;
        }
    }

    @media (max-width: 480px) {

        .sudheera-breadcrumb-list li {
            font-size: 12px;
        }

        .sudheera-card-content {
            padding: 16px;
        }

        .sudheera-card-title {
            padding: 17px;
        }

        .sudheera-info-item {
            padding: 15px;
        }

        .sudheera-address-icon {
            width: 37px;
            height: 37px;
            min-width: 37px;
        }

        .sudheera-address-text {
            font-size: 12px;
        }
    }
</style>

<!-- =========================================================
     ACCOUNT PAGE
========================================================= -->

<main class="sudheera-account-page">
<!-- =====================================================
     BREADCRUMB
====================================================== -->

<section class="sudheera-breadcrumb-section">

    <div class="container">

        <div class="sudheera-breadcrumb-content">

            <ul class="sudheera-breadcrumb-list">

                <li>
                    <a href="#">
                        Home
                    </a>

                    <span style="margin:0 8px;">
                        /
                    </span>

                    Account
                </li>

            </ul>

        </div>

    </div>

</section>


<!-- =====================================================
     ACCOUNT
====================================================== -->

<section class="sudheera-account-wrapper">

    <div class="container">

        <div class="row">


            <!-- =================================================
                 SIDEBAR
            ================================================== -->

            <div class="col-lg-4 col-xl-3">

                <div class="sudheera-sidebar">

                    <div class="sudheera-account-nav">


                        <!-- DASHBOARD -->

                        <a href="#"
                           class="sudheera-account-link active">

                            <i class="icon icon-Dashboard"></i>

                            <span>
                                Dashboard
                            </span>

                            <i class="icon icon-ArrowCaretRight arrow"></i>

                        </a>


                        <!-- ORDERS -->

                        <a href="#"
                           class="sudheera-account-link">

                            <i class="icon icon-Box"></i>

                            <span>
                                My Orders
                            </span>

                            <i class="icon icon-ArrowCaretRight arrow"></i>

                        </a>


                        <!-- WISHLIST -->

                        <a href="#"
                           class="sudheera-account-link">

                            <i class="icon icon-Hearth"></i>

                            <span>
                                Wishlist
                            </span>

                            <i class="icon icon-ArrowCaretRight arrow"></i>

                        </a>


                        <!-- ADDRESSES -->

                        <a href="#"
                           class="sudheera-account-link">

                            <i class="icon icon-DotLocation"></i>

                            <span>
                                Addresses
                            </span>

                            <i class="icon icon-ArrowCaretRight arrow"></i>

                        </a>


                        <!-- SETTINGS -->

                        <a href="#"
                           class="sudheera-account-link">

                            <i class="icon icon-Setting"></i>

                            <span>
                                Account Settings
                            </span>

                            <i class="icon icon-ArrowCaretRight arrow"></i>

                        </a>


                        <!-- LOGOUT -->

                        <a href="#"
                           class="sudheera-account-link">

                            <i class="icon icon-Logout"></i>

                            <span>
                                Log Out
                            </span>

                        </a>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 MAIN CONTENT
            ================================================== -->

            <div class="col-lg-8 col-xl-9">

                <div class="sudheera-account-content">


                    <!-- =================================================
                         PERSONAL INFORMATION
                    ================================================== -->

                    <div class="sudheera-dashboard-card">

                        <div class="sudheera-card-title">

                            <div>

                                <h6>
                                    Personal Information
                                </h6>

                                <p class="sudheera-card-subtitle">
                                    Your account information
                                </p>

                            </div>

                        </div>


                        <div class="sudheera-card-content">

                            <div class="sudheera-info-grid">


                                <!-- FULL NAME -->

                                <div class="sudheera-info-item">

                                    <div class="sudheera-info-label">
                                        Full Name
                                    </div>

                                    <div class="sudheera-info-value">
                                        Vasanth Kumar
                                    </div>

                                </div>


                                <!-- PHONE -->

                                <div class="sudheera-info-item">

                                    <div class="sudheera-info-label">
                                        Phone Number
                                    </div>

                                    <div class="sudheera-info-value">
                                        +91 98765 43210
                                    </div>

                                </div>


                                <!-- EMAIL -->

                                <div class="sudheera-info-item">

                                    <div class="sudheera-info-label">
                                        Email
                                    </div>

                                    <div class="sudheera-info-value">
                                        vasanth@example.com
                                    </div>

                                </div>


                                <!-- CUSTOMER TYPE -->

                                <div class="sudheera-info-item">

                                    <div class="sudheera-info-label">
                                        Customer Type
                                    </div>

                                    <div class="sudheera-info-value">
                                        Regular Customer
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         DEFAULT ADDRESS
                    ================================================== -->

                    <div class="sudheera-dashboard-card">

                        <div class="sudheera-card-title">

                            <div>

                                <h6>
                                    Default Address
                                </h6>

                                <p class="sudheera-card-subtitle">
                                    Your primary delivery address
                                </p>

                            </div>

                        </div>


                        <div class="sudheera-card-content">

                            <div class="sudheera-address">


                                <div class="sudheera-address-icon">

                                    <i class="icon icon-DotLocation"></i>

                                </div>


                                <div>

                                    <div class="sudheera-address-name">
                                        Vasanth Kumar
                                    </div>


                                    <p class="sudheera-address-text">

                                        +91 98765 43210

                                        <br>

                                        12-45, MG Road, Near City Center

                                        <br>

                                        Bengaluru,
                                        Karnataka
                                        - 560001

                                        <br>

                                        India

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         SHARE YOUR EXPERIENCE
                    ================================================== -->

                    <div class="sudheera-dashboard-card">

                        <div class="sudheera-card-title">

                            <div>

                                <h6>
                                    Share Your Experience
                                </h6>

                                <p class="sudheera-card-subtitle">
                                    Tell us what you think about Sudheera Sarees
                                </p>

                            </div>

                        </div>


                        <div class="sudheera-card-content">


                            <div class="sudheera-testimonial-intro">

                                <i class="fa fa-info-circle"
                                   style="margin-right:6px;"></i>

                                We value your feedback.
                                Share your shopping experience with us.

                            </div>


                            <form action="#"
                                  method="POST"
                                  enctype="multipart/form-data">

                                <div class="sudheera-form-grid">


                                    <!-- NAME -->

                                    <div class="sudheera-form-group">

                                        <label class="sudheera-form-label">

                                            Full Name

                                            <span class="sudheera-required">
                                                *
                                            </span>

                                        </label>

                                        <input
                                            type="text"
                                            name="name"
                                            class="sudheera-form-control"
                                            value="Vasanth Kumar"
                                            placeholder="Enter your full name">

                                    </div>


                                    <!-- RATING -->

                                    <div class="sudheera-form-group">

                                        <label class="sudheera-form-label">

                                            Rating

                                            <span class="sudheera-required">
                                                *
                                            </span>

                                        </label>

                                        <select
                                            name="rating"
                                            class="sudheera-form-control sudheera-rating-select">

                                            <option value="">
                                                Select Rating
                                            </option>

                                            <option value="5">
                                                ★★★★★ Excellent
                                            </option>

                                            <option value="4">
                                                ★★★★☆ Very Good
                                            </option>

                                            <option value="3">
                                                ★★★☆☆ Good
                                            </option>

                                            <option value="2">
                                                ★★☆☆☆ Fair
                                            </option>

                                            <option value="1">
                                                ★☆☆☆☆ Poor
                                            </option>

                                        </select>

                                    </div>


                                    <!-- EXPERIENCE -->

                                    <div class="sudheera-form-group full">

                                        <label class="sudheera-form-label">

                                            Your Experience

                                            <span class="sudheera-required">
                                                *
                                            </span>

                                        </label>

                                        <textarea
                                            name="message"
                                            class="sudheera-form-control"
                                            placeholder="Tell us about your experience..."></textarea>

                                    </div>


                                    <!-- SUBMIT -->

                                    <div class="sudheera-form-group full">

                                        <button
                                            type="submit"
                                            class="sudheera-submit-btn">

                                            <i class="fa fa-paper-plane"></i>

                                            Submit Testimonial

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>

</main>

@endsection
