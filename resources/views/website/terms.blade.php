
@extends('layouts.website')

@section('content')

<style>
    /* =========================================================
       SUDHEERA SAREES - TERMS OF SERVICE
    ========================================================= */

    .sudheera-terms-page {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* ================= BREADCRUMB ================= */

    .sudheera-terms-breadcrumb {
        padding-bottom: 10px;
    }

    .sudheera-terms-breadcrumb .breadcrumb-content {
        padding-top: 50px;
    }

    .sudheera-terms-breadcrumb .breadcrumb-list {
        display: flex;
        align-items: center;
        gap: 0;
        list-style: none !important;
        padding: 0;
        margin: 0;
        margin-left: 20px;
    }

    .sudheera-terms-breadcrumb .breadcrumb-list li {
        list-style: none !important;
        font-size: 14px;
        color: #7a686b;
    }

    .sudheera-terms-breadcrumb .breadcrumb-list a {
        color: #30000e;
        text-decoration: none;
        font-weight: 600;
        transition: .3s ease;
    }

    .sudheera-terms-breadcrumb .breadcrumb-list a:hover {
        color: #c88618;
    }

    .sudheera-terms-separator {
        margin: 0 10px;
        color: #c88618;
        font-weight: 700;
    }


    /* ================= MAIN CARD ================= */

    .sudheera-terms-content {
        max-width: 1050px;
        margin: 0 auto;
        background: #fff;
        /* border: 1px solid #eee2d8; */
        /* border-radius: 30px; */
        padding: 48px 52px;
        /* box-shadow: 0 15px 45px rgba(48, 0, 14, .06); */
    }


    /* ================= HEADER ================= */

    .sudheera-terms-header {
        text-align: center;
        margin-bottom: 42px;
    }

    .sudheera-terms-label {
        display: inline-block;
        margin-bottom: 12px;
        color: #c88618;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .sudheera-terms-title {
        margin: 0 0 14px;
        color: #30000e;
        font-size: 40px;
        line-height: 1.2;
        font-weight: 600;
    }

    .sudheera-terms-intro {
        max-width: 760px;
        margin: 0 auto;
        color: #76666a;
        font-size: 16px;
        line-height: 1.8;
    }

    .sudheera-terms-divider {
        width: 75px;
        height: 3px;
        margin: 20px auto 0;
        border-radius: 50px;
        background: linear-gradient(
            90deg,
            #30000e,
            #c88618
        );
    }


    /* ================= TERM ITEMS ================= */

    .sudheera-term-item {
        padding: 28px 0;
        border-bottom: 1px solid #eee5df;
    }

    .sudheera-term-item:first-of-type {
        padding-top: 0;
    }

    .sudheera-term-item:last-child {
        padding-bottom: 0;
        border-bottom: 0;
    }


    /* ================= SECTION TITLE ================= */

    .sudheera-term-heading {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 14px;
        color: #30000e;
        font-size: 19px;
        font-weight: 700;
    }

    .sudheera-term-heading::before {
        content: '';
        width: 5px;
        height: 25px;
        flex-shrink: 0;
        border-radius: 10px;
        background: linear-gradient(
            180deg,
            #30000e,
            #c88618
        );
    }


    /* ================= TEXT ================= */

    .sudheera-term-text {
        margin: 0;
        color: #5e5255;
        font-size: 15px;
        line-height: 1.85;
    }

    .sudheera-term-text strong {
        color: #3b111c;
        font-weight: 700;
    }


    /* ================= LIST ================= */

    .sudheera-term-list {
        margin: 10px 0 0;
        padding-left: 25px;
    }

    .sudheera-term-list li {
        margin-bottom: 8px;
        padding-left: 5px;
        color: #5e5255;
        font-size: 15px;
        line-height: 1.85;
    }

    .sudheera-term-list li::marker {
        color: #c88618;
        font-size: 14px;
    }


    /* ================= HIGHLIGHT BOX ================= */

    .sudheera-terms-highlight {
        margin-top: 18px;
        padding: 20px 22px;
        background: linear-gradient(
            135deg,
            #fffaf4,
            #fbf1e7
        );
        border-left: 4px solid #c88618;
        border-radius: 13px;
    }

    .sudheera-terms-highlight p {
        margin: 0;
        color: #5c4b4f;
        font-size: 14px;
        line-height: 1.8;
    }


    /* ================= ADDRESS BOX ================= */

    .sudheera-address-box {
        margin-top: 18px;
        padding: 22px 24px;
        border-radius: 18px;
        background: #fffaf5;
        border: 1px solid #eee0d2;
    }

    .sudheera-address-box p {
        margin: 0;
        color: #5e5255;
        font-size: 15px;
        line-height: 1.85;
    }

    .sudheera-address-box strong {
        color: #30000e;
    }


    /* ================= MOBILE ================= */

    @media (max-width: 767px) {

        .sudheera-terms-breadcrumb .breadcrumb-content {
            padding-top: 30px;
        }

        .sudheera-terms-breadcrumb .breadcrumb-list li {
            font-size: 13px;
        }

        .sudheera-terms-separator {
            margin: 0 7px;
        }

        .sudheera-terms-content {
            padding: 30px 20px;
            border-radius: 22px;
        }

        .sudheera-terms-header {
            margin-bottom: 30px;
        }

        .sudheera-terms-label {
            font-size: 11px;
            letter-spacing: 2px;
        }

        .sudheera-terms-title {
            font-size: 29px;
        }

        .sudheera-terms-intro {
            font-size: 14px;
            line-height: 1.75;
        }

        .sudheera-term-item {
            padding: 23px 0;
        }

        .sudheera-term-heading {
            font-size: 17px;
            gap: 10px;
        }

        .sudheera-term-heading::before {
            width: 4px;
            height: 21px;
        }

        .sudheera-term-text,
        .sudheera-term-list li {
            font-size: 14px;
            line-height: 1.8;
        }

        .sudheera-term-list {
            padding-left: 21px;
        }

        .sudheera-terms-highlight {
            padding: 15px 16px;
        }

        .sudheera-address-box {
            padding: 18px;
        }
    }
</style>


<!-- =========================================================
     BREADCRUMB
========================================================= -->

<section class="page-breadcrumb sudheera-terms-breadcrumb">

    <div class="container">

        <div class="breadcrumb-content">

            <ul class="breadcrumb-list">

                <li>
                    <a href="/">
                        Home
                    </a>
                </li>

                <li>
                    <span class="sudheera-terms-separator">
                        /
                    </span>
                </li>

                <li>
                    Terms
                </li>

            </ul>

        </div>

    </div>

</section>


<!-- =========================================================
     TERMS OF SERVICE
========================================================= -->

<div class="section-term-user flat-spacing">

    <div class="container">

        <div class="sudheera-terms-page">

            <div class="sudheera-terms-content">


                <!-- ================= HEADER ================= -->

                <div class="sudheera-terms-header">

                    <span class="sudheera-terms-label">
                        Sudheera Sarees
                    </span>

                    <h1 class="sudheera-terms-title font-instrument_serif">
                        Terms of Service
                    </h1>

                    <p class="sudheera-terms-intro">
                        Welcome to Sudheera Sarees. By accessing or
                        using our website, you agree to comply with
                        these Terms of Service and our applicable
                        policies.
                    </p>

                    <div class="sudheera-terms-divider"></div>

                </div>


                <!-- ================= ORDERS ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Orders
                    </h5>

                    <ul class="sudheera-term-list">

                        <li>
                            All orders are subject to product
                            availability and acceptance.
                        </li>

                        <li>
                            We reserve the right to refuse or cancel
                            any order at our discretion.
                        </li>

                        <li>
                            If an order is cancelled by us after
                            payment, the applicable refund will be
                            issued to the original payment method.
                        </li>

                    </ul>

                </div>


                <!-- ================= PRODUCTS ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Products
                    </h5>

                    <ul class="sudheera-term-list">

                        <li>
                            Product images are provided for
                            illustration purposes and actual colours
                            may vary slightly depending on your
                            display.
                        </li>

                        <li>
                            Saree designs, colours, textures and
                            patterns may have minor variations due
                            to the nature of the fabric and
                            manufacturing process.
                        </li>

                        <li>
                            Please carefully review the product
                            description, size and other available
                            details before placing an order.
                        </li>

                    </ul>

                </div>


                <!-- ================= ACCOUNT ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Account
                    </h5>

                    <p class="sudheera-term-text">

                        You are responsible for providing accurate
                        information while creating or using your
                        account. You are also responsible for
                        maintaining the confidentiality of your
                        account credentials and for activities
                        performed through your account.

                    </p>

                </div>


                <!-- ================= ORDER ISSUES ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Issues With Your Order
                    </h5>

                    <p class="sudheera-term-text">

                        In case your order arrives damaged, defective,
                        incorrect or there is any discrepancy, please
                        contact our customer support team within the
                        applicable period mentioned in our
                        Return & Refund Policy.

                    </p>

                    <div class="sudheera-terms-highlight">

                        <p>
                            <strong>Important:</strong>
                            Please retain the original packaging and
                            product until your concern has been
                            reviewed and resolved by our support team.
                        </p>

                    </div>

                </div>


                <!-- ================= INTELLECTUAL PROPERTY ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Intellectual Property
                    </h5>

                    <p class="sudheera-term-text">

                        All content available on the Sudheera Sarees
                        website, including product images, photographs,
                        logos, graphics, text, designs and trademarks,
                        belongs to Sudheera Sarees or its respective
                        owners.

                        <br><br>

                        Such content may not be copied, reproduced,
                        modified, distributed or used for commercial
                        purposes without prior written permission.

                    </p>

                </div>


                <!-- ================= LIABILITY ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Liability
                    </h5>

                    <p class="sudheera-term-text">

                        To the extent permitted by applicable law,
                        Sudheera Sarees shall not be liable for
                        indirect, incidental or consequential damages
                        arising from the use of our website or
                        products.

                        <br><br>

                        Our liability, where applicable, shall be
                        limited to the value of the product purchased
                        by the customer.

                    </p>

                </div>


                <!-- ================= CHANGES ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Changes to Terms
                    </h5>

                    <p class="sudheera-term-text">

                        We may update or modify these Terms of Service
                        from time to time. Any changes will be posted
                        on this page.

                        <br><br>

                        Continued use of the website after changes
                        are posted constitutes acceptance of the
                        revised terms.

                    </p>

                </div>


                <!-- ================= GOVERNING LAW ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Governing Law
                    </h5>

                    <p class="sudheera-term-text">

                        These Terms of Service shall be governed by
                        and interpreted in accordance with the
                        applicable laws of India.

                        Any disputes arising in connection with
                        these terms shall be subject to the
                        jurisdiction of the appropriate courts.

                    </p>

                </div>


                <!-- ================= REGISTERED ADDRESS ================= -->

                <div class="sudheera-term-item">

                    <h5 class="sudheera-term-heading">
                        Registered Address
                    </h5>

                    <div class="sudheera-address-box">

                        <p>

                            <strong>Sudheera Sarees</strong>
                            <br>

                            Registered Office Address
                            <br>

                            India

                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>

</div>


@endsection