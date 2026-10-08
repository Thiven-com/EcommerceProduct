@extends('layouts.website')
@section('content')

<style>
    /* =========================================================
       SUDHEERA SAREES
       CANCELLATION & REFUND POLICY
    ========================================================= */

    .sudheera-refund-page {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* ================= BREADCRUMB ================= */

    .sudheera-refund-breadcrumb {
        padding-bottom: 10px;
    }

    .sudheera-refund-breadcrumb .breadcrumb-content {
        padding-top: 50px;
    }

    .sudheera-refund-breadcrumb .breadcrumb-list {
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 0;
        margin-left: 20px;
    }

    .sudheera-refund-breadcrumb .breadcrumb-list li {
        font-size: 14px;
        color: #806b70;
    }

    .sudheera-refund-breadcrumb .breadcrumb-list a {
        color: #30000e;
        text-decoration: none;
        font-weight: 600;
        transition: .3s ease;
    }

    .sudheera-refund-breadcrumb .breadcrumb-list a:hover {
        color: #c88618;
    }

    .sudheera-refund-separator {
        margin: 0 10px;
        color: #c88618;
        font-weight: 700;
    }


    /* =========================================================
       MAIN POLICY CARD
    ========================================================= */

    .sudheera-refund-content {
        max-width: 1050px;
        margin: 0 auto;
        background: #fff;
        /* border: 1px solid #eee2d8; */
        /* border-radius: 30px; */
        padding: 48px 52px;
        /* box-shadow: 0 15px 45px rgba(48, 0, 14, .06); */
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .sudheera-refund-header {
        text-align: center;
        margin-bottom: 42px;
    }

    .sudheera-refund-label {
        display: inline-block;
        color: #c88618;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .sudheera-refund-title {
        margin: 0 0 14px;
        color: #30000e;
        font-size: 40px;
        line-height: 1.2;
        font-weight: 600;
    }

    .sudheera-refund-subtitle {
        max-width: 700px;
        margin: 0 auto;
        color: #76666a;
        font-size: 16px;
        line-height: 1.8;
    }

    .sudheera-refund-divider {
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


    /* =========================================================
       POLICY ITEM
    ========================================================= */

    .sudheera-refund-item {
        padding: 28px 0;
        border-bottom: 1px solid #eee5df;
    }

    .sudheera-refund-item:first-of-type {
        padding-top: 0;
    }

    .sudheera-refund-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }


    /* =========================================================
       SECTION TITLE
    ========================================================= */

    .sudheera-refund-section-title {
        display: flex;
        align-items: center;
        gap: 13px;
        color: #30000e;
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .sudheera-refund-section-title::before {
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


    /* =========================================================
       TEXT
    ========================================================= */

    .sudheera-refund-text {
        font-size: 15px;
        line-height: 1.85;
        color: #5e5255;
        margin: 0;
    }

    .sudheera-refund-text strong {
        color: #3b111c;
        font-weight: 700;
    }


    /* =========================================================
       LIST
    ========================================================= */

    .sudheera-refund-list {
        margin: 10px 0 0;
        padding-left: 25px;
    }

    .sudheera-refund-list li {
        font-size: 15px;
        line-height: 1.85;
        color: #5e5255;
        margin-bottom: 8px;
        padding-left: 5px;
    }

    .sudheera-refund-list li::marker {
        color: #c88618;
        font-size: 14px;
    }


    /* =========================================================
       IMPORTANT NOTE
    ========================================================= */

    .sudheera-refund-note {
        margin-top: 16px;
        padding: 18px 20px;
        background: linear-gradient(
            135deg,
            #fffaf4,
            #fbf1e7
        );
        border-left: 4px solid #c88618;
        border-radius: 12px;
    }

    .sudheera-refund-note p {
        margin: 0;
        font-size: 14px;
        line-height: 1.75;
        color: #5c4b4f;
    }

    .sudheera-refund-note strong {
        color: #30000e;
    }


    /* =========================================================
       CONTACT BOX
    ========================================================= */

    .sudheera-refund-contact {
        margin-top: 34px;
        padding: 28px;
        border-radius: 22px;
        background: linear-gradient(
            135deg,
            #30000e 0%,
            #65001b 45%,
            #8a4023 100%
        );
        position: relative;
        overflow: hidden;
    }

    .sudheera-refund-contact::before {
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .05);
        right: -90px;
        top: -100px;
    }

    .sudheera-refund-contact::after {
        content: '';
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(200, 134, 24, .08);
        left: -50px;
        bottom: -50px;
    }

    .sudheera-refund-contact-content {
        position: relative;
        z-index: 2;
    }

    .sudheera-refund-contact h5 {
        margin: 0 0 10px;
        color: #e5c27b;
        font-size: 19px;
        font-weight: 700;
    }

    .sudheera-refund-contact p {
        margin: 0;
        color: rgba(255, 255, 255, .88);
        font-size: 14px;
        line-height: 1.85;
    }

    .sudheera-refund-contact a {
        color: #e5c27b;
        font-weight: 600;
        text-decoration: none;
    }

    .sudheera-refund-contact a:hover {
        color: #fff;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767px) {

        .sudheera-refund-breadcrumb .breadcrumb-content {
            padding-top: 30px;
        }

        .sudheera-refund-breadcrumb .breadcrumb-list li {
            font-size: 13px;
        }

        .sudheera-refund-separator {
            margin: 0 7px;
        }

        .sudheera-refund-content {
            padding: 30px 20px;
            border-radius: 22px;
        }

        .sudheera-refund-header {
            margin-bottom: 30px;
        }

        .sudheera-refund-label {
            font-size: 11px;
            letter-spacing: 2px;
        }

        .sudheera-refund-title {
            font-size: 29px;
        }

        .sudheera-refund-subtitle {
            font-size: 14px;
            line-height: 1.75;
        }

        .sudheera-refund-item {
            padding: 23px 0;
        }

        .sudheera-refund-section-title {
            font-size: 17px;
            gap: 10px;
        }

        .sudheera-refund-section-title::before {
            width: 4px;
            height: 21px;
        }

        .sudheera-refund-text,
        .sudheera-refund-list li {
            font-size: 14px;
            line-height: 1.8;
        }

        .sudheera-refund-list {
            padding-left: 21px;
        }

        .sudheera-refund-note {
            padding: 15px 16px;
        }

        .sudheera-refund-contact {
            padding: 21px;
            border-radius: 18px;
        }
    }
</style>


<!-- =========================================================
     BREADCRUMB
========================================================= -->

<section class="page-breadcrumb sudheera-refund-breadcrumb">

    <div class="container">

        <div class="breadcrumb-content">

            <ul class="breadcrumb-list">

                <li>
                    <a href="/">
                        Home
                    </a>
                </li>

                <li>
                    <span class="sudheera-refund-separator">
                        /
                    </span>
                </li>

                <li>
                    Cancellation & Refund Policy
                </li>

            </ul>

        </div>

    </div>

</section>


<!-- =========================================================
     CANCELLATION & REFUND
========================================================= -->

<div class="section-term-user flat-spacing">

    <div class="container">

        <div class="sudheera-refund-page">

            <div class="sudheera-refund-content">


                <!-- ================= HEADER ================= -->

                <div class="sudheera-refund-header">

                    <span class="sudheera-refund-label">
                        Sudheera Sarees
                    </span>

                    <h1 class="sudheera-refund-title font-instrument_serif">
                        Cancellation & Refund Policy
                    </h1>

                    <p class="sudheera-refund-subtitle">
                        We want your shopping experience with
                        Sudheera Sarees to be simple, transparent
                        and worry-free.
                    </p>

                    <div class="sudheera-refund-divider"></div>

                </div>


                <!-- =================================================
                     COMMUNICATION & REFUNDS
                ================================================== -->

                <div class="sudheera-refund-item">

                    <h5 class="sudheera-refund-section-title">
                        Communication & Refunds
                    </h5>

                    <ul class="sudheera-refund-list">

                        <li>
                            We will notify you if any part of your
                            order is cancelled or if additional
                            information is required.
                        </li>

                        <li>
                            If we are unable to process your order
                            within the applicable processing period,
                            a refund may be initiated.
                        </li>

                        <li>
                            Refunds will generally be reflected in
                            the original payment account within
                            5–7 working days after initiation,
                            depending on the bank or payment provider.
                        </li>

                        <li>
                            If the refund is not received within the
                            expected period, please contact your bank
                            or payment provider.
                        </li>

                        <li>
                            Products damaged during transit must be
                            reported to our customer support team
                            promptly. Returns will be accepted only
                            after confirmation from our support team.
                        </li>

                        <li>
                            Orders refused at the time of delivery
                            may not be eligible for a refund.
                        </li>

                    </ul>

                </div>


                <!-- =================================================
                     CANCELLATION UNPROCESSED
                ================================================== -->

                <div class="sudheera-refund-item">

                    <h5 class="sudheera-refund-section-title">
                        Cancellation of Unprocessed Orders
                    </h5>

                    <p class="sudheera-refund-text">

                        If a cancellation request is received
                        <strong>within 1 hour</strong> after placing
                        the order and the order has not yet been
                        processed, we will make reasonable efforts
                        to cancel the order.

                        <br><br>

                        If cancellation is successfully completed,
                        the applicable refund will be issued to the
                        original payment method within 7 working days.

                    </p>

                </div>


                <!-- =================================================
                     PAYMENT NOTE
                ================================================== -->

                <div class="sudheera-refund-item">

                    <h5 class="sudheera-refund-section-title">
                        Payment Information
                    </h5>

                    <div class="sudheera-refund-note">

                        <p>
                            <strong>Important:</strong>
                            Please update this section according to
                            your actual payment options. If Sudheera
                            Sarees accepts prepaid orders only, you
                            can state that Cash on Delivery (COD)
                            is unavailable.
                        </p>

                    </div>

                </div>


                <!-- =================================================
                     PROCESSED ORDERS
                ================================================== -->

                <div class="sudheera-refund-item">

                    <h5 class="sudheera-refund-section-title">
                        Cancellation of Processed Orders
                    </h5>

                    <p class="sudheera-refund-text">

                        Once an order has been processed or dispatched,
                        it generally cannot be cancelled.

                        <br><br>

                        In exceptional circumstances, if a cancellation
                        is approved after processing, Sudheera Sarees
                        may provide an appropriate resolution in
                        accordance with the applicable return and
                        refund terms.

                    </p>

                </div>


                <!-- =================================================
                     PRODUCT VARIATIONS
                ================================================== -->

                <div class="sudheera-refund-item">

                    <h5 class="sudheera-refund-section-title">
                        Saree Colour & Product Variations
                    </h5>

                    <ul class="sudheera-refund-list">

                        <li>
                            Saree colours may appear slightly different
                            depending on your screen, monitor or
                            device settings.
                        </li>

                        <li>
                            Handwoven, hand-dyed and traditional
                            sarees may have natural variations in
                            texture, weave, colour and finish.
                        </li>

                        <li>
                            Such natural variations are not considered
                            manufacturing defects.
                        </li>

                        <li>
                            Please review the product description,
                            images and specifications carefully before
                            placing your order.
                        </li>

                    </ul>

                </div>


                <!-- =================================================
                     CANCELLATION BY US
                ================================================== -->

                <div class="sudheera-refund-item">

                    <h5 class="sudheera-refund-section-title">
                        Order Cancellation by Us
                    </h5>

                    <p class="sudheera-refund-text">
                        Sudheera Sarees reserves the right to cancel
                        an order in circumstances including:
                    </p>

                    <ul class="sudheera-refund-list">

                        <li>
                            Product unavailability
                        </li>

                        <li>
                            Pricing or product information errors
                        </li>

                        <li>
                            Payment verification issues
                        </li>

                        <li>
                            Suspected fraudulent activity
                        </li>

                        <li>
                            Other circumstances that prevent us from
                            fulfilling the order
                        </li>

                    </ul>

                    <div class="sudheera-refund-note">

                        <p>
                            <strong>Refund:</strong>
                            If an order is cancelled by us after
                            payment has been received, the applicable
                            amount will be refunded to the original
                            payment method or through another suitable
                            method where necessary.
                        </p>

                    </div>

                </div>


                <!-- =================================================
                     NEED HELP
                ================================================== -->

                <div class="sudheera-refund-contact">

                    <div class="sudheera-refund-contact-content">

                        <h5>
                            Need Help?
                        </h5>

                        <p>

                            For any cancellation, return, refund or
                            order-related queries, please contact our
                            customer support team.

                            <br><br>

                            <strong>Email:</strong>
                            <a href="mailto:care@sudheerasares.com">
                                care@sudheerasares.com
                            </a>

                            <br>

                            <strong>Business Enquiries:</strong>
                            <a href="mailto:sales@sudheerasares.com">
                                sales@sudheerasares.com
                            </a>

                            <br>

                            <strong>Website:</strong>
                            <a href="#">
                                www.sudheerasares.com
                            </a>

                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>

</div>


@endsection