@extends('layouts.website')
@section('content')

<style>
    /* =========================================================
       SUDHEERA SAREES
       PRIVACY POLICY
    ========================================================= */

    .sudheera-privacy-page {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* ================= BREADCRUMB ================= */

    .sudheera-privacy-breadcrumb {
        padding-bottom: 10px;
    }

    .sudheera-privacy-breadcrumb .breadcrumb-content {
        padding-top: 50px;
    }

    .sudheera-privacy-breadcrumb .breadcrumb-list {
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 0;
        margin-left: 20px;
    }

    .sudheera-privacy-breadcrumb .breadcrumb-list li {
        font-size: 14px;
        color: #806b70;
    }

    .sudheera-privacy-breadcrumb .breadcrumb-list a {
        color: #30000e;
        text-decoration: none;
        font-weight: 600;
        transition: .3s ease;
    }

    .sudheera-privacy-breadcrumb .breadcrumb-list a:hover {
        color: #c88618;
    }

    .sudheera-privacy-separator {
        margin: 0 10px;
        color: #c88618;
        font-weight: 700;
    }


    /* =========================================================
       MAIN CONTENT
    ========================================================= */

    .sudheera-privacy-content {
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

    .sudheera-privacy-header {
        text-align: center;
        margin-bottom: 42px;
    }

    .sudheera-privacy-label {
        display: inline-block;
        color: #c88618;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .sudheera-privacy-title {
        margin: 0 0 14px;
        color: #30000e;
        font-size: 40px;
        line-height: 1.2;
        font-weight: 600;
    }

    .sudheera-privacy-intro {
        max-width: 720px;
        margin: 0 auto;
        color: #76666a;
        font-size: 16px;
        line-height: 1.8;
    }

    .sudheera-privacy-divider {
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
       POLICY ITEMS
    ========================================================= */

    .sudheera-privacy-item {
        padding: 28px 0;
        border-bottom: 1px solid #eee5df;
    }

    .sudheera-privacy-item:first-of-type {
        padding-top: 0;
    }

    .sudheera-privacy-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }


    /* =========================================================
       SECTION TITLE
    ========================================================= */

    .sudheera-privacy-section-title {
        display: flex;
        align-items: center;
        gap: 13px;
        color: #30000e;
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .sudheera-privacy-section-title::before {
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

    .sudheera-privacy-text {
        font-size: 15px;
        line-height: 1.85;
        color: #5e5255;
        margin: 0;
    }

    .sudheera-privacy-text strong {
        color: #3b111c;
        font-weight: 700;
    }


    /* =========================================================
       LIST
    ========================================================= */

    .sudheera-privacy-list {
        margin: 10px 0 0;
        padding-left: 25px;
    }

    .sudheera-privacy-list li {
        font-size: 15px;
        line-height: 1.85;
        color: #5e5255;
        margin-bottom: 8px;
        padding-left: 5px;
    }

    .sudheera-privacy-list li::marker {
        color: #c88618;
        font-size: 14px;
    }


    /* =========================================================
       INTRO HIGHLIGHT
    ========================================================= */

    .sudheera-privacy-highlight {
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

    .sudheera-privacy-highlight p {
        margin: 0;
        font-size: 14px;
        line-height: 1.8;
        color: #5c4b4f;
    }

    .sudheera-privacy-highlight strong {
        color: #30000e;
    }


    /* =========================================================
       PRIVACY CONTACT BOX
    ========================================================= */

    .sudheera-privacy-contact {
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

    .sudheera-privacy-contact::before {
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .05);
        right: -90px;
        top: -100px;
    }

    .sudheera-privacy-contact::after {
        content: '';
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(200, 134, 24, .08);
        left: -50px;
        bottom: -50px;
    }

    .sudheera-privacy-contact-content {
        position: relative;
        z-index: 2;
    }

    .sudheera-privacy-contact h5 {
        margin: 0 0 10px;
        color: #e5c27b;
        font-size: 19px;
        font-weight: 700;
    }

    .sudheera-privacy-contact p {
        margin: 0;
        color: rgba(255, 255, 255, .88);
        font-size: 14px;
        line-height: 1.85;
    }

    .sudheera-privacy-contact a {
        color: #e5c27b;
        font-weight: 600;
        text-decoration: none;
    }

    .sudheera-privacy-contact a:hover {
        color: #fff;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767px) {

        .sudheera-privacy-breadcrumb .breadcrumb-content {
            padding-top: 30px;
        }

        .sudheera-privacy-breadcrumb .breadcrumb-list li {
            font-size: 13px;
        }

        .sudheera-privacy-separator {
            margin: 0 7px;
        }

        .sudheera-privacy-content {
            padding: 30px 20px;
            border-radius: 22px;
        }

        .sudheera-privacy-header {
            margin-bottom: 30px;
        }

        .sudheera-privacy-label {
            font-size: 11px;
            letter-spacing: 2px;
        }

        .sudheera-privacy-title {
            font-size: 29px;
        }

        .sudheera-privacy-intro {
            font-size: 14px;
            line-height: 1.75;
        }

        .sudheera-privacy-item {
            padding: 23px 0;
        }

        .sudheera-privacy-section-title {
            font-size: 17px;
            gap: 10px;
        }

        .sudheera-privacy-section-title::before {
            width: 4px;
            height: 21px;
        }

        .sudheera-privacy-text,
        .sudheera-privacy-list li {
            font-size: 14px;
            line-height: 1.8;
        }

        .sudheera-privacy-list {
            padding-left: 21px;
        }

        .sudheera-privacy-highlight {
            padding: 15px 16px;
        }

        .sudheera-privacy-contact {
            padding: 21px;
            border-radius: 18px;
        }
    }
</style>


<!-- =========================================================
     BREADCRUMB
========================================================= -->

<section class="page-breadcrumb sudheera-privacy-breadcrumb">

    <div class="container">

        <div class="breadcrumb-content">

            <ul class="breadcrumb-list">

                <li>
                    <a href="/">
                        Home
                    </a>
                </li>

                <li>
                    <span class="sudheera-privacy-separator">
                        /
                    </span>
                </li>

                <li>
                    Privacy Policy
                </li>

            </ul>

        </div>

    </div>

</section>


<!-- =========================================================
     PRIVACY POLICY
========================================================= -->

<div class="section-term-user flat-spacing">

    <div class="container">

        <div class="sudheera-privacy-page">

            <div class="sudheera-privacy-content">


                <!-- ================= HEADER ================= -->

                <div class="sudheera-privacy-header">

                    <span class="sudheera-privacy-label">
                        Sudheera Sarees
                    </span>

                    <h1 class="sudheera-privacy-title font-instrument_serif">
                        Privacy Policy
                    </h1>

                    <p class="sudheera-privacy-intro">
                        At Sudheera Sarees, we value your privacy and
                        are committed to protecting your personal
                        information and providing you with a safe
                        shopping experience.
                    </p>

                    <div class="sudheera-privacy-divider"></div>

                </div>


                <!-- =================================================
                     INFORMATION WE COLLECT
                ================================================== -->

                <div class="sudheera-privacy-item">

                    <h5 class="sudheera-privacy-section-title">
                        Information We Collect
                    </h5>

                    <p class="sudheera-privacy-text">
                        When you visit our website, create an account,
                        place an order or interact with our services,
                        we may collect information necessary to provide
                        our services.
                    </p>

                    <ul class="sudheera-privacy-list">

                        <li>
                            Name
                        </li>

                        <li>
                            Email address
                        </li>

                        <li>
                            Mobile number
                        </li>

                        <li>
                            Shipping and billing address
                        </li>

                        <li>
                            PIN / ZIP code
                        </li>

                        <li>
                            Order and purchase history
                        </li>

                        <li>
                            Website usage information such as pages
                            visited, clicks and interactions
                        </li>

                        <li>
                            Product reviews, photographs or other
                            content submitted with your consent
                        </li>

                    </ul>

                </div>


                <!-- =================================================
                     HOW WE USE
                ================================================== -->

                <div class="sudheera-privacy-item">

                    <h5 class="sudheera-privacy-section-title">
                        How We Use Your Information
                    </h5>

                    <ul class="sudheera-privacy-list">

                        <li>
                            Process, confirm and deliver your orders
                        </li>

                        <li>
                            Provide customer support and assistance
                        </li>

                        <li>
                            Manage your account and shopping experience
                        </li>

                        <li>
                            Send order confirmations, shipping updates
                            and other service-related communications
                        </li>

                        <li>
                            Send promotional offers and updates where
                            you have provided the appropriate consent
                        </li>

                        <li>
                            Improve our products, services and website
                        </li>

                        <li>
                            Detect, prevent and investigate fraudulent
                            or unauthorized activities
                        </li>

                    </ul>

                </div>


                <!-- =================================================
                     SHARING INFORMATION
                ================================================== -->

                <div class="sudheera-privacy-item">

                    <h5 class="sudheera-privacy-section-title">
                        Sharing Your Information
                    </h5>

                    <p class="sudheera-privacy-text">

                        We do not sell or rent your personal information.
                        We may share necessary information only in
                        circumstances such as:

                    </p>

                    <ul class="sudheera-privacy-list">

                        <li>
                            With trusted payment, courier and logistics
                            service providers to complete your order
                        </li>

                        <li>
                            With technology or service providers who
                            assist us in operating our website
                        </li>

                        <li>
                            When required by applicable law or legal
                            authorities
                        </li>

                        <li>
                            To prevent fraud, misuse or protect our
                            legal rights
                        </li>

                    </ul>

                    <div class="sudheera-privacy-highlight">

                        <p>
                            <strong>Your privacy matters:</strong>
                            We take reasonable measures to protect your
                            personal information and use it only for
                            legitimate business and service purposes.
                        </p>

                    </div>

                </div>


                <!-- =================================================
                     COOKIES
                ================================================== -->

                <div class="sudheera-privacy-item">

                    <h5 class="sudheera-privacy-section-title">
                        Cookies
                    </h5>

                    <p class="sudheera-privacy-text">

                        Our website may use cookies and similar
                        technologies to improve your browsing experience,
                        remember preferences and understand website
                        traffic.

                        <br><br>

                        You can manage or disable cookies through
                        your browser settings. Please note that some
                        website features may not function properly
                        when cookies are disabled.

                    </p>

                </div>


                <!-- =================================================
                     THIRD PARTY
                ================================================== -->

                <div class="sudheera-privacy-item">

                    <h5 class="sudheera-privacy-section-title">
                        Third-Party Websites
                    </h5>

                    <p class="sudheera-privacy-text">

                        Our website may contain links to third-party
                        websites, payment providers or social media
                        platforms.

                        <br><br>

                        These external websites operate under their own
                        privacy policies. Sudheera Sarees is not
                        responsible for the privacy practices or content
                        of third-party websites.

                    </p>

                </div>


                <!-- =================================================
                     YOUR CHOICES
                ================================================== -->

                <div class="sudheera-privacy-item">

                    <h5 class="sudheera-privacy-section-title">
                        Your Choices
                    </h5>

                    <ul class="sudheera-privacy-list">

                        <li>
                            You may update or correct your account
                            information where applicable.
                        </li>

                        <li>
                            You may unsubscribe from promotional emails
                            at any time.
                        </li>

                        <li>
                            You may manage cookies through your browser
                            settings.
                        </li>

                        <li>
                            Service-related communications, such as
                            order confirmations and delivery updates,
                            may still be sent when necessary.
                        </li>

                    </ul>

                </div>


                <!-- =================================================
                     POLICY UPDATES
                ================================================== -->

                <div class="sudheera-privacy-item">

                    <h5 class="sudheera-privacy-section-title">
                        Policy Updates
                    </h5>

                    <p class="sudheera-privacy-text">

                        We may update this Privacy Policy from time
                        to time to reflect changes to our practices,
                        services or applicable requirements.

                        <br><br>

                        Any updates will be posted on this page and
                        will become effective from the date of posting.

                    </p>

                </div>


                <!-- =================================================
                     CONTACT
                ================================================== -->

                <div class="sudheera-privacy-contact">

                    <div class="sudheera-privacy-contact-content">

                        <h5>
                            Privacy Questions?
                        </h5>

                        <p>

                            If you have any questions or concerns about
                            this Privacy Policy or how your information
                            is handled, please contact us.

                            <br><br>

                            <strong>Email:</strong>
                            <a href="mailto:care@sudheerasares.com">
                                care@sudheerasares.com
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