@extends('layouts.website')

@section('content')

    <style>
        /* =========================================================
           SUDHEERA SAREES - ADDRESS PAGE
        ========================================================= */

        .sudheera-address-page {
            background: #fbf8f3;
            min-height: 100vh;
            padding: 10px 0 70px;
            color: #420916;
        }

        /* PAGE HEADER */
        .sudheera-address-header {
            text-align: center;
            padding-top: 25px;
            margin-bottom: 42px;
        }

        .sudheera-address-eyebrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            color: #a47a25;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .sudheera-address-eyebrow::before,
        .sudheera-address-eyebrow::after {
            content: "";
            width: 42px;
            height: 1px;
            background: #c9a35b;
        }

        .sudheera-address-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 54px;
            line-height: 1;
            font-weight: 600;
            color: #420916;
            margin: 0 0 15px;
        }

        .sudheera-address-subtitle {
            max-width: 570px;
            margin: 0 auto 16px;
            color: #756c64;
            font-size: 15px;
            line-height: 1.7;
        }

        .sudheera-breadcrumb {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            font-size: 13px;
        }

        .sudheera-breadcrumb a {
            color: #76001f;
            text-decoration: none;
            font-weight: 600;
        }

        .sudheera-breadcrumb a:hover {
            color: #c88618;
        }

        .sudheera-breadcrumb span {
            color: #b6a99c;
        }

        .sudheera-breadcrumb .active {
            color: #83786e;
        }

        .sudheera-header-line {
            width: 70px;
            height: 3px;
            border-radius: 50px;
            background: linear-gradient(90deg,
                    #420916,
                    #c88618,
                    #420916);
            margin: 22px auto 0;
        }

        /* TOP ACTION */
        .sudheera-address-actions {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 24px;
        }

        .sudheera-add-address-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 45px;
            padding: 10px 20px;
            background: #420916;
            border: 1px solid #420916;
            border-radius: 10px;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: all .3s ease;
        }

        .sudheera-add-address-btn i {
            color: #c88618;
        }

        .sudheera-add-address-btn:hover {
            background: linear-gradient(135deg,
                    #420916,
                    #76001f,
                    #a85c17);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(66, 9, 22, .15);
        }

        /* ADDRESS GRID */
        .sudheera-address-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        /* ADDRESS CARD */
        .sudheera-address-card {
            position: relative;
            background: #fff;
            border: 1px solid #eadfce;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 8px 30px rgba(66, 9, 22, .055);
            overflow: hidden;
            transition: all .3s ease;
        }

        .sudheera-address-card::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 3px;
            background: linear-gradient(90deg,
                    #420916,
                    #8f3b16,
                    #c88618);
        }

        .sudheera-address-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(66, 9, 22, .09);
        }

        /* CARD HEADER */
        .sudheera-address-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .sudheera-address-type {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 24px;
            font-weight: 700;
            color: #420916;
            margin: 0;
        }

        .sudheera-default-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 50px;
            background: #edf5ed;
            color: #52743d;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .sudheera-address-actions-small {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sudheera-icon-btn {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #eadfce;
            border-radius: 8px;
            background: #fff;
            color: #76001f;
            cursor: pointer;
            transition: all .3s ease;
        }

        .sudheera-icon-btn:hover {
            background: #420916;
            border-color: #420916;
            color: #fff;
        }

        .sudheera-delete-btn {
            color: #a52d2d;
        }

        /* ADDRESS CONTENT */
        .sudheera-address-content {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 18px;
            background: #fcfaf7;
            border: 1px solid #eee6dc;
            border-radius: 13px;
        }

        .sudheera-location-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #420916;
            color: #c88618;
            font-size: 15px;
        }

        .sudheera-address-info {
            min-width: 0;
        }

        .sudheera-address-name {
            color: #420916;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .sudheera-address-text {
            color: #70675e;
            font-size: 13px;
            line-height: 1.75;
            margin: 0;
        }

        .sudheera-address-phone {
            color: #420916;
            font-weight: 700;
        }

        /* DEFAULT BUTTON */
        .sudheera-set-default {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 42px;
            margin-top: 16px;
            border: 1px solid #c88618;
            border-radius: 9px;
            background: #fff;
            color: #8a5c13;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            transition: all .3s ease;
        }

        .sudheera-set-default:hover {
            background: #420916;
            border-color: #420916;
            color: #fff;
        }

        /* MODAL */
        .sudheera-address-modal {
            border: 0;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(66, 9, 22, .20);
        }

        .sudheera-address-modal .modal-header {
            background: #420916;
            color: #fff;
            padding: 20px 24px;
            border: 0;
        }

        .sudheera-address-modal .modal-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 26px;
            font-weight: 700;
        }

        .sudheera-address-modal .btn-close {
            filter: brightness(0) invert(1);
            opacity: .9;
        }

        .sudheera-address-modal .modal-body {
            padding: 25px;
            background: #fff;
        }

        .sudheera-address-modal .modal-footer {
            padding: 18px 25px;
            border-top: 1px solid #eee6dc;
            background: #fcfaf7;
        }

        .sudheera-address-modal .form-label {
            color: #420916;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .sudheera-address-modal .form-control,
        .sudheera-address-modal .form-select {
            border: 1px solid #dfd3c3;
            border-radius: 9px;
            min-height: 44px;
            font-size: 13px;
            color: #420916;
        }

        .sudheera-address-modal textarea.form-control {
            min-height: 90px;
            resize: vertical;
        }

        .sudheera-address-modal .form-control:focus,
        .sudheera-address-modal .form-select:focus {
            border-color: #c88618;
            box-shadow: 0 0 0 3px rgba(200, 134, 24, .10);
        }

        .sudheera-save-btn {
            background: #420916;
            border: 1px solid #420916;
            color: #fff;
            border-radius: 9px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 700;
        }

        .sudheera-save-btn:hover {
            background: linear-gradient(135deg,
                    #420916,
                    #76001f,
                    #a85c17);
            border-color: #76001f;
            color: #fff;
        }

        .sudheera-cancel-btn {
            border: 1px solid #d8cbb9;
            background: #fff;
            color: #70675e;
            border-radius: 9px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .sudheera-cancel-btn:hover {
            background: #f5efe7;
            color: #420916;
        }

        /* MOBILE */
        @media (max-width: 991px) {

            .sudheera-address-title {
                font-size: 46px;
            }

            .sudheera-address-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {

            .sudheera-address-page {
                padding: 25px 0 55px;
            }

            .sudheera-address-header {
                padding-top: 15px;
                margin-bottom: 30px;
            }

            .sudheera-address-eyebrow {
                font-size: 9px;
                letter-spacing: 2px;
            }

            .sudheera-address-eyebrow::before,
            .sudheera-address-eyebrow::after {
                width: 25px;
            }

            .sudheera-address-title {
                font-size: 38px;
            }

            .sudheera-address-subtitle {
                font-size: 13px;
                padding: 0 15px;
            }

            .sudheera-breadcrumb {
                font-size: 12px;
            }

            .sudheera-header-line {
                margin-top: 18px;
            }

            .sudheera-address-actions {
                justify-content: stretch;
            }

            .sudheera-add-address-btn {
                width: 100%;
            }

            .sudheera-address-card {
                padding: 20px;
                border-radius: 16px;
            }

            .sudheera-address-card-header {
                align-items: flex-start;
            }

            .sudheera-address-type {
                font-size: 22px;
            }

            .sudheera-address-content {
                padding: 14px;
            }

            .sudheera-address-text {
                font-size: 12px;
            }

            .sudheera-address-modal .modal-body {
                padding: 20px;
            }

            .sudheera-address-modal .modal-footer {
                padding: 15px 20px;
            }
        }

        @media (max-width: 480px) {

            .sudheera-address-title {
                font-size: 34px;
            }

            .sudheera-address-card {
                padding: 17px;
            }

            .sudheera-address-card-header {
                flex-wrap: wrap;
            }

            .sudheera-address-actions-small {
                width: 100%;
            }

            .sudheera-icon-btn {
                flex: 1;
            }

            .sudheera-address-modal .modal-title {
                font-size: 23px;
            }
        }
    </style>

    <!-- =========================================================
         ADDRESS PAGE
    ========================================================= -->

    <main class="sudheera-address-page">

        ```
        <div class="container">

            <!-- PAGE HEADER -->

            <div class="sudheera-address-header">

                <div class="sudheera-address-eyebrow">
                    SUDHEERA SAREES
                </div>

                <h1 class="sudheera-address-title">
                    My Addresses
                </h1>

                <p class="sudheera-address-subtitle">
                    Manage your saved delivery addresses and
                    choose where you would like your orders delivered.
                </p>

                <div class="sudheera-breadcrumb">

                    <a href="#">
                        Home
                    </a>

                    <span>/</span>

                    <span class="active">
                        Address
                    </span>

                </div>

                <div class="sudheera-header-line"></div>

            </div>


            <!-- ADD ADDRESS BUTTON -->

            <div class="sudheera-address-actions">

                <a href="#modalAddAddress" data-bs-toggle="modal" class="sudheera-add-address-btn">

                    <i class="fa fa-plus"></i>

                    Add New Address

                </a>

            </div>


            <!-- =====================================================
             ADDRESS CARDS
        ====================================================== -->

            <div class="sudheera-address-grid">


                <!-- ADDRESS 1 -->

                <div class="sudheera-address-card">

                    <div class="sudheera-address-card-header">

                        <div class="d-flex align-items-center gap-2">

                            <h5 class="sudheera-address-type">
                                Home
                            </h5>

                            <span class="sudheera-default-badge">

                                <i class="fa fa-check"></i>

                                Default

                            </span>

                        </div>

                        <div class="sudheera-address-actions-small">

                            <button type="button" class="sudheera-icon-btn" onclick="openEditAddress(
                                'Home',
                                'Vasanth Kumar',
                                '9876543210',
                                'vasanth@example.com',
                                '12-45, Main Road',
                                'Near Bus Stand',
                                'Bengaluru',
                                'Karnataka',
                                '560001'
                            )">

                                <i class="fa fa-edit"></i>

                            </button>

                            <button type="button" class="sudheera-icon-btn sudheera-delete-btn"
                                onclick="deleteAddress(this)">

                                <i class="fa fa-trash"></i>

                            </button>

                        </div>

                    </div>


                    <div class="sudheera-address-content">

                        <div class="sudheera-location-icon">

                            <i class="fa fa-map-marker"></i>

                        </div>

                        <div class="sudheera-address-info">

                            <div class="sudheera-address-name">
                                Vasanth Kumar
                            </div>

                            <p class="sudheera-address-text">

                                <span class="sudheera-address-phone">
                                    +91 98765 43210
                                </span>

                                <br>

                                12-45, Main Road,
                                Near Bus Stand

                                <br>

                                Bengaluru,
                                Karnataka - 560001

                                <br>

                                India

                            </p>

                        </div>

                    </div>

                </div>


                <!-- ADDRESS 2 -->

                <div class="sudheera-address-card">

                    <div class="sudheera-address-card-header">

                        <div>

                            <h5 class="sudheera-address-type">
                                Office
                            </h5>

                        </div>

                        <div class="sudheera-address-actions-small">

                            <button type="button" class="sudheera-icon-btn" onclick="openEditAddress(
                                'Office',
                                'Vasanth Kumar',
                                '9876543210',
                                'vasanth@example.com',
                                '45, MG Road',
                                'Near Metro Station',
                                'Bengaluru',
                                'Karnataka',
                                '560025'
                            )">

                                <i class="fa fa-edit"></i>

                            </button>

                            <button type="button" class="sudheera-icon-btn sudheera-delete-btn"
                                onclick="deleteAddress(this)">

                                <i class="fa fa-trash"></i>

                            </button>

                        </div>

                    </div>


                    <div class="sudheera-address-content">

                        <div class="sudheera-location-icon">

                            <i class="fa fa-building"></i>

                        </div>

                        <div class="sudheera-address-info">

                            <div class="sudheera-address-name">
                                Vasanth Kumar
                            </div>

                            <p class="sudheera-address-text">

                                <span class="sudheera-address-phone">
                                    +91 98765 43210
                                </span>

                                <br>

                                45, MG Road,
                                Near Metro Station

                                <br>

                                Bengaluru,
                                Karnataka - 560025

                                <br>

                                India

                            </p>

                        </div>

                    </div>


                    <a href="#" class="sudheera-set-default" onclick="setDefaultAddress(event, this)">

                        Set as Default

                    </a>

                </div>


                <!-- ADDRESS 3 -->

                <div class="sudheera-address-card">

                    <div class="sudheera-address-card-header">

                        <div>

                            <h5 class="sudheera-address-type">
                                Parents Home
                            </h5>

                        </div>

                        <div class="sudheera-address-actions-small">

                            <button type="button" class="sudheera-icon-btn" onclick="openEditAddress(
                                'Parents Home',
                                'Vasanth Kumar',
                                '9876543210',
                                'vasanth@example.com',
                                '8-22, Gandhi Nagar',
                                'Opposite Temple',
                                'Anantapur',
                                'Andhra Pradesh',
                                '515001'
                            )">

                                <i class="fa fa-edit"></i>

                            </button>

                            <button type="button" class="sudheera-icon-btn sudheera-delete-btn"
                                onclick="deleteAddress(this)">

                                <i class="fa fa-trash"></i>

                            </button>

                        </div>

                    </div>


                    <div class="sudheera-address-content">

                        <div class="sudheera-location-icon">

                            <i class="fa fa-home"></i>

                        </div>

                        <div class="sudheera-address-info">

                            <div class="sudheera-address-name">
                                Vasanth Kumar
                            </div>

                            <p class="sudheera-address-text">

                                <span class="sudheera-address-phone">
                                    +91 98765 43210
                                </span>

                                <br>

                                8-22, Gandhi Nagar,
                                Opposite Temple

                                <br>

                                Anantapur,
                                Andhra Pradesh - 515001

                                <br>

                                India

                            </p>

                        </div>

                    </div>


                    <a href="#" class="sudheera-set-default" onclick="setDefaultAddress(event, this)">

                        Set as Default

                    </a>

                </div>

            </div>

        </div>
        ```

    </main>

    <!-- =========================================================
         ADD ADDRESS MODAL
    ========================================================= -->

    <div class="modal fade" id="modalAddAddress" tabindex="-1" aria-hidden="true">

        ```
        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content sudheera-address-modal">

                <!-- HEADER -->

                <div class="modal-header">

                    <h5 class="modal-title">
                        Add New Address
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>


                <!-- BODY -->

                <div class="modal-body">

                    <form id="addAddressForm">

                        <div class="row g-3">


                            <!-- FULL NAME -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Full Name *
                                </label>

                                <input type="text" class="form-control" placeholder="Enter full name" required>

                            </div>


                            <!-- MOBILE -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Phone Number *
                                </label>

                                <input type="text" class="form-control" placeholder="Enter phone number" required>

                            </div>


                            <!-- ALTERNATE MOBILE -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Alternate Phone Number
                                </label>

                                <input type="text" class="form-control" placeholder="Enter alternate phone number">

                            </div>


                            <!-- EMAIL -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Email *
                                </label>

                                <input type="email" class="form-control" placeholder="Enter email" required>

                            </div>


                            <!-- PINCODE -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Pincode *
                                </label>

                                <input type="text" class="form-control" placeholder="Enter pincode" required>

                            </div>


                            <!-- CITY -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    City *
                                </label>

                                <input type="text" class="form-control" placeholder="Enter city" required>

                            </div>


                            <!-- LANDMARK -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Landmark
                                </label>

                                <input type="text" class="form-control" placeholder="Enter landmark">

                            </div>


                            <!-- STATE -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    State *
                                </label>

                                <select class="form-select" required>

                                    <option value="">
                                        Select State
                                    </option>

                                    <option>Andhra Pradesh</option>
                                    <option>Arunachal Pradesh</option>
                                    <option>Assam</option>
                                    <option>Bihar</option>
                                    <option>Chhattisgarh</option>
                                    <option>Goa</option>
                                    <option>Gujarat</option>
                                    <option>Haryana</option>
                                    <option>Himachal Pradesh</option>
                                    <option>Jharkhand</option>
                                    <option>Karnataka</option>
                                    <option>Kerala</option>
                                    <option>Madhya Pradesh</option>
                                    <option>Maharashtra</option>
                                    <option>Manipur</option>
                                    <option>Meghalaya</option>
                                    <option>Mizoram</option>
                                    <option>Nagaland</option>
                                    <option>Odisha</option>
                                    <option>Punjab</option>
                                    <option>Rajasthan</option>
                                    <option>Sikkim</option>
                                    <option>Tamil Nadu</option>
                                    <option>Telangana</option>
                                    <option>Tripura</option>
                                    <option>Uttar Pradesh</option>
                                    <option>Uttarakhand</option>
                                    <option>West Bengal</option>

                                </select>

                            </div>


                            <!-- ADDRESS TYPE -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Address Type
                                </label>

                                <select class="form-select">

                                    <option>Home</option>
                                    <option>Office</option>
                                    <option>Other</option>

                                </select>

                            </div>


                            <!-- GST -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    GST
                                </label>

                                <input type="text" class="form-control" placeholder="Enter GST Number">

                            </div>


                            <!-- ADDRESS -->

                            <div class="col-12">

                                <label class="form-label">
                                    House No, Street *
                                </label>

                                <textarea class="form-control" rows="3" placeholder="House No, Street, Area..."
                                    required></textarea>

                            </div>


                            <!-- ADDRESS 2 -->

                            <div class="col-12">

                                <label class="form-label">
                                    Address
                                </label>

                                <textarea class="form-control" rows="3"
                                    placeholder="Apartment, Area, Additional Address"></textarea>

                            </div>

                        </div>

                    </form>

                </div>


                <!-- FOOTER -->

                <div class="modal-footer">

                    <button type="button" class="sudheera-cancel-btn" data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button type="button" class="sudheera-save-btn" onclick="saveAddress()">

                        <i class="fa fa-check me-1"></i>

                        Save Address

                    </button>

                </div>

            </div>

        </div>
        ```

    </div>

    <!-- =========================================================
         EDIT ADDRESS MODAL
    ========================================================= -->

    <div class="modal fade" id="modalEditAddress" tabindex="-1" aria-hidden="true">

        ```
        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content sudheera-address-modal">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Address
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <form id="editAddressForm">

                        <div class="row g-3">


                            <div class="col-md-6">

                                <label class="form-label">
                                    Full Name *
                                </label>

                                <input type="text" id="editName" class="form-control" required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Phone Number *
                                </label>

                                <input type="text" id="editMobile" class="form-control" required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Email *
                                </label>

                                <input type="email" id="editEmail" class="form-control" required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Address Type
                                </label>

                                <select id="editType" class="form-select">

                                    <option>Home</option>
                                    <option>Office</option>
                                    <option>Other</option>

                                </select>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Pincode *
                                </label>

                                <input type="text" id="editPincode" class="form-control" required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    City *
                                </label>

                                <input type="text" id="editCity" class="form-control" required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    State *
                                </label>

                                <input type="text" id="editState" class="form-control" required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Landmark
                                </label>

                                <input type="text" id="editLandmark" class="form-control">

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    House No, Street *
                                </label>

                                <textarea id="editAddress" class="form-control" rows="3" required></textarea>

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Address 2
                                </label>

                                <textarea id="editAddress2" class="form-control" rows="3"></textarea>

                            </div>

                        </div>

                    </form>

                </div>


                <div class="modal-footer">

                    <button type="button" class="sudheera-cancel-btn" data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button type="button" class="sudheera-save-btn" onclick="updateAddress()">

                        <i class="fa fa-check me-1"></i>

                        Update Address

                    </button>

                </div>

            </div>

        </div>
        ```

    </div>

    <!-- =========================================================
         STATIC JAVASCRIPT
    ========================================================= -->

    <script>

        function openEditAddress(
            type,
            name,
            mobile,
            email,
            address,
            address2,
            city,
            state,
            pincode
        ) {

            document.getElementById('editType').value = type;
            document.getElementById('editName').value = name;
            document.getElementById('editMobile').value = mobile;
            document.getElementById('editEmail').value = email;
            document.getElementById('editAddress').value = address;
            document.getElementById('editAddress2').value = address2;
            document.getElementById('editCity').value = city;
            document.getElementById('editState').value = state;
            document.getElementById('editPincode').value = pincode;

            var modal = new bootstrap.Modal(
                document.getElementById('modalEditAddress')
            );

            modal.show();
        }


        function deleteAddress(button) {

            if (confirm('Are you sure you want to delete this address?')) {

                var card = button.closest('.sudheera-address-card');

                card.style.opacity = '0';
                card.style.transform = 'scale(.95)';

                setTimeout(function () {
                    card.remove();
                }, 300);

            }

        }


        function setDefaultAddress(event, button) {

            event.preventDefault();

            document.querySelectorAll('.sudheera-default-badge')
                .forEach(function (badge) {
                    badge.remove();
                });

            document.querySelectorAll('.sudheera-address-card')
                .forEach(function (card) {

                    var title = card.querySelector(
                        '.sudheera-address-type'
                    );

                    if (!card.querySelector('.sudheera-default-badge')) {

                        if (card.contains(button)) {

                            var badge = document.createElement('span');

                            badge.className =
                                'sudheera-default-badge';

                            badge.innerHTML =
                                '<i class="fa fa-check"></i> Default';

                            title.parentElement.appendChild(badge);

                            button.remove();

                        }

                    }

                });

        }


        function saveAddress() {

            var form = document.getElementById('addAddressForm');

            if (!form.checkValidity()) {

                form.reportValidity();

                return;

            }

            alert('Address saved successfully!');

            var modalElement =
                document.getElementById('modalAddAddress');

            var modal =
                bootstrap.Modal.getInstance(modalElement);

            if (modal) {
                modal.hide();
            }

            form.reset();

        }


        function updateAddress() {

            var form =
                document.getElementById('editAddressForm');

            if (!form.checkValidity()) {

                form.reportValidity();

                return;

            }

            alert('Address updated successfully!');

            var modalElement =
                document.getElementById('modalEditAddress');

            var modal =
                bootstrap.Modal.getInstance(modalElement);

            if (modal) {
                modal.hide();
            }

        }

    </script>

@endsection