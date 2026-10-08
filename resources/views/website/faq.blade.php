
@extends('layouts.website')

@section('content')

<style>
    /* =========================================================
       SUDHEERA SAREES - FAQ PAGE
    ========================================================= */

    .sudheera-faq-page {
        padding: 10px 0 70px;
    }

    /* ================= BREADCRUMB ================= */

    .sudheera-faq-breadcrumb {
        padding-bottom: 10px;
    }

    .sudheera-faq-breadcrumb .breadcrumb-content {
        padding-top: 50px;
    }

    .sudheera-faq-breadcrumb .breadcrumb-list {
        display: flex;
        align-items: center;
        list-style: none !important;
        padding: 0;
        margin: 0;
        margin-left: 20px;
    }

    .sudheera-faq-breadcrumb .breadcrumb-list li {
        list-style: none !important;
        font-size: 14px;
        color: #7a686b;
    }

    .sudheera-faq-breadcrumb .breadcrumb-list a {
        color: #30000e;
        text-decoration: none;
        font-weight: 600;
        transition: .3s ease;
    }

    .sudheera-faq-breadcrumb .breadcrumb-list a:hover {
        color: #c88618;
    }

    .sudheera-faq-separator {
        margin: 0 10px;
        color: #c88618;
        font-weight: 700;
    }


    /* ================= MAIN WRAPPER ================= */

    .sudheera-faq-center {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .sudheera-faq-wrapper {
        width: 70%;
        max-width: 900px;
        background: #fff;
        /* border: 1px solid #eee2d8; */
        /* border-radius: 30px; */
        padding: 42px 46px;
        /* box-shadow: 0 15px 45px rgba(48, 0, 14, .07); */
    }


    /* ================= HEADING ================= */

    .sudheera-faq-heading {
        text-align: center;
        margin-bottom: 35px;
    }

    .sudheera-faq-eyebrow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        color: #c88618;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .sudheera-faq-eyebrow::before,
    .sudheera-faq-eyebrow::after {
        content: '';
        width: 30px;
        height: 1px;
        background: #c88618;
    }

    .sudheera-faq-heading h1 {
        margin: 0 0 12px;
        color: #30000e;
        font-size: 40px;
        font-weight: 600;
        line-height: 1.2;
        font-family: 'Cormorant Garamond', serif;
    }

    .sudheera-faq-heading p {
        max-width: 600px;
        margin: 0 auto;
        color: #77676b;
        font-size: 15px;
        line-height: 1.8;
    }


    /* ================= FAQ ACCORDION ================= */

    .sudheera-faq-accordion {
        display: flex;
        flex-direction: column;
    }

    .sudheera-faq-item {
        border-bottom: 1px solid #eadfd8;
    }

    .sudheera-faq-item:last-child {
        border-bottom: 0;
    }


    /* ================= QUESTION ================= */

    .sudheera-faq-question {
        width: 100%;
        padding: 20px 0;
        border: 0;
        background: transparent;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;

        cursor: pointer;
        text-align: left;
    }

    .sudheera-faq-question:hover .sudheera-faq-title {
        color: #c88618;
    }

    .sudheera-faq-question-content {
        display: flex;
        align-items: center;
        gap: 16px;
        min-width: 0;
    }

    .sudheera-faq-number {
        min-width: 35px;
        color: #c88618;
        font-size: 18px;
        font-weight: 700;
        line-height: 1;
    }

    .sudheera-faq-title {
        margin: 0;
        color: #30000e;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.45;
        transition: .25s ease;
    }


    /* ================= TOGGLE ================= */

    .sudheera-faq-toggle {
        width: 40px;
        height: 40px;
        min-width: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
        border: 1px solid #ead9c7;
        background: #fffaf5;

        position: relative;
        transition: all .3s ease;
    }

    .sudheera-faq-toggle::before,
    .sudheera-faq-toggle::after {
        content: '';
        position: absolute;
        width: 14px;
        height: 1.5px;
        background: #30000e;
        transition: transform .3s ease;
    }

    .sudheera-faq-toggle::after {
        transform: rotate(90deg);
    }

    .sudheera-faq-question[aria-expanded="true"]
    .sudheera-faq-toggle {
        background: #30000e;
        border-color: #30000e;
    }

    .sudheera-faq-question[aria-expanded="true"]
    .sudheera-faq-toggle::before,
    .sudheera-faq-question[aria-expanded="true"]
    .sudheera-faq-toggle::after {
        background: #fff;
    }

    .sudheera-faq-question[aria-expanded="true"]
    .sudheera-faq-toggle::after {
        transform: rotate(0deg);
    }


    /* ================= ANSWER ================= */

    .sudheera-faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height .4s ease;
    }

    .sudheera-faq-answer.show {
        max-height: 500px;
    }

    .sudheera-faq-answer-inner {
        padding: 0 55px 24px 51px;
    }

    .sudheera-faq-answer-inner p {
        margin: 0;
        color: #625559;
        font-size: 15px;
        line-height: 1.85;
    }


    /* ================= HIGHLIGHT ================= */

    .sudheera-faq-highlight {
        margin-top: 15px;
        padding: 16px 18px;
        border-left: 3px solid #c88618;
        background: #fffaf4;
        border-radius: 8px;
    }

    .sudheera-faq-highlight p {
        color: #5c4b4f;
        font-size: 14px;
        line-height: 1.75;
    }


    /* ================= BOTTOM NOTE ================= */

    .sudheera-faq-note {
        margin-top: 35px;
        padding: 24px;
        border-radius: 20px;

        background: linear-gradient(
            135deg,
            #30000e 0%,
            #65001b 50%,
            #8a4023 100%
        );

        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .sudheera-faq-note::before {
        content: '';
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(200, 134, 24, .08);
        right: -60px;
        top: -70px;
    }

    .sudheera-faq-note h5 {
        position: relative;
        z-index: 2;
        margin: 0 0 7px;
        color: #e5c27b;
        font-size: 18px;
        font-weight: 700;
    }

    .sudheera-faq-note p {
        position: relative;
        z-index: 2;
        margin: 0;
        color: rgba(255,255,255,.88);
        font-size: 14px;
        line-height: 1.7;
    }


    /* ================= TABLET ================= */

    @media (max-width: 991px) {

        .sudheera-faq-wrapper {
            width: 85%;
            padding: 32px 30px;
        }

        .sudheera-faq-heading h1 {
            font-size: 34px;
        }

        .sudheera-faq-title {
            font-size: 17px;
        }

        .sudheera-faq-answer-inner {
            padding-left: 51px;
        }
    }


    /* ================= MOBILE ================= */

    @media (max-width: 576px) {

        .sudheera-faq-page {
            padding-bottom: 40px;
        }

        .sudheera-faq-breadcrumb .breadcrumb-content {
            padding-top: 30px;
        }

        .sudheera-faq-breadcrumb .breadcrumb-list li {
            font-size: 13px;
        }

        .sudheera-faq-separator {
            margin: 0 7px;
        }

        .sudheera-faq-wrapper {
            width: 100%;
            padding: 25px 18px;
            border-radius: 22px;
        }

        .sudheera-faq-heading {
            margin-bottom: 25px;
        }

        .sudheera-faq-eyebrow {
            font-size: 10px;
            letter-spacing: 1.8px;
            gap: 7px;
        }

        .sudheera-faq-eyebrow::before,
        .sudheera-faq-eyebrow::after {
            width: 20px;
        }

        .sudheera-faq-heading h1 {
            font-size: 28px;
        }

        .sudheera-faq-heading p {
            font-size: 13px;
        }

        .sudheera-faq-question {
            padding: 17px 0;
            gap: 10px;
        }

        .sudheera-faq-question-content {
            gap: 10px;
        }

        .sudheera-faq-number {
            min-width: 27px;
            font-size: 16px;
        }

        .sudheera-faq-title {
            font-size: 15px;
            line-height: 1.45;
        }

        .sudheera-faq-toggle {
            width: 34px;
            height: 34px;
            min-width: 34px;
        }

        .sudheera-faq-toggle::before,
        .sudheera-faq-toggle::after {
            width: 12px;
        }

        .sudheera-faq-answer-inner {
            padding: 0 0 20px 37px;
        }

        .sudheera-faq-answer-inner p {
            font-size: 14px;
            line-height: 1.8;
        }

        .sudheera-faq-note {
            padding: 20px 16px;
            border-radius: 16px;
        }
    }
</style>


<!-- =========================================================
     BREADCRUMB
========================================================= -->

<section class="page-breadcrumb sudheera-faq-breadcrumb">

    <div class="container">

        <div class="breadcrumb-content">

            <ul class="breadcrumb-list">

                <li>
                    <a href="/">
                        Home
                    </a>
                </li>

                <li>
                    <span class="sudheera-faq-separator">/</span>
                </li>

                <li>
                    FAQs
                </li>

            </ul>

        </div>

    </div>

</section>


<!-- =========================================================
     FAQ PAGE
========================================================= -->

<div class="sudheera-faq-page">

    <div class="container">

        <div class="sudheera-faq-center">

            <div class="sudheera-faq-wrapper">


                <!-- ================= HEADING ================= -->

                <div class="sudheera-faq-heading">

                    <div class="sudheera-faq-eyebrow">
                        Sudheera Sarees
                    </div>

                    <h1>
                        Frequently Asked Questions
                    </h1>

                    <p>
                        Everything you need to know about our sarees,
                        orders, shipping, payments and returns.
                    </p>

                </div>


                <!-- ================= FAQ ================= -->

                <div class="sudheera-faq-accordion">


                    <!-- FAQ 1 -->

                    <div class="sudheera-faq-item">

                        <button
                            type="button"
                            class="sudheera-faq-question"
                            aria-expanded="true"
                            onclick="toggleSudheeraFaq(this)"
                        >

                            <div class="sudheera-faq-question-content">

                                <span class="sudheera-faq-number">
                                    01
                                </span>

                                <h3 class="sudheera-faq-title">
                                    How can I place an order?
                                </h3>

                            </div>

                            <span class="sudheera-faq-toggle"></span>

                        </button>

                        <div class="sudheera-faq-answer show">

                            <div class="sudheera-faq-answer-inner">

                                <p>
                                    You can browse our saree collection,
                                    select your preferred product and
                                    add it to your cart. Proceed to
                                    checkout, enter your delivery
                                    details and complete the payment
                                    to place your order.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- FAQ 2 -->

                    <div class="sudheera-faq-item">

                        <button
                            type="button"
                            class="sudheera-faq-question"
                            aria-expanded="false"
                            onclick="toggleSudheeraFaq(this)"
                        >

                            <div class="sudheera-faq-question-content">

                                <span class="sudheera-faq-number">
                                    02
                                </span>

                                <h3 class="sudheera-faq-title">
                                    Are the saree colours exactly as shown in the images?
                                </h3>

                            </div>

                            <span class="sudheera-faq-toggle"></span>

                        </button>

                        <div class="sudheera-faq-answer">

                            <div class="sudheera-faq-answer-inner">

                                <p>
                                    We make every effort to display
                                    product colours accurately.
                                    However, colours may appear slightly
                                    different depending on your screen,
                                    display settings and lighting.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- FAQ 3 -->

                    <div class="sudheera-faq-item">

                        <button
                            type="button"
                            class="sudheera-faq-question"
                            aria-expanded="false"
                            onclick="toggleSudheeraFaq(this)"
                        >

                            <div class="sudheera-faq-question-content">

                                <span class="sudheera-faq-number">
                                    03
                                </span>

                                <h3 class="sudheera-faq-title">
                                    How long does delivery take?
                                </h3>

                            </div>

                            <span class="sudheera-faq-toggle"></span>

                        </button>

                        <div class="sudheera-faq-answer">

                            <div class="sudheera-faq-answer-inner">

                                <p>
                                    Delivery time depends on your
                                    location and the shipping method
                                    selected. The estimated delivery
                                    date will be displayed during the
                                    checkout process or communicated
                                    after your order is confirmed.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- FAQ 4 -->

                    <div class="sudheera-faq-item">

                        <button
                            type="button"
                            class="sudheera-faq-question"
                            aria-expanded="false"
                            onclick="toggleSudheeraFaq(this)"
                        >

                            <div class="sudheera-faq-question-content">

                                <span class="sudheera-faq-number">
                                    04
                                </span>

                                <h3 class="sudheera-faq-title">
                                    Can I cancel my order?
                                </h3>

                            </div>

                            <span class="sudheera-faq-toggle"></span>

                        </button>

                        <div class="sudheera-faq-answer">

                            <div class="sudheera-faq-answer-inner">

                                <p>
                                    Cancellation may be possible if
                                    your order has not yet been
                                    processed or shipped. Please contact
                                    our customer support team as soon
                                    as possible with your order details.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- FAQ 5 -->

                    <div class="sudheera-faq-item">

                        <button
                            type="button"
                            class="sudheera-faq-question"
                            aria-expanded="false"
                            onclick="toggleSudheeraFaq(this)"
                        >

                            <div class="sudheera-faq-question-content">

                                <span class="sudheera-faq-number">
                                    05
                                </span>

                                <h3 class="sudheera-faq-title">
                                    What if I receive a damaged product?
                                </h3>

                            </div>

                            <span class="sudheera-faq-toggle"></span>

                        </button>

                        <div class="sudheera-faq-answer">

                            <div class="sudheera-faq-answer-inner">

                                <p>
                                    If your parcel arrives damaged or
                                    you receive an incorrect product,
                                    please contact us as soon as
                                    possible. Keep the original
                                    packaging and product safely until
                                    our support team reviews your
                                    request.
                                </p>

                                <div class="sudheera-faq-highlight">

                                    <p>
                                        We recommend recording an
                                        unboxing video when opening
                                        your parcel.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- FAQ 6 -->

                    <div class="sudheera-faq-item">

                        <button
                            type="button"
                            class="sudheera-faq-question"
                            aria-expanded="false"
                            onclick="toggleSudheeraFaq(this)"
                        >

                            <div class="sudheera-faq-question-content">

                                <span class="sudheera-faq-number">
                                    06
                                </span>

                                <h3 class="sudheera-faq-title">
                                    Do you offer returns or exchanges?
                                </h3>

                            </div>

                            <span class="sudheera-faq-toggle"></span>

                        </button>

                        <div class="sudheera-faq-answer">

                            <div class="sudheera-faq-answer-inner">

                                <p>
                                    Returns or exchanges are subject
                                    to our applicable Return and Refund
                                    Policy. Please review the policy
                                    before requesting a return or
                                    exchange.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- FAQ 7 -->

                    <div class="sudheera-faq-item">

                        <button
                            type="button"
                            class="sudheera-faq-question"
                            aria-expanded="false"
                            onclick="toggleSudheeraFaq(this)"
                        >

                            <div class="sudheera-faq-question-content">

                                <span class="sudheera-faq-number">
                                    07
                                </span>

                                <h3 class="sudheera-faq-title">
                                    What payment methods are accepted?
                                </h3>

                            </div>

                            <span class="sudheera-faq-toggle"></span>

                        </button>

                        <div class="sudheera-faq-answer">

                            <div class="sudheera-faq-answer-inner">

                                <p>
                                    We accept the payment methods
                                    available at checkout. Please
                                    select your preferred secure
                                    payment option while placing your
                                    order.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- FAQ 8 -->

                    <div class="sudheera-faq-item">

                        <button
                            type="button"
                            class="sudheera-faq-question"
                            aria-expanded="false"
                            onclick="toggleSudheeraFaq(this)"
                        >

                            <div class="sudheera-faq-question-content">

                                <span class="sudheera-faq-number">
                                    08
                                </span>

                                <h3 class="sudheera-faq-title">
                                    How can I contact Sudheera Sarees?
                                </h3>

                            </div>

                            <span class="sudheera-faq-toggle"></span>

                        </button>

                        <div class="sudheera-faq-answer">

                            <div class="sudheera-faq-answer-inner">

                                <p>
                                    You can contact our customer
                                    support team through the contact
                                    details provided on our Contact Us
                                    page. Our team will be happy to
                                    assist you with your order or
                                    product-related queries.
                                </p>

                            </div>

                        </div>

                    </div>


                </div>


                <!-- ================= BOTTOM NOTE ================= -->

                <div class="sudheera-faq-note">

                    <h5>
                        Need More Help?
                    </h5>

                    <p>
                        Our customer support team is here to help you
                        with your shopping experience at Sudheera Sarees.
                    </p>

                </div>


            </div>

        </div>

    </div>

</div>


<script>

    function toggleSudheeraFaq(button) {

        const item = button.closest('.sudheera-faq-item');

        const answer = item.querySelector('.sudheera-faq-answer');

        const isOpen =
            button.getAttribute('aria-expanded') === 'true';


        /* Close all FAQ items */

        document
            .querySelectorAll('.sudheera-faq-question')
            .forEach(function(btn) {

                btn.setAttribute('aria-expanded', 'false');

            });


        document
            .querySelectorAll('.sudheera-faq-answer')
            .forEach(function(el) {

                el.classList.remove('show');

            });


        /* Open selected FAQ */

        if (!isOpen) {

            button.setAttribute('aria-expanded', 'true');

            answer.classList.add('show');

        }

    }

</script>

@endsection