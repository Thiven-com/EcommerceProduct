@extends('layouts.website')
@section('content')

    <style>
        /* =========================================================
           SUDHEERA SAREES - PREMIUM CONTACT PAGE
        ========================================================= */

        .sudheera-contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 32px;
            align-items: start;
            margin-left: 20px;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        /* ================= LEFT PANEL ================= */

        .sudheera-contact-left {
            background: linear-gradient(135deg,
                    #30000e 0%,
                    #5b0018 35%,
                    #7a2d19 70%,
                    #9b4a28 100%);
            color: #fff;
            border-radius: 32px;
            padding: 42px 36px;
            position: sticky;
            top: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(48, 0, 14, .18);
        }

        .sudheera-contact-left::before {
            content: '';
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(216, 173, 86, .10);
            top: -100px;
            right: -90px;
        }

        .sudheera-contact-left::after {
            content: '';
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .05);
            bottom: -70px;
            left: -60px;
        }

        .sudheera-contact-content {
            position: relative;
            z-index: 2;
        }

        .sudheera-contact-tag {
            font-size: 13px;
            letter-spacing: 3px;
            font-weight: 700;
            text-transform: uppercase;
            color: #e5c27b;
            margin-bottom: 14px;
        }

        .sudheera-contact-title {
            font-size: 43px;
            line-height: 1.2;
            font-weight: 700;
            margin-bottom: 20px;
            color: #fff;
        }

        .sudheera-contact-text {
            font-size: 16px;
            line-height: 1.85;
            color: rgba(255, 255, 255, .88);
            margin-bottom: 34px;
        }

        /* ================= BRAND BOX ================= */

        .sudheera-brand-box {
            display: flex;
            align-items: center;
            gap: 16px;
            background: rgba(255, 255, 255, .09);
            border: 1px solid rgba(229, 194, 123, .28);
            border-radius: 24px;
            padding: 20px;
            backdrop-filter: blur(12px);
        }

        .sudheera-brand-icon {
            width: 66px;
            height: 66px;
            min-width: 66px;
            border-radius: 18px;
            background: linear-gradient(135deg,
                    #c88618,
                    #e4bd68);
            color: #30000e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 10px 25px rgba(200, 134, 24, .25);
        }

        .sudheera-brand-box h5 {
            margin: 0 0 5px;
            color: #fff;
            font-size: 19px;
            font-weight: 700;
        }

        .sudheera-brand-box p {
            margin: 0 0 5px;
            font-size: 14px;
            color: rgba(255, 255, 255, .82);
        }

        .sudheera-brand-box span {
            font-size: 13px;
            font-weight: 600;
            color: #e5c27b;
        }

        /* ================= RIGHT SIDE ================= */

        .sudheera-contact-right {
            display: grid;
            gap: 18px;
        }

        .sudheera-contact-card {
            background: #fff;
            border: 1px solid #eee1d8;
            border-radius: 26px;
            padding: 25px;
            display: flex;
            gap: 18px;
            align-items: flex-start;
            box-shadow: 0 12px 32px rgba(48, 0, 14, .05);
            transition: all .35s ease;
        }

        .sudheera-contact-card:hover {
            transform: translateY(-6px);
            border-color: #d9b36a;
            box-shadow: 0 20px 42px rgba(48, 0, 14, .10);
        }

        /* ================= ICON ================= */

        .sudheera-card-icon {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 18px;
            background: linear-gradient(135deg,
                    #30000e,
                    #7a2d19);
            color: #e5c27b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            box-shadow: 0 10px 24px rgba(48, 0, 14, .16);
        }

        .sudheera-contact-card h5 {
            margin: 0 0 10px;
            font-size: 19px;
            font-weight: 700;
            color: #351019;
        }

        .sudheera-contact-card p {
            margin: 0;
            font-size: 15px;
            line-height: 1.8;
            color: #67585a;
        }

        .sudheera-contact-card strong {
            color: #3b111c;
        }

        .sudheera-contact-card a {
            color: #76001f;
            text-decoration: none;
            font-weight: 600;
            transition: .3s ease;
        }

        .sudheera-contact-card a:hover {
            color: #c88618;
        }

        /* ================= SOCIAL BUTTONS ================= */

        .sudheera-social-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

        .sudheera-social-buttons a {
            padding: 10px 17px;
            border-radius: 999px;
            background: #fbf5ef;
            border: 1px solid #ead8c9;
            color: #5c1725;
            font-size: 14px;
            font-weight: 600;
            transition: all .3s ease;
            text-decoration: none;
        }

        .sudheera-social-buttons a:hover {
            background: #30000e;
            border-color: #30000e;
            color: #e5c27b;
            transform: translateY(-2px);
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 991px) {

            .sudheera-contact-wrapper {
                grid-template-columns: 1fr;
            }

            .sudheera-contact-left {
                position: relative;
                top: auto;
            }
        }

        @media (max-width: 767px) {

            .sudheera-contact-left {
                padding: 32px 24px;
                border-radius: 26px;
            }

            .sudheera-contact-title {
                font-size: 32px;
            }

            .sudheera-contact-text {
                font-size: 15px;
                line-height: 1.75;
            }

            .sudheera-brand-box {
                padding: 16px;
                border-radius: 20px;
            }

            .sudheera-brand-icon {
                width: 56px;
                height: 56px;
                min-width: 56px;
                font-size: 24px;
            }

            .sudheera-brand-box h5 {
                font-size: 16px;
            }

            .sudheera-brand-box p {
                font-size: 13px;
            }

            .sudheera-contact-card {
                padding: 20px;
                border-radius: 22px;
                gap: 14px;
            }

            .sudheera-card-icon {
                width: 52px;
                height: 52px;
                min-width: 52px;
                border-radius: 16px;
                font-size: 22px;
            }

            .sudheera-contact-card h5 {
                font-size: 17px;
            }

            .sudheera-contact-card p {
                font-size: 14px;
            }

            .sudheera-social-buttons a {
                padding: 9px 14px;
                font-size: 13px;
            }
        }
        .breadcrumb-list {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.breadcrumb-list li {
    display: flex;
    align-items: center;
    font-size: 14px;
    font-weight: 500;
    color: #6f5a5f;
}

.breadcrumb-list li a {
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    color: #30000e;
    transition: all 0.3s ease;
}

.breadcrumb-list li a:hover {
    color: #c88618;
}

.breadcrumb-list li span {
    color: #c88618;
    font-weight: 600;
}

.breadcrumb-list li:last-child {
    color: #8a6870;
    font-weight: 600;
}

/* Mobile */
@media (max-width: 767px) {
    .breadcrumb-list {
        padding-left: 0;
    }

    .breadcrumb-list li {
        font-size: 13px;
    }

    .breadcrumb-list li span {
        margin: 0 6px !important;
    }
}
    </style>


    <!-- =========================================================
         BREADCRUMB
    ========================================================= -->

    <section class="page-breadcrumb" style="padding-bottom: 10px;">
        <div class="container">

            <div class="breadcrumb-content" style="padding-top: 50px; margin-left: 20px;">

                <ul class="breadcrumb-list">
                    <li>
                        <a href="/">
                            Home
                            <span style="margin:0 8px;"> / </span>
                            Contact
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </section>


    <!-- =========================================================
         CONTACT SECTION
    ========================================================= -->

    <div class="section-contact-infor flat-spacing">

        <div class="container">

            <div class="sudheera-contact-wrapper">


                <!-- ================= LEFT SIDE ================= -->

                <div class="sudheera-contact-left">

                    <div class="sudheera-contact-content">

                        <p class="sudheera-contact-tag">
                            SUDHEERA SAREES
                        </p>

                        <h2 class="sudheera-contact-title">
                            We'd Love to Hear From You
                        </h2>

                        <p class="sudheera-contact-text">
                            Whether you're looking for the perfect saree,
                            need assistance with your order, have a question
                            about our collections, or want to explore
                            business opportunities, our team is always
                            happy to help.
                        </p>


                        <!-- Brand -->

                        <div class="sudheera-brand-box">

                            <div class="sudheera-brand-icon">
                                🪷
                            </div>

                            <div>

                                <h5>
                                    Sudheera Sarees
                                </h5>

                                <p>
                                    Grace in Every Drape
                                </p>

                                <span>
                                    Tradition • Elegance • Grace
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================= RIGHT SIDE ================= -->

                <div class="sudheera-contact-right">


                    <!-- Registered Office -->

                    <div class="sudheera-contact-card">

                        <div class="sudheera-card-icon">
                            📍
                        </div>

                        <div>

                            <h5>
                                Our Store
                            </h5>

                            <p>
                                <strong>Sudheera Sarees</strong><br>
                                Visit our store to explore our
                                latest saree collections, traditional
                                weaves and elegant designs.
                            </p>

                        </div>

                    </div>


                    <!-- Customer Care -->

                    <div class="sudheera-contact-card">

                        <div class="sudheera-card-icon">
                            📞
                        </div>

                        <div>

                            <h5>
                                Customer Care
                            </h5>

                            <p>
                                We're here to assist you with
                                product enquiries, orders and
                                styling assistance.
                            </p>

                            <p style="margin-top:8px;">
                                <a href="tel:+919962013399">
                                    +91-99620 13399
                                </a>
                            </p>

                        </div>

                    </div>


                    <!-- Email -->

                    <div class="sudheera-contact-card">

                        <div class="sudheera-card-icon">
                            ✉️
                        </div>

                        <div>

                            <h5>
                                Email & Website
                            </h5>

                            <p>

                                <a href="mailto:care@sudheerasares.com">
                                    care@sudheerasares.com
                                </a>

                                <br>

                                <a href="#" target="_blank">
                                    www.sudheerasares.com
                                </a>

                            </p>

                        </div>

                    </div>


                    <!-- Support Hours -->

                    <div class="sudheera-contact-card">

                        <div class="sudheera-card-icon">
                            🕒
                        </div>

                        <div>

                            <h5>
                                Customer Support Hours
                            </h5>

                            <p>

                                <strong>
                                    Monday – Saturday
                                </strong>

                                <br>

                                9:30 AM – 6:30 PM (IST)

                                <br><br>

                                <strong>
                                    Sunday & Public Holidays
                                </strong>

                                <br>

                                Closed

                            </p>

                        </div>

                    </div>


                    <!-- Business -->

                    <div class="sudheera-contact-card">

                        <div class="sudheera-card-icon">
                            💼
                        </div>

                        <div>

                            <h5>
                                Business & Wholesale Enquiries
                            </h5>

                            <p>
                                Interested in becoming a distributor,
                                retailer, reseller or wholesale partner?
                            </p>

                            <p style="margin-top:8px;">

                                <a href="mailto:sales@sudheerasares.com">
                                    sales@sudheerasares.com
                                </a>

                            </p>

                        </div>

                    </div>


                    <!-- Social Media -->

                    <div class="sudheera-contact-card">

                        <div class="sudheera-card-icon">
                            🌐
                        </div>

                        <div>

                            <h5>
                                Follow Us
                            </h5>

                            <p>
                                Stay connected with Sudheera Sarees
                                for new collections, styling inspiration,
                                festive sarees and exclusive offers.
                            </p>


                            <div class="sudheera-social-buttons">

                                <a href="#">
                                    Facebook
                                </a>

                                <a href="#">
                                    Instagram
                                </a>

                                <a href="#">
                                    YouTube
                                </a>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection