@extends('layouts.website')

@section('content')

    <style>
        /* =========================================================
           BLOG PAGE
        ========================================================= */

        .static-blog-section {
            padding: 20px 0 50px;
        }

        /* =========================================================
           BREADCRUMB
        ========================================================= */

        .static-blog-breadcrumb {
            padding: 35px 0 20px;
        }

        .static-blog-breadcrumb ul {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0;
            margin-left: 20px;
            list-style: none;
        }

        .static-blog-breadcrumb li {
            font-size: 13px;
            color: #888;
        }

        .static-blog-breadcrumb a {
            color: #555;
            text-decoration: none;
        }

        .static-blog-breadcrumb .current {
            color: #a92d0f;
        }

        /* =========================================================
           HEADING
        ========================================================= */

        .static-blog-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .static-blog-heading h2 {
            margin: 0 0 7px;
            color: #a92d0f;
            font-size: 30px;
            font-weight: 500;
            letter-spacing: -0.5px;
        }

        .static-blog-heading p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }

        /* =========================================================
           BLOG GRID
        ========================================================= */

        .static-blog-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 35px 20px;
            margin: 20px;
        }

        /* =========================================================
           BLOG CARD
        ========================================================= */

        .static-blog-card {
            width: 100%;
            min-width: 0;
            display: flex;
            flex-direction: column;
            background: #fff;
        }

        /* =========================================================
           BLOG IMAGE
        ========================================================= */

        .static-blog-image {
            position: relative;
            display: block;
            width: 100%;
            height: 420px;
            overflow: hidden;
            border-radius: 8px;
            background: #f7f3ee;
        }

        .static-blog-image img {
            width: 100%;
            height: 100%;
            display: block;

            /*
             * Keeps all images the same size
             */
            object-fit: fill;
            object-position: center;

            transition: transform .5s ease;
        }

        .static-blog-card:hover .static-blog-image img {
            transform: scale(1.05);
        }

        /* =========================================================
           DATE
        ========================================================= */

        .static-blog-date {
            position: absolute;
            left: 15px;
            bottom: 15px;

            padding: 7px 12px;

            background: #fff;
            color: #555;

            border-radius: 5px;

            font-size: 11px;
            font-weight: 500;
            line-height: 1;
        }

        /* =========================================================
           BLOG CONTENT
        ========================================================= */

        .static-blog-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;

            padding: 16px 3px 0;
        }

        /* =========================================================
           BLOG TAG
        ========================================================= */

        .static-blog-tag {
            display: block;

            margin-bottom: 8px;

            color: #a92d0f;

            font-size: 11px;
            font-weight: 600;

            text-transform: uppercase;
            letter-spacing: 1px;

            text-decoration: none;

            line-height: 1.3;
        }

        /* =========================================================
           BLOG TITLE
        ========================================================= */

        .static-blog-title {
            display: -webkit-box;

            width: 100%;
            min-height: 54px;

            margin-bottom: 10px;

            color: #222;

            font-size: 20px;
            line-height: 1.35;
            font-weight: 500;

            text-decoration: none;

            /*
             * All titles get same height
             */
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;

            transition: .3s ease;
        }

        .static-blog-title:hover {
            color: #a92d0f;
        }

        /* =========================================================
           DESCRIPTION
        ========================================================= */

        .static-blog-description {
            display: -webkit-box;

            width: 100%;
            min-height: 44px;

            margin: 0 0 15px;

            color: #777;

            font-size: 13px;
            line-height: 1.7;

            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* =========================================================
           READ ARTICLE
        ========================================================= */

        .static-blog-read {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: #333;

            font-size: 12px;
            font-weight: 600;

            letter-spacing: .5px;

            text-decoration: none;

            margin-top: auto;

            transition: .3s ease;
        }

        .static-blog-read i {
            font-size: 13px;
            transition: transform .3s ease;
        }

        .static-blog-read:hover {
            color: #a92d0f;
        }

        .static-blog-read:hover i {
            transform: translateX(4px);
        }

        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .static-blog-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 30px 16px;
            }

            .static-blog-image {
                height: 320px;
            }

            .static-blog-title {
                font-size: 18px;
                min-height: 49px;
            }
        }

        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 767px) {

            .static-blog-section {
                padding: 10px 0 35px;
            }

            .static-blog-breadcrumb {
                padding: 20px 0 15px;
            }

            .static-blog-heading {
                margin-bottom: 22px;
            }

            .static-blog-heading h2 {
                font-size: 24px;
            }

            .static-blog-heading p {
                font-size: 12px;
                line-height: 1.5;
            }

            /*
             * 2 BLOGS PER ROW
             */
            .static-blog-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 25px 10px;
            }

            .static-blog-image {
                width: 100%;
                height: 240px;
                border-radius: 7px;
            }

            .static-blog-date {
                left: 7px;
                bottom: 7px;

                padding: 5px 7px;

                font-size: 8px;
            }

            .static-blog-content {
                padding: 10px 2px 0;
            }

            .static-blog-tag {
                font-size: 8px;
                margin-bottom: 5px;
            }

            .static-blog-title {
                font-size: 14px;
                line-height: 1.35;

                min-height: 38px;
                max-height: 38px;

                margin-bottom: 6px;

                -webkit-line-clamp: 2;
            }

            .static-blog-description {
                font-size: 10px;
                line-height: 1.5;

                min-height: 30px;
                max-height: 30px;

                margin-bottom: 8px;

                -webkit-line-clamp: 2;
            }

            .static-blog-read {
                font-size: 9px;
                gap: 4px;
            }

            .static-blog-read i {
                font-size: 10px;
            }
        }

        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 480px) {

            .static-blog-grid {
                gap: 22px 8px;
            }

            .static-blog-image {
                height: 210px;
            }

            .static-blog-title {
                font-size: 13px;
                min-height: 35px;
                max-height: 35px;
            }

            .static-blog-description {
                font-size: 9.5px;
                min-height: 29px;
                max-height: 29px;
            }
        }
    </style>


    <!-- =========================================================
         BLOG PAGE
    ========================================================= -->

    <section class="static-blog-section">

        <div class="container">


            <!-- =====================================================
                 BREADCRUMB
            ====================================================== -->

            <div class="static-blog-breadcrumb">

                <ul>

                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>

                    <li>
                        /
                    </li>

                    <li class="current">
                        Blog
                    </li>

                </ul>

            </div>


            <!-- =====================================================
                 HEADING
            ====================================================== -->

            <div class="static-blog-heading">

                <h2>
                    Our Latest Blogs
                </h2>

                <p>
                    Discover saree trends, styling tips, traditions and fashion inspiration
                </p>

            </div>


            <!-- =====================================================
                 BLOG GRID
            ====================================================== -->

            <div class="static-blog-grid">


                <!-- =================================================
                     BLOG 1
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product1.webp"
                            alt="How to Choose the Perfect Silk Saree">

                        <span class="static-blog-date">
                            27 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                        <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Saree Guide
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            How to Choose the Perfect Silk Saree for Every Occasion
                        </a>

                        <p class="static-blog-description">
                            Explore simple tips to choose the right silk saree
                            based on occasion, colour, fabric and personal style.
                        </p>

                        <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


                <!-- =================================================
                     BLOG 2
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product2.webp"
                            alt="Banarasi Saree Styling Tips">

                        <span class="static-blog-date">
                            24 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                       <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Styling
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            7 Beautiful Ways to Style a Traditional Banarasi Saree
                        </a>

                        <p class="static-blog-description">
                            Give your traditional wardrobe a modern touch with
                            these elegant Banarasi saree styling ideas.
                        </p>

                       <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


                <!-- =================================================
                     BLOG 3
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product3.webp" alt="Cotton Saree Fashion">

                        <span class="static-blog-date">
                            21 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                       <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Fashion
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            Why Cotton Sarees Are Perfect for Everyday Elegance
                        </a>

                        <p class="static-blog-description">
                            Discover why lightweight cotton sarees remain a
                            timeless choice for comfortable everyday dressing.
                        </p>

                       <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


                <!-- =================================================
                     BLOG 4
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product4.webp" alt="Saree Care Guide">

                        <span class="static-blog-date">
                            18 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                       <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Saree Care
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            Easy Saree Care Tips to Keep Your Favourite Sarees Beautiful
                        </a>

                        <p class="static-blog-description">
                            Learn the best ways to store, clean and maintain
                            your sarees for years to come.
                        </p>

                       <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


                <!-- =================================================
                     BLOG 5
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product5.webp" alt="Party Wear Sarees">

                        <span class="static-blog-date">
                            15 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                       <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Party Wear
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            Latest Party Wear Saree Trends for the Festive Season
                        </a>

                        <p class="static-blog-description">
                            From elegant georgette to glamorous organza,
                            explore saree styles perfect for special occasions.
                        </p>

                       <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


                <!-- =================================================
                     BLOG 6
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product6.webp" alt="Wedding Saree Guide">

                        <span class="static-blog-date">
                            12 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                       <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Wedding
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            The Ultimate Guide to Choosing a Saree for Weddings
                        </a>

                        <p class="static-blog-description">
                            Find the perfect wedding saree by exploring colours,
                            fabrics, designs and traditional styling ideas.
                        </p>

                       <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


                <!-- =================================================
                     BLOG 7
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product7.webp" alt="Designer Saree Trends">

                        <span class="static-blog-date">
                            09 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                       <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Trends
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            Designer Saree Trends That Are Taking Over Fashion
                        </a>

                        <p class="static-blog-description">
                            Explore the latest designer saree trends and
                            statement styles for the modern woman.
                        </p>

                       <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


                <!-- =================================================
                     BLOG 8
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product8.webp"
                            alt="Traditional Saree Styling">

                        <span class="static-blog-date">
                            06 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                       <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Tradition
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            Traditional Saree Styles That Never Go Out of Fashion
                        </a>

                        <p class="static-blog-description">
                            Celebrate timeless Indian fashion with traditional
                            saree styles that continue to inspire generations.
                        </p>

                       <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


                <!-- =================================================
                     BLOG 9
                ================================================== -->

                <article class="static-blog-card">

                    <a href="{{ route('blogdetails') }}" class="static-blog-image">

                        <img loading="lazy" src="{{ asset('website') }}/images/product9.webp"
                            alt="Festive Saree Collection">

                        <span class="static-blog-date">
                            02 Aug, 2026
                        </span>

                    </a>

                    <div class="static-blog-content">

                       <a href="{{ route('blogdetails') }}" class="static-blog-tag">
                            Festive
                        </a>

                        <a href="{{ route('blogdetails') }}" class="static-blog-title">
                            Festive Saree Colours to Make a Statement This Season
                        </a>

                        <p class="static-blog-description">
                            Discover beautiful festive colours and combinations
                            that will make your traditional look stand out.
                        </p>

                       <a href="{{ route('blogdetails') }}" class="static-blog-read">
                            READ ARTICLE
                            <i class="icon icon-ArrowRight"></i>
                        </a>

                    </div>

                </article>


            </div>

        </div>

    </section>

@endsection