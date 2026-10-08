@extends('layouts.website')
@section('content')

<style>
    /* =========================================================
       SUDHEERA SAREES - SHIPPING & DELIVERY PAGE
    ========================================================= */

    .sudheera-policy-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* ================= BREADCRUMB ================= */

    .sudheera-policy-breadcrumb {
        padding-bottom: 10px;
    }

    .sudheera-policy-breadcrumb .breadcrumb-content {
        padding-top: 50px;
    }

    .sudheera-policy-breadcrumb .breadcrumb-list {
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 0;
        margin-left: 20px;
    }

    .sudheera-policy-breadcrumb .breadcrumb-list li {
        font-size: 14px;
        color: #806b70;
    }

    .sudheera-policy-breadcrumb .breadcrumb-list a {
        color: #30000e;
        text-decoration: none;
        font-weight: 600;
        transition: .3s ease;
    }

    .sudheera-policy-breadcrumb .breadcrumb-list a:hover {
        color: #c88618;
    }

    .sudheera-policy-breadcrumb .breadcrumb-separator {
        margin: 0 10px;
        color: #c88618;
        font-weight: 700;
    }

    /* ================= MAIN CONTENT ================= */

    .sudheera-policy-content {
        max-width: 1050px;
        margin: 0 auto;
        background: #fff;
        /* border: 1px solid #eee2d8; */
        /* border-radius: 30px; */
        padding: 48px 52px;
        box-shadow: 0 15px 45px rgba(48, 0, 14, .06);
    }

    /* ================= HEADER ================= */

    .sudheera-policy-header {
        text-align: center;
        margin-bottom: 42px;
        position: relative;
    }

    .sudheera-policy-label {
        display: inline-block;
        font-size: 12px;
        letter-spacing: 3px;
        text-transform: uppercase;
        font-weight: 700;
        color: #c88618;
        margin-bottom: 12px;
    }

    .sudheera-policy-title {
        font-size: 40px;
        line-height: 1.2;
        color: #30000e;
        margin: 0 0 15px;
        font-weight: 600;
    }

    .sudheera-policy-intro {
        max-width: 700px;
        margin: 0 auto;
        color: #76666a;
        font-size: 16px;
        line-height: 1.8;
    }

    .sudheera-policy-divider {
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

    /* ================= POLICY ITEM ================= */

    .sudheera-policy-item {
        padding: 28px 0;
        border-bottom: 1px solid #eee5df;
    }

    .sudheera-policy-item:first-of-type {
        padding-top: 0;
    }

    .sudheera-policy-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    /* ================= SECTION TITLE ================= */

    .sudheera-policy-section-title {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 14px;
        color: #30000e;
        font-size: 19px;
        font-weight: 700;
    }

    .sudheera-policy-section-title::before {
        content: '';
        width: 5px;
        height: 25px;
        border-radius: 10px;
        background: linear-gradient(
            180deg,
            #30000e,
            #c88618
        );
        flex-shrink: 0;
    }

    /* ================= TEXT ================= */

    .sudheera-policy-text {
        font-size: 15px;
        line-height: 1.85;
        color: #5e5255;
        margin: 0;
    }

    .sudheera-policy-text strong {
        color: #3b111c;
    }

    /* ================= LIST ================= */

    .sudheera-policy-list {
        margin: 10px 0 0;
        padding-left: 25px;
    }

    .sudheera-policy-list li {
        font-size: 15px;
        line-height: 1.85;
        color: #5e5255;
        margin-bottom: 8px;
        padding-left: 5px;
    }

    .sudheera-policy-list li::marker {
        color: #c88618;
        font-size: 14px;
    }

    /* ================= HIGHLIGHT BOX ================= */

    .sudheera-policy-highlight {
        margin-top: 15px;
        padding: 18px 20px;
        background: linear-gradient(
            135deg,
            #fffaf4,
            #fbf1e7
        );
        border-left: 4px solid #c88618;
        border-radius: 12px;
    }

    .sudheera-policy-highlight p {
        margin: 0;
        font-size: 14px;
        line-height: 1.7;
        color: #5c4b4f;
    }

    .sudheera-policy-highlight strong {
        color: #30000e;
    }

    /* ================= CONTACT BOX ================= */

    .sudheera-policy-contact {
        margin-top: 32px;
        padding: 24px;
        border-radius: 20px;
        background: linear-gradient(
            135deg,
            #30000e,
            #65001b,
            #8a4023
        );
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .sudheera-policy-contact::after {
        content: '';
        position: absolute;
        width: 170px;
        height: 170px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        right: -60px;
        top: -70px;
    }

    .sudheera-policy-contact-content {
        position: relative;
        z-index: 2;
    }

    .sudheera-policy-contact h5 {
        color: #e5c27b;
        font-size: 18px;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .sudheera-policy-contact p {
        margin: 0;
        color: rgba(255,255,255,.88);
        font-size: 14px;
        line-height: 1.8;
    }

    .sudheera-policy-contact a {
        color: #e5c27b;
        font-weight: 600;
        text-decoration: none;
    }

    .sudheera-policy-contact a:hover {
        color: #fff;
    }

    /* ================= MOBILE ================= */

    @media (max-width: 767px) {

        .sudheera-policy-breadcrumb .breadcrumb-content {
            padding-top: 30px;
        }

        .sudheera-policy-breadcrumb .breadcrumb-list li {
            font-size: 13px;
        }

        .sudheera-policy-breadcrumb .breadcrumb-separator {
            margin: 0 7px;
        }

        .sudheera-policy-content {
            padding: 30px 20px;
            border-radius: 22px;
        }

        .sudheera-policy-header {
            margin-bottom: 30px;
        }

        .sudheera-policy-label {
            font-size: 11px;
            letter-spacing: 2px;
        }

        .sudheera-policy-title {
            font-size: 29px;
        }

        .sudheera-policy-intro {
            font-size: 14px;
            line-height: 1.75;
        }

        .sudheera-policy-item {
            padding: 23px 0;
        }

        .sudheera-policy-section-title {
            font-size: 17px;
            gap: 10px;
        }

        .sudheera-policy-section-title::before {
            width: 4px;
            height: 21px;
        }

        .sudheera-policy-text,
        .sudheera-policy-list li {
            font-size: 14px;
            line-height: 1.8;
        }

        .sudheera-policy-list {
            padding-left: 21px;
        }

        .sudheera-policy-highlight {
            padding: 15px 16px;
        }

        .sudheera-policy-contact {
            padding: 20px;
            border-radius: 17px;
        }
    }
</style>


<!-- =========================================================
     BREADCRUMB
========================================================= -->

<section class="page-breadcrumb sudheera-policy-breadcrumb">

    <div class="container">

        <div class="breadcrumb-content">

            <ul class="breadcrumb-list">

                <li>
                    <a href="/">
                        Home
                    </a>
                </li>

                <li>
                    <span class="breadcrumb-separator">
                        /
                    </span>
                </li>

                <li>
                    Shipping & Delivery Policy
                </li>

            </ul>

        </div>

    </div>

</section>


<!-- =========================================================
     SHIPPING & DELIVERY POLICY
========================================================= -->

<div class="section-term-user flat-spacing">

    <div class="container">

        <div class="sudheera-policy-container">

            <div class="sudheera-policy-content">


                <!-- ================= HEADER ================= -->

                <div class="sudheera-policy-header">

                    <span class="sudheera-policy-label">
                        Sudheera Sarees
                    </span>

                    <h1 class="sudheera-policy-title font-instrument_serif">
                        Shipping & Delivery Policy
                    </h1>

                    <p class="sudheera-policy-intro">
                        At Sudheera Sarees, we take great care to ensure
                        that your sarees reach you safely, beautifully
                        packed, and within the expected delivery time.
                    </p>

                    <div class="sudheera-policy-divider"></div>

                </div>


                <!-- ================= ORDER PROCESSING ================= -->

                <div class="sudheera-policy-item">

                    <h5 class="sudheera-policy-section-title">
                        Order Processing
                    </h5>

                    <p class="sudheera-policy-text">
                        All confirmed orders are carefully checked,
                        packed and prepared for dispatch.
                    </p>

                    <ul class="sudheera-policy-list">

                        <li>
                            Orders are generally processed within
                            1–3 business days after confirmation.
                        </li>

                        <li>
                            Orders are processed only after successful
                            payment confirmation.
                        </li>

                        <li>
                            During festivals, holidays, new collection
                            launches or sale periods, processing may
                            take a little longer.
                        </li>

                        <li>
                            Customers will receive shipping details
                            once the order has been dispatched.
                        </li>

                    </ul>

                </div>


                <!-- ================= DELIVERY INDIA ================= -->

                <div class="sudheera-policy-item">

                    <h5 class="sudheera-policy-section-title">
                        Delivery Within India
                    </h5>

                    <ul class="sudheera-policy-list">

                        <li>
                            Estimated delivery time is generally
                            3–7 business days depending on the
                            delivery location.
                        </li>

                        <li>
                            Delivery timelines may vary for remote
                            and difficult-to-reach locations.
                        </li>

                        <li>
                            Orders are shipped through trusted
                            courier and logistics partners.
                        </li>

                    </ul>

                    <div class="sudheera-policy-highlight">

                        <p>
                            <strong>Please Note:</strong>
                            Delivery timelines are estimates and may
                            occasionally be affected by courier delays,
                            weather conditions, holidays or other
                            circumstances beyond our control.
                        </p>

                    </div>

                </div>


                <!-- ================= INTERNATIONAL ================= -->

                <div class="sudheera-policy-item">

                    <h5 class="sudheera-policy-section-title">
                        International Orders
                    </h5>

                    <ul class="sudheera-policy-list">

                        <li>
                            International delivery generally takes
                            approximately 10–15 business days,
                            depending on the destination country.
                        </li>

                        <li>
                            International shipping charges will be
                            calculated at checkout.
                        </li>

                        <li>
                            Any customs duties, VAT, import taxes or
                            other local charges are the responsibility
                            of the customer.
                        </li>

                        <li>
                            Delivery times may vary depending on
                            customs clearance and local courier services.
                        </li>

                    </ul>

                </div>


                <!-- ================= BULK ORDERS ================= -->

                <div class="sudheera-policy-item">

                    <h5 class="sudheera-policy-section-title">
                        Bulk & Wholesale Orders
                    </h5>

                    <p class="sudheera-policy-text">
                        For bulk purchases, corporate gifting,
                        wholesale or dealership enquiries, please
                        contact our sales team.
                    </p>

                    <ul class="sudheera-policy-list">

                        <li>
                            Special pricing may be available for
                            eligible bulk orders.
                        </li>

                        <li>
                            Full payment may be required before
                            processing the order.
                        </li>

                        <li>
                            Bulk orders may require additional
                            processing time depending on quantity
                            and availability.
                        </li>

                    </ul>

                    <div class="sudheera-policy-highlight">

                        <p>
                            <strong>Wholesale Enquiries:</strong>
                            Please contact our sales team for
                            pricing, availability and delivery
                            details.
                        </p>

                    </div>

                </div>


                <!-- ================= CANCELLATION ================= -->

                <div class="sudheera-policy-item">

                    <h5 class="sudheera-policy-section-title">
                        Order Changes & Cancellation
                    </h5>

                    <ul class="sudheera-policy-list">

                        <li>
                            Once an order is confirmed, shipping
                            address and order details may not be
                            changeable.
                        </li>

                        <li>
                            Orders cannot be cancelled once they
                            have been shipped.
                        </li>

                        <li>
                            Cancellation requests received before
                            dispatch may be considered at our
                            discretion.
                        </li>

                        <li>
                            Please contact customer support as soon
                            as possible if you need assistance with
                            your order.
                        </li>

                    </ul>

                </div>


                <!-- ================= DELIVERY ISSUES ================= -->

                <div class="sudheera-policy-item">

                    <h5 class="sudheera-policy-section-title">
                        Delivery Issues
                    </h5>

                    <ul class="sudheera-policy-list">

                        <li>
                            If your package arrives damaged,
                            incomplete or incorrect, please contact
                            us within 48 hours of delivery.
                        </li>

                        <li>
                            Please retain the original packaging
                            until the issue has been resolved.
                        </li>

                        <li>
                            We strongly recommend recording an
                            unboxing video when opening your package.
                        </li>

                        <li>
                            Photos and videos may be requested to
                            help us investigate and resolve the issue.
                        </li>

                    </ul>

                </div>


                <!-- ================= CONTACT ================= -->

                <div class="sudheera-policy-contact">

                    <div class="sudheera-policy-contact-content">

                        <h5>
                            Need Help With Your Order?
                        </h5>

                        <p>
                            Our customer support team is happy to
                            assist you with shipping, delivery and
                            order-related enquiries.
                            <br><br>

                            Email:
                            <a href="mailto:care@sudheera.com">
                                care@sudheera.com
                            </a>

                            <br>

                            Phone:
                            <a href="tel:+919962013399">
                                +91-99620 13399
                            </a>
                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>

</div>

@endsection