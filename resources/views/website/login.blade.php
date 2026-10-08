@extends('layouts.website')

@section('content')

<style>
    /* =========================================================
       LOGIN PAGE
    ========================================================= */

    .sudheera-login-section {
        min-height: 70vh;
        padding: 60px 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #faf7f2;
    }

    .sudheera-login-wrapper {
        width: 100%;
        max-width: 430px;
    }

    .sudheera-login-card {
        background: #fff;
        border-radius: 18px;
        padding: 40px 35px;
        box-shadow: 0 12px 40px rgba(80, 50, 15, 0.10);
        border: 1px solid #eee3d3;
    }

    /* Logo / Icon */

    .sudheera-login-icon {
        width: 75px;
        height: 75px;
        margin: 0 auto 20px;

        border-radius: 50%;

        background: #76001f;
        color: #fff;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 30px;

        box-shadow: 0 10px 25px rgba(165, 106, 22, .22);
    }

    /* Heading */

    .sudheera-login-heading {
        text-align: center;
        margin-bottom: 28px;
    }

    .sudheera-login-heading h2 {
        margin: 0 0 8px;

        font-family: "Instrument Serif", serif;

        font-size: 29px;
        font-weight: 600;

        color: #76001f;
    }

    .sudheera-login-heading p {
        margin: 0;

        color: #777;
        font-size: 14px;
        line-height: 1.6;
    }

    /* Form */

    .sudheera-form-group {
        margin-bottom: 20px;
    }

    .sudheera-form-group label {
        display: block;

        margin-bottom: 8px;

        color: #403a34;

        font-size: 13px;
        font-weight: 600;
    }

    .sudheera-mobile-wrapper {
        display: flex;
        align-items: stretch;

        border: 1px solid #ddd1c0;
        border-radius: 8px;

        overflow: hidden;

        background: #fff;

        transition: .3s ease;
    }

    .sudheera-mobile-wrapper:focus-within {
        border-color: #76001f;
        box-shadow: 0 0 0 3px rgba(165, 106, 22, .08);
    }

    .sudheera-country-code {
        display: flex;
        align-items: center;

        padding: 0 13px;

        background: #faf7f2;

        border-right: 1px solid #ddd1c0;

        color: #555;

        font-size: 14px;
        font-weight: 600;
    }

    .sudheera-mobile-input {
        width: 100%;

        border: 0;
        outline: 0;

        padding: 13px 14px;

        font-size: 14px;
        color: #333;

        background: transparent;
    }

    .sudheera-mobile-input::placeholder {
        color: #aaa;
    }

    /* OTP */

    .sudheera-otp-group {
        display: none;
        margin-bottom: 20px;
    }

    .sudheera-otp-input {
        width: 100%;

        border: 1px solid #ddd1c0;
        border-radius: 8px;

        padding: 13px 14px;

        outline: none;

        text-align: center;

        letter-spacing: 8px;

        font-size: 20px;
        font-weight: 600;

        color: #333;

        transition: .3s ease;
    }

    .sudheera-otp-input:focus {
        border-color: #76001f;

        box-shadow: 0 0 0 3px rgba(165, 106, 22, .08);
    }

    /* Button */

    .sudheera-login-btn {
        width: 100%;

        border: 0;
        border-radius: 8px;

        padding: 14px 20px;

        background: #76001f;
        color: #fff;

        font-size: 13px;
        font-weight: 700;

        letter-spacing: .5px;

        cursor: pointer;

        transition: .3s ease;
    }

    .sudheera-login-btn:hover {
        background: #76001f;
        transform: translateY(-1px);
    }

    /* Resend */

    .sudheera-resend {
        display: none;

        text-align: center;

        margin-top: 15px;

        font-size: 13px;
        color: #777;
    }

    .sudheera-resend a {
        color: #76001f;
        font-weight: 600;
        text-decoration: none;
    }

    .sudheera-resend a:hover {
        text-decoration: underline;
    }

    /* Change number */

    .sudheera-change-number {
        display: none;

        text-align: center;

        margin-top: 10px;
    }

    .sudheera-change-number a {
        color: #777;

        font-size: 12px;

        text-decoration: none;
    }

    .sudheera-change-number a:hover {
        color: #76001f;
    }

    /* Message */

    .sudheera-login-message {
        display: none;

        padding: 10px 12px;

        margin-bottom: 18px;

        border-radius: 6px;

        font-size: 13px;

        text-align: center;
    }

    .sudheera-login-message.success {
        display: block;

        color: #3d6b27;
        background: #f1f8ec;
        border: 1px solid #d5e8c8;
    }

    .sudheera-login-message.error {
        display: block;

        color: #a33b25;
        background: #fff1ed;
        border: 1px solid #f1cfc5;
    }

    /* Terms */

    .sudheera-login-terms {
        text-align: center;

        margin-top: 22px;

        font-size: 11px;

        color: #999;

        line-height: 1.6;
    }

    .sudheera-login-terms a {
        color: #76001f;
        text-decoration: none;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 575px) {

        .sudheera-login-section {
            min-height: 75vh;
            padding: 35px 15px;
        }

        .sudheera-login-card {
            padding: 30px 20px;
            border-radius: 15px;
        }

        .sudheera-login-icon {
            width: 65px;
            height: 65px;
            font-size: 26px;
            margin-bottom: 15px;
        }

        .sudheera-login-heading {
            margin-bottom: 22px;
        }

        .sudheera-login-heading h2 {
            font-size: 20px;
        }

        .sudheera-login-heading p {
            font-size: 13px;
        }
    }
</style>


<!-- =========================================================
     LOGIN SECTION
========================================================= -->

<section class="sudheera-login-section">

    <div class="sudheera-login-wrapper">

        <div class="sudheera-login-card">

            <!-- Icon -->

            <div class="sudheera-login-icon">

                <i class="fa fa-mobile"></i>

            </div>


            <!-- Heading -->

            <div class="sudheera-login-heading">

                <h2>
                    Welcome to Sudheera Sarees
                </h2>

                <p id="loginSubtitle">
                    Enter your mobile number to continue
                </p>

            </div>


            <!-- Message -->

            <div id="loginMessage" class="sudheera-login-message"></div>


            <!-- Login Form -->

            <form id="otpLoginForm">

                @csrf

                <!-- Mobile -->

                <div class="sudheera-form-group">

                    <label for="mobile">
                        Mobile Number
                    </label>

                    <div class="sudheera-mobile-wrapper">

                        <span class="sudheera-country-code">
                            +91
                        </span>

                        <input
                            type="tel"
                            id="mobile"
                            name="mobile"
                            class="sudheera-mobile-input"
                            placeholder="Enter mobile number"
                            maxlength="10"
                            inputmode="numeric"
                            autocomplete="tel"
                        >

                    </div>

                </div>


                <!-- OTP -->

                <div class="sudheera-otp-group" id="otpGroup">

                    <label for="otp">
                        Enter OTP
                    </label>

                    <input
                        type="text"
                        id="otp"
                        name="otp"
                        class="sudheera-otp-input"
                        placeholder="------"
                        maxlength="6"
                        inputmode="numeric"
                        autocomplete="one-time-code"
                    >

                </div>


                <!-- Button -->

                <button
                    type="submit"
                    class="sudheera-login-btn"
                    id="otpButton">

                    SEND OTP

                </button>


                <!-- Resend -->

                <div class="sudheera-resend" id="resendOtp">

                    Didn't receive OTP?
                    <a href="javascript:void(0)" id="resendBtn">
                        Resend OTP
                    </a>

                </div>


                <!-- Change Number -->

                <div class="sudheera-change-number" id="changeNumber">

                    <a href="javascript:void(0)" id="changeNumberBtn">
                        ← Change mobile number
                    </a>

                </div>

            </form>


            <!-- Terms -->

            <div class="sudheera-login-terms">

                By continuing, you agree to our
                <a href="#">
                    Terms & Conditions
                </a>
                and
                <a href="#">
                    Privacy Policy
                </a>.

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     JQUERY
========================================================= -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

$(document).ready(function () {

    let otpSent = false;


    /* =========================================================
       ONLY NUMBERS
    ========================================================= */

    $('#mobile').on('input', function () {

        this.value = this.value.replace(/[^0-9]/g, '');

    });


    $('#otp').on('input', function () {

        this.value = this.value.replace(/[^0-9]/g, '');

    });


    /* =========================================================
       FORM SUBMIT
    ========================================================= */

    $('#otpLoginForm').on('submit', function (e) {

        e.preventDefault();

        let mobile = $('#mobile').val().trim();


        /* =====================================================
           SEND OTP
        ===================================================== */

        if (!otpSent) {

            if (mobile.length !== 10) {

                showMessage(
                    'Please enter a valid 10-digit mobile number.',
                    'error'
                );

                return;

            }


            $('#otpButton')
                .prop('disabled', true)
                .text('SENDING...');


            /*
             * STATIC DEMO
             *
             * Replace this section with your Laravel AJAX
             * OTP API.
             */

            setTimeout(function () {

                otpSent = true;

                $('#otpGroup').slideDown();

                $('#resendOtp').slideDown();

                $('#changeNumber').slideDown();

                $('#otpButton').text('VERIFY OTP');

                $('#loginSubtitle').text(
                    'Enter the OTP sent to +91 ' + mobile
                );

                $('#mobile').prop('readonly', true);

                showMessage(
                    'OTP sent successfully.',
                    'success'
                );

                $('#otp').focus();

            }, 800);

        }


        /* =====================================================
           VERIFY OTP
        ===================================================== */

        else {

            let otp = $('#otp').val().trim();


            if (otp.length !== 6) {

                showMessage(
                    'Please enter the 6-digit OTP.',
                    'error'
                );

                return;

            }


            $('#otpButton')
                .prop('disabled', true)
                .text('VERIFYING...');


            /*
             * STATIC DEMO
             *
             * Replace with your Laravel OTP verification AJAX.
             */

            setTimeout(function () {

                /*
                 * Demo OTP
                 *
                 * Use 123456 for testing.
                 */

                if (otp === '123456') {

                    showMessage(
                        'Login successful! Redirecting...',
                        'success'
                    );

                    setTimeout(function () {

                        window.location.href = '/';

                    }, 1000);

                } else {

                    $('#otpButton')
                        .prop('disabled', false)
                        .text('VERIFY OTP');

                    showMessage(
                        'Invalid OTP. Please try again.',
                        'error'
                    );

                }

            }, 800);

        }

    });


    /* =========================================================
       RESEND OTP
    ========================================================= */

    $('#resendBtn').on('click', function () {

        let mobile = $('#mobile').val().trim();


        if (mobile.length !== 10) {

            showMessage(
                'Invalid mobile number.',
                'error'
            );

            return;

        }


        $('#resendBtn')
            .text('Sending...');


        setTimeout(function () {

            $('#resendBtn')
                .text('Resend OTP');

            showMessage(
                'OTP resent successfully.',
                'success'
            );

            $('#otp').val('').focus();

        }, 800);

    });


    /* =========================================================
       CHANGE NUMBER
    ========================================================= */

    $('#changeNumberBtn').on('click', function () {

        otpSent = false;

        $('#mobile')
            .prop('readonly', false)
            .val('')
            .focus();

        $('#otp')
            .val('');

        $('#otpGroup').slideUp();

        $('#resendOtp').hide();

        $('#changeNumber').hide();

        $('#otpButton')
            .prop('disabled', false)
            .text('SEND OTP');

        $('#loginSubtitle')
            .text('Enter your mobile number to continue');

        $('#loginMessage')
            .hide()
            .removeClass('success error');

    });


    /* =========================================================
       MESSAGE
    ========================================================= */

    function showMessage(message, type) {

        $('#loginMessage')
            .removeClass('success error')
            .addClass(type)
            .text(message)
            .show();

    }

});

</script>

@endsection