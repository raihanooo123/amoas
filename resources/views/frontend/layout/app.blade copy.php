<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:32:25 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KreativDev">

    <!-- Title -->
    <title>Bookapp - Appointment Booking Html Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/fav.png" type="image/x-icon">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600;700&amp;family=Poppins:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/bootstrap.min.css') }}">
    <!-- Data Tables CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/datatables.min.css') }}">
    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/fontawesome/css/all.min.css') }}">
    <!-- Icomoon Icon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/icomoon/style.css') }}">
    <!-- Date-range Picker -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/daterangepicker.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/magnific-popup.min.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/swiper-bundle.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/nice-select.css') }}">
    <!-- NoUi Range Slider -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/nouislider.min.css') }}">
    <!--====== Stepper css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/bs-stepper.min.css') }}">
    <!--====== calendar css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/pignose.calendar.min.css') }}">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/aos.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/animate.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
</head>

<body class="theme-color-1">
    <!-- Preloader start -->
    <div id="preLoader">
        <div class="loader"></div>
    </div>
    <!-- Preloader end -->

    <!-- Header-area start -->
    <header class="header-area header-1" data-aos="fade-down">
        <!-- Start mobile menu -->
        <div class="mobile-menu">
            <div class="container">
                <div class="mobile-menu-wrapper"></div>
            </div>
        </div>
        <!-- End mobile menu -->

        <div class="main-responsive-nav">
            <div class="container">
                <!-- Mobile Logo -->

                <div class="logo">
                    <a href="index.html" target="_self" title="Superv">
                        <img src="{{ asset('frontend/assets/images/logo/logo-1.png') }}" alt="Brand logo">
                    </a>
                </div>


                <!-- Menu toggle button -->
                <button class="menu-toggler" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.html" target="_self" title="Superv">
                        <img src="{{ asset('frontend/assets/images/logo/logo-1.png') }}" alt="Brand Logo">
                    </a>
                    <!-- Navigation items -->
                    <div class="collapse navbar-collapse">
                        <ul id="mainMenu" class="navbar-nav mobile-item mx-auto">
                            <li class="nav-item">
                                <a href="#home" class="nav-link toggle">Home <i class="fal fa-plus"></i></a>
                                <ul class="menu-dropdown">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html">Home Demo 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index-2.html">Home Demo 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index-3.html">Home Demo 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link toggle" href="#services">Services<i class="fal fa-plus"></i></a>
                                <ul class="menu-dropdown">
                                    <li class="nav-item">
                                        <a class="nav-link" href="services.html">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="service-details.html">Service Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link toggle" href="#vendors">Vendors<i class="fal fa-plus"></i></a>
                                <ul class="menu-dropdown">
                                    <li class="nav-item">
                                        <a class="nav-link" href="vendors.html">Vendors</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="vendor-details.html">Vendor Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link toggle" href="#pages">Pages<i class="fal fa-plus"></i></a>
                                <ul class="menu-dropdown">
                                    <li class="nav-item">
                                        <a class="nav-link toggle" href="javaScript:void(0)">My Account<i class="fal fa-plus"></i></a>
                                        <ul class="menu-dropdown">
                                            <li class="nav-item">
                                                <a class="nav-link" href="dashboard.html">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="order.html">Order List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="order-details.html">Order Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="profile.html">Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="login.html">Login</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="signup.html">Signup</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="reset-password.html">Reset Password</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="forgot-password.html">Forgot Password</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="wishlist.html">Wishlist</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="checkout.html">Checkout</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link toggle" href="#blogs">Blog<i class="fal fa-plus"></i></a>
                                <ul class="menu-dropdown">
                                    <li class="nav-item">
                                        <a class="nav-link" href="blogs.html">Blogs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog-details.html">Blog Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="more-option mobile-item">
                        <div class="item">
                            <div class="language">
                                <select class="niceselect">
                                    <option value="1">Eng</option>
                                    <option value="2">Chi</option>
                                    <option value="3">Fre</option>
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            <a href="login.html" class="btn btn-md btn-primary btn-gradient icon-start" title="Login" target="_self"><i class="fal fa-sign-in-alt"></i> Login</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header-area end -->

    <!-- Home-area start-->
    <section class="hero-banner hero-banner-1 parallax">
        <div class="container container-lg-fluid">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-6">
                    <div class="fluid-left">
                        <div class="banner-content mb-40">
                            <h1 class="title mb-30" data-aos="fade-up" data-aos-delay="100"> Find Anything From Nearest Location To Make A Booking </h1>
                            <p class="text" data-aos="fade-up" data-aos-delay="100">Link Build is an advanced and modern-looking directory script with rich SEO features where you can create your.  </p>
                            <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="150">
                                <div class="form-wrapper shadow-md bg-white p-20 radius-md">
                                    <form action="#">
                                        <div class="row align-items-center">
                                            <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                                                <div class="input-group">
                                                    <label for="location" class="text-gradient"><i class="fal fa-map-marker-alt"></i></label>
                                                    <input type="text" id="location" class="form-control" placeholder="Search Location">
                                                    <div class="vr"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                                                <div class="input-group">
                                                    <label for="search" class="text-gradient"><i class="fal fa-clipboard-list"></i></label>
                                                    <input type="text" id="search" class="form-control" placeholder="Search Services">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-2 col-md-4 col-sm-6">
                                                <button type="button" class="btn btn-lg btn-primary icon-start w-100">
                                                    <i class="fal fa-search"></i>
                                                    <span>Find Now</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="banner-image mb-40 parallax-img" data-speed="0.5" data-revert="true">
                        <img class="lazyload blur-up" src="{{ asset('frontend/assets/images/placeholder.png') }}" data-src="{{ asset('frontend/assets/images/banner/hero-banner-1.png') }}" alt="Banner Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home-area end -->

    <!-- Category-area start -->
    <section class="category-area category-1 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-0">Most Popular Categories</h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    <div class="swiper category-slider" id="category-slider-1" data-slides-per-view="5" data-swiper-loop="false">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card p-25 border radius-md text-center">
                                    <div class="card-icon radius-md mx-auto mb-20">
                                        <i class="ico-surgery"></i>
                                    </div>
                                    <h4 class="card-title lc-1 mb-1">
                                        <a href="services.html" target="_self" title="Doctor">
                                            Doctor
                                        </a>
                                    </h4>
                                    <span class="font-sm">80+ Doctor Available</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card p-25 border radius-md text-center">
                                    <div class="card-icon radius-md mx-auto mb-20">
                                        <i class="ico-person"></i>
                                    </div>
                                    <h4 class="card-title lc-1 mb-1">
                                        <a href="services.html" target="_self" title="Plumber">
                                            Plumber
                                        </a>
                                    </h4>
                                    <span class="font-sm">99+ Plumber Available</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card p-25 border radius-md text-center">
                                    <div class="card-icon radius-md mx-auto mb-20">
                                        <i class="ico-gym"></i>
                                    </div>
                                    <h4 class="card-title lc-1 mb-1">
                                       <a href="services.html" target="_self" title="Gym Center">
                                            Gym Center
                                        </a>
                                    </h4>
                                    <span class="font-sm">34+ Gym Available</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card p-25 border radius-md text-center">
                                    <div class="card-icon radius-md mx-auto mb-20">
                                        <i class="ico-bucket"></i>
                                    </div>
                                    <h4 class="card-title lc-1 mb-1">
                                        <a href="services.html" target="_self" title="Cleaning">
                                            Cleaning
                                        </a>
                                    </h4>
                                    <span class="font-sm">98+ Cleaner Available</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card p-25 border radius-md text-center">
                                    <div class="card-icon radius-md mx-auto mb-20">
                                        <i class="ico-thunder"></i>
                                    </div>
                                    <h4 class="card-title lc-1 mb-1">
                                        <a href="services.html" target="_self" title="Electrical">
                                            Electrical
                                        </a>
                                    </h4>
                                    <span class="font-sm">67+ Electrician Available</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card p-25 border radius-md text-center">
                                    <div class="card-icon radius-md mx-auto mb-20">
                                        <i class="ico-barbershop"></i>
                                    </div>
                                    <h4 class="card-title lc-1 mb-1">
                                        <a href="services.html" target="_self" title="Barber Shop">
                                            Barber Shop
                                        </a>
                                    </h4>
                                    <span class="font-sm">32+ Barber Available</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination position-static mt-40" id="category-slider-1-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category-area end -->

    <!-- Works-area start -->
    <section class="works-area works-1 pt-100 pb-60 bg-img bg-cover" data-bg-image="{{ asset('frontend/assets/images/work-bg-1.png') }} ">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-5">
                    <div class="content-title mb-40" data-aos="fade-up">
                        <h2 class="title mb-25 color-white">
                            How appointment Booking System Works
                        </h2>
                        <p class="color-white">
                            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind.
                        </p>
                        <div class="mt-30">
                            <button class="btn btn-lg btn-primary btn-gradient icon-start" data-bs-toggle="modal" data-bs-target="#makeBooking" type="button" aria-label="Book Now">
                                <i class="fal fa-calendar-check"></i>
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="swiper works-slider mb-40" id="works-slider-1" data-aos="fade-up">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card p-30 radius-lg">
                                    <div class="card-icon color-white">
                                        <i class="ico-location"></i>
                                    </div>
                                    <div class="line bg-white my-3 rounded-pill"></div>
                                    <h4 class="card-title color-white lc-1 mb-15">
                                        Set Location
                                    </h4>
                                    <p class="card-text color-light">
                                        Set your location for find
                                        service or shop for
                                        appointment booking.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card p-30 radius-lg">
                                    <div class="card-icon color-white">
                                        <i class="ico-search"></i>
                                    </div>
                                    <div class="line bg-white my-3 rounded-pill"></div>
                                    <h4 class="card-title color-white lc-1 mb-15">
                                        Find Services
                                    </h4>
                                    <p class="card-text color-light">
                                        Set your location for find
                                        service or shop for
                                        appointment booking.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card p-30 radius-lg">
                                    <div class="card-icon color-white">
                                        <i class="ico-booking"></i>
                                    </div>
                                    <div class="line bg-white my-3 rounded-pill"></div>
                                    <h4 class="card-title color-white lc-1 mb-15">
                                        Booking
                                    </h4>
                                    <p class="card-text color-light">
                                        Set your location for find
                                        service or shop for
                                        appointment booking.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination position-static mt-30" id="works-slider-1-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Works-area end -->

    <!-- Service-area start -->
    <section class="service-area service-1 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">Our Top Featured Services</h2>
                        <!-- Slider navigation buttons -->
                        <div class="slider-navigation">
                            <button type="button" title="Slide prev" class="slider-btn" id="product-slider-1-prev">
                                <i class="fal fa-angle-left"></i>
                            </button>
                            <button type="button" title="Slide next" class="slider-btn" id="product-slider-1-next">
                                <i class="fal fa-angle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Slider main container -->
                    <div class="swiper product-slider" id="product-slider-1" data-slides-per-view="4" data-swiper-loop="true" data-aos="fade-up">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">

                                    <figure class="product-img mb-15">
                                        <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-1.png" alt="Product">
                                        </a>
                                    </figure>
                                    
                                    <div class="product-details">
                                        <div class="d-flex align-items-center justify-content-between gap-2">
                                            <span class="tag font-sm">Barber Shop</span>
                                            <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                        </div>
                                        <h6 class="product-title mb-0">
                                            <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-1.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                            <div class="product-price">
                                                <span class="h6 new-price">$350.00</span>
                                                <span class="prev-price font-sm">$400.00</span>
                                            </div>
                                            <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-2.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="d-flex align-items-center justify-content-between gap-2">
                                            <span class="tag font-sm">Barber Shop</span>
                                            <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                        </div>
                                        <h6 class="product-title mb-0">
                                            <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-2.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                            <div class="product-price">
                                                <span class="h6 new-price">$350.00</span>
                                                <span class="prev-price font-sm">$400.00</span>
                                            </div>
                                            <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-3.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="d-flex align-items-center justify-content-between gap-2">
                                            <span class="tag font-sm">Barber Shop</span>
                                            <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                        </div>
                                        <h6 class="product-title mb-0">
                                            <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-3.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                            <div class="product-price">
                                                <span class="h6 new-price">$350.00</span>
                                                <span class="prev-price font-sm">$400.00</span>
                                            </div>
                                            <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-4.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="d-flex align-items-center justify-content-between gap-2">
                                            <span class="tag font-sm">Barber Shop</span>
                                            <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                        </div>
                                        <h6 class="product-title mb-0">
                                            <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-4.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                            <div class="product-price">
                                                <span class="h6 new-price">$350.00</span>
                                                <span class="prev-price font-sm">$400.00</span>
                                            </div>
                                            <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-5.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="d-flex align-items-center justify-content-between gap-2">
                                            <span class="tag font-sm">Barber Shop</span>
                                            <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                        </div>
                                        <h6 class="product-title mb-0">
                                            <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-5.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                            <div class="product-price">
                                                <span class="h6 new-price">$350.00</span>
                                                <span class="prev-price font-sm">$400.00</span>
                                            </div>
                                            <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                        </div>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination position-static" id="product-slider-1-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service-area end -->

    <!-- Action banner start -->
    <section class="action-banner">
        <div class="container">
            <div class="wrapper radius-md pt-40 px-60 bg-img bg-cover" data-bg-image="assets/images/banner/action-banner-bg-1.png">
                <div class="row align-items-center gx-xl-5">
                    <div class="col-lg-6">
                        <div class="content-title mb-40" data-aos="fade-up">
                            <h2 class="title color-white mb-25">
                                Now Get 50% Discount For First Booking
                            </h2>
                            <p class="color-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur
                                nam eos debitis, sequi cupiditate repudiandae accusamus provident expedita omnis rem
                                facere.</p>
                            <div class="mt-30">
                                <a href="javaScript:void(0)" class="btn btn-lg btn-primary btn-gradient icon-start" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self"><i class="fal fa-calendar-check"></i>Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image mb-40" data-aos="fade-left">
                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/banner/action-banner-1.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Action banner end -->

    <!-- Service-area start -->
    <section class="service-area service-1 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-20">Most Popular Booking Services We Offer</h2>
                        <div class="tabs-navigation">
                            <ul class="nav nav-tabs flex-wrap" data-hover="fancyHover">
                                <li class="nav-item active">
                                    <button class="nav-link hover-effect active btn-md radius-sm" data-bs-toggle="tab" data-bs-target="#tab1" type="button">All Services</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link hover-effect btn-md radius-sm" data-bs-toggle="tab" data-bs-target="#tab2" type="button">Barber Shop</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link hover-effect btn-md radius-sm" data-bs-toggle="tab" data-bs-target="#tab3" type="button">Doctor</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link hover-effect btn-md radius-sm" data-bs-toggle="tab" data-bs-target="#tab4" type="button">Fitness Center</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link hover-effect btn-md radius-sm" data-bs-toggle="tab" data-bs-target="#tab4" type="button">Lawyer</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content" data-aos="fade-up">
                        <div class="tab-pane slide show active" id="tab1">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-5.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-1.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-6.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-2.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-7.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-3.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-8.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-4.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-9.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-5.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-10.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-6.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-11.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-7.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-12.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-8.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                            </div>
                            <div class="cta-btn text-center mt-15">
                                <a href="services.html" class="btn btn-lg btn-primary btn-gradient icon-start" title="View More" target="_self"><i class="fal fa-arrow-right"></i>View More</a>
                            </div>
                        </div>
                        <div class="tab-pane slide" id="tab2">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-5.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-1.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-6.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-2.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-7.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-3.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-8.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-4.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-9.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-5.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-10.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-6.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-11.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-7.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-12.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-8.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                            </div>
                            <div class="cta-btn text-center mt-15">
                                <a href="services.html" class="btn btn-lg btn-primary btn-gradient icon-start" title="View More" target="_self"><i class="fal fa-arrow-right"></i>View More</a>
                            </div>
                        </div>
                        <div class="tab-pane slide" id="tab3">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-5.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-1.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-6.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-2.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-7.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-3.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-8.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-4.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-9.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-5.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-10.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-6.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-11.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-7.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-12.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-8.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                            </div>
                            <div class="cta-btn text-center mt-15">
                                <a href="services.html" class="btn btn-lg btn-primary btn-gradient icon-start" title="View More" target="_self"><i class="fal fa-arrow-right"></i>View More</a>
                            </div>
                        </div>
                        <div class="tab-pane slide" id="tab4">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-5.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-1.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-6.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-2.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-7.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-3.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-8.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-4.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-9.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-5.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-10.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-6.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-11.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-7.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                    <div class="product-default border radius-md p-15 mb-25">
                                        <figure class="product-img mb-15">
                                            <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/services/service-12.png" alt="Product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="d-flex align-items-center justify-content-between gap-2">
                                                <span class="tag font-sm">Barber Shop</span>
                                                <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                    <i class="fal fa-heart"></i>
                                                </a>
                                            </div>
                                            <h6 class="product-title mb-0">
                                                <a href="service-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                            </h6>
                                            <div class="author mb-10 mt-10">
                                                <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-8.jpg" alt="Image">
                                                <span class="font-sm">
                                                    By <a href="javaScript:void(0)" target="_self" title="John Doe">John
                                                        Doe</a>
                                                </span>
                                            </div>
                                            <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                                tower, Road : 1285, Usa</span>
                                            <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                                <div class="product-price">
                                                    <span class="h6 new-price">$350.00</span>
                                                    <span class="prev-price font-sm">$400.00</span>
                                                </div>
                                                <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                </div>
                            </div>
                            <div class="cta-btn text-center mt-15">
                                <a href="services.html" class="btn btn-lg btn-primary btn-gradient icon-start" title="View More" target="_self"><i class="fal fa-arrow-right"></i>View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service-area end -->

    <!-- Shop-area start -->
    <section class="shop-area shop-1 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">Our Top Featured Shop</h2>
                        <a href="vendors.html" class="btn btn-lg btn-primary btn-gradient icon-start" title="View All Shop" target="_self"><i class="fal fa-arrow-right"></i>View All Shop</a>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Slider main container -->
                    <div class="swiper product-slider" id="product-slider-2" data-slides-per-view="4" data-swiper-loop="true" data-aos="fade-up">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="vendor-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/vendor/shop-1.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h6 class="product-title mb-0">
                                            <a href="vendor-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-1.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="vendor-details.html" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center gap-15 mt-10">
                                            <a href="vendor-details.html" class="btn btn-sm btn-outline-2" title="Visit Store" target="_self">Visit Store</a>
                                            <span class="font-sm">10+ Service Available</span>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="vendor-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/vendor/shop-2.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h6 class="product-title mb-0">
                                            <a href="vendor-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-2.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="vendor-details.html" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center gap-15 mt-10">
                                            <a href="vendor-details.html" class="btn btn-sm btn-outline-2" title="Visit Store" target="_self">Visit Store</a>
                                            <span class="font-sm">10+ Service Available</span>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="vendor-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/vendor/shop-3.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h6 class="product-title mb-0">
                                            <a href="vendor-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-3.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="vendor-details.html" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center gap-15 mt-10">
                                            <a href="vendor-details.html" class="btn btn-sm btn-outline-2" title="Visit Store" target="_self">Visit Store</a>
                                            <span class="font-sm">10+ Service Available</span>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="vendor-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/vendor/shop-4.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h6 class="product-title mb-0">
                                            <a href="vendor-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-4.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="vendor-details.html" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center gap-15 mt-10">
                                            <a href="vendor-details.html" class="btn btn-sm btn-outline-2" title="Visit Store" target="_self">Visit Store</a>
                                            <span class="font-sm">10+ Service Available</span>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">
                                    <figure class="product-img mb-15">
                                        <a href="vendor-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/vendor/shop-5.png" alt="Product">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h6 class="product-title mb-0">
                                            <a href="vendor-details.html" target="_self" title="City Tower Barber Shop">City Tower Barber Shop</a>
                                        </h6>
                                        <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/avatar-5.jpg" alt="Image">
                                            <span class="font-sm">
                                                By <a href="vendor-details.html" target="_self" title="John Doe">John
                                                    Doe</a>
                                            </span>
                                        </div>
                                        <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            tower, Road : 1285, Usa</span>
                                        <div class="d-flex align-items-center gap-15 mt-10">
                                            <a href="vendor-details.html" class="btn btn-sm btn-outline-2" title="Visit Store" target="_self">Visit Store</a>
                                            <span class="font-sm">10+ Service Available</span>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div>
                        </div>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination position-static" id="product-slider-2-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop-area end -->

    <!-- Testimonial-area start -->
    <section class="testimonial-area testimonial-1 parallax pb-60">
        <div class="container container-lg-fluid">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-6">
                    <div class="fluid-left">
                        <div class="content-title mb-40" data-aos="fade-up">
                            <h2 class="title mb-20">
                                What Customers Say About Our Booking Systems
                            </h2>
                            <div class="content-text mb-40">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum omnis natus cumque
                                    possimus dicta suscipit enim, aperiam, voluptatum quis deleniti.
                                </p>
                            </div>
                        </div>
                        <div class="swiper mb-40" id="testimonial-slider-1" data-aos="fade-up">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slider-item radius-md">
                                        <div class="client gap-20 flex-wrap">
                                            <div class="client-info d-flex align-items-center">
                                                <div class="client-img">
                                                    <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                        <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/avatar-1.jpg" alt="Person Image">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h6 class="name mb-0">Hames Rodrigo</h6>
                                                    <span class="designation font-sm">UI/UX Designer</span>
                                                </div>
                                            </div>
                                            <div class="ratings size-md flex-column align-items-start">
                                                <div class="rate">
                                                    <div class="rating-icon"></div>
                                                </div>
                                                <div class="ratings-total mt-2">5 star of 20 review</div>
                                            </div>
                                        </div>
                                        <div class="quote">
                                            <span class="icon"><i class="fal fa-quote-right"></i></span>
                                            <p class="text font-lg mb-0">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam,
                                                exercitationem quibusdam ipsa in illum vel deleniti aliquid dicta
                                                voluptates accusamus esse? Suscipit quasi nihil, similique.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slider-item radius-md">
                                        <div class="client gap-20 flex-wrap">
                                            <div class="client-info d-flex align-items-center">
                                                <div class="client-img">
                                                    <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                        <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/avatar-2.jpg" alt="Person Image">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h6 class="name mb-0">Hames Rodrigo</h6>
                                                    <span class="designation font-sm">UI/UX Designer</span>
                                                </div>
                                            </div>
                                            <div class="ratings size-md flex-column align-items-start">
                                                <div class="rate">
                                                    <div class="rating-icon"></div>
                                                </div>
                                                <div class="ratings-total mt-2">5 star of 20 review</div>
                                            </div>
                                        </div>
                                        <div class="quote">
                                            <span class="icon"><i class="fal fa-quote-right"></i></span>
                                            <p class="text font-lg mb-0">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam,
                                                exercitationem quibusdam ipsa in illum vel deleniti aliquid dicta
                                                voluptates accusamus esse? Suscipit quasi nihil, similique.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slider-item radius-md">
                                        <div class="client gap-20 flex-wrap">
                                            <div class="client-info d-flex align-items-center">
                                                <div class="client-img">
                                                    <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                        <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/avatar-3.jpg" alt="Person Image">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h6 class="name mb-0">Hames Rodrigo</h6>
                                                    <span class="designation font-sm">UI/UX Designer</span>
                                                </div>
                                            </div>
                                            <div class="ratings size-md flex-column align-items-start">
                                                <div class="rate">
                                                    <div class="rating-icon"></div>
                                                </div>
                                                <div class="ratings-total mt-2">5 star of 20 review</div>
                                            </div>
                                        </div>
                                        <div class="quote">
                                            <span class="icon"><i class="fal fa-quote-right"></i></span>
                                            <p class="text font-lg mb-0">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam,
                                                exercitationem quibusdam ipsa in illum vel deleniti aliquid dicta
                                                voluptates accusamus esse? Suscipit quasi nihil, similique.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination position-static mt-30" id="testimonial-slider-1-pagination">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="image mb-40 parallax-img" data-speed="0.5" data-revert="true">
                        <img class="lazyload blur-up" src="assets/images/placeholder.png" data-src="assets/images/testimonial-img-1.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial-area end -->

    <!-- Footer-area start -->
    <footer class="footer-area mt-30 bg-primary-light">
        <div class="go-top"><i class="fal fa-long-arrow-up"></i></div>
        <div class="footer-top pt-100 pb-70 text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5" data-aos="fade-up">
                        <div class="navbar-brand mt-10">
                            <span></span>
                            <a href="index.html" target="_self" title="Link">
                                <img src="assets/images/logo/logo-1.png" alt="Brand Logo">
                            </a>
                            <span></span>
                        </div>
                        <ul class="info-list mt-20">
                            <li>
                                <a href="mailto:live@example.com">live@example.com</a>
                            </li>
                            <li>
                                <a href="tel:9992233555">+999 22 33 5555</a>
                            </li>
                        </ul>
                        <div class="social-link mt-20">
                            <a href="https://www.instagram.com/" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.dribbble.com/" target="_blank" title="dribbble"><i class="fab fa-dribbble"></i></a>
                            <a href="https://www.twitter.com/" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/" target="_blank" title="youtube"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="newsletter-form mx-auto mt-30">
                            <form id="newsletterForm">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter email here..." type="text" name="EMAIL" required="" autocomplete="off">
                                    <button class="btn btn-md btn-primary btn-gradient no-animation" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                        <ul class="footer-links list-unstyled mt-30">
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" target="_self" title="link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="about-us.html" class="nav-link" target="_self" title="link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="services.html" class="nav-link" target="_self" title="link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="vendors.html" class="nav-link" target="_self" title="link">Shops</a>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link" target="_self" title="link">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-area border-top ptb-30">
            <div class="container">
                <div class="copy-right-content">
                    <span>
                        Copyright <i class="fal fa-copyright"></i><span id="footerDate"></span> <a href="index.html" target="_self" title="Bookapp" class="color-primary">Bookapp</a>. All Rights Reserved
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area end-->

    <!-- Booking Modal Start -->
    <div class="modal booking-modal fade" id="makeBooking" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-md-down">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
                <div class="modal-body">
                    <div class="bs-stepper" id="booking-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#staff">
                                <button type="button" class="step-trigger" role="tab" aria-controls="staff" id="staff-trigger">
                                    <span class="h3 mb-1">01</span>
                                    <span class="bs-stepper-circle"><i class="fal fa-user-circle"></i></span>
                                    <span class="bs-stepper-label">Staff</span>
                                </button>
                            </div>
                            <div class="step" data-target="#time">
                                <button type="button" class="step-trigger" role="tab" aria-controls="time" id="time-trigger">
                                    <span class="h3 mb-1">02</span>
                                    <span class="bs-stepper-circle"><i class="fal fa-clock"></i></span>
                                    <span class="bs-stepper-label">Time</span>
                                </button>
                            </div>
                            <div class="step" data-target="#info">
                                <button type="button" class="step-trigger" role="tab" aria-controls="info" id="info-trigger">
                                    <span class="h3 mb-1">03</span>
                                    <span class="bs-stepper-circle"><i class="fal fa-clipboard-list-check"></i></span>
                                    <span class="bs-stepper-label">Information</span>
                                </button>
                            </div>
                            <div class="step" data-target="#payment">
                                <button type="button" class="step-trigger" role="tab" aria-controls="payment" id="payment-trigger">
                                    <span class="h3 mb-1">04</span>
                                    <span class="bs-stepper-circle"><i class="fal fa-credit-card"></i></span>
                                    <span class="bs-stepper-label">Payment</span>
                                </button>
                            </div>
                            <div class="step" data-target="#confirm">
                                <button type="button" class="step-trigger" role="tab" aria-controls="confirm" id="confirm-trigger">
                                    <span class="h3 mb-1">05</span>
                                    <span class="bs-stepper-circle"><i class="fal fa-check-circle"></i></span>
                                    <span class="bs-stepper-label">Confirmation</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <div class="container">
                                <div id="staff" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="staff-trigger">
                                    <!-- Staff-area start -->
                                    <div class="staff-area pt-4">
                                        <div class="section-title title-center mb-40">
                                            <h3 class="title mb-20">Find Or Choose Your Staff</h3>
                                            <div class="search-inline-form w-75 w-sm-100 mx-auto">
                                                <form action="#">
                                                    <div class="input-inline">
                                                        <input type="search" class="form-control" placeholder="Enter staff name...">
                                                        <button class="btn btn-lg btn-primary btn-gradient no-animation icon-start" type="button" aria-label="Find Now">
                                                            <i class="far fa-search"></i>
                                                            Find Now
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="swiper staff-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="card radius-md">
                                                        <figure class="card-img">
                                                            <a href="javaScript:void(0)" onclick="bookingStepper.next()" target="_self" title="Image" class="lazy-container ratio ratio-2-3">
                                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/staff/staff-1.jpg" alt="Staff">
                                                            </a>
                                                        </figure>
                                                        <div class="card-details text-center p-20">
                                                            <h5 class="card-title mb-0"><a href="javaScript:void(0)" onclick="bookingStepper.next()" target="_self" title="Staff Name">Oliver Butler</a></h5>
                                                            <span class="card-category font-sm">user0123@gmail.com</span>
                                                            <a href="javaScript:void(0)" class="btn-text color-primary mt-10" title="Select Staff" target="_self">Select Staff</a>
                                                        </div>
                                                    </div><!-- card --> 
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="card radius-md">
                                                        <figure class="card-img">
                                                            <a href="javaScript:void(0)" onclick="bookingStepper.next()" target="_self" title="Image" class="lazy-container ratio ratio-2-3">
                                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/staff/staff-2.jpg" alt="Staff">
                                                            </a>
                                                        </figure>
                                                        <div class="card-details text-center p-20">
                                                            <h5 class="card-title mb-0"><a href="javaScript:void(0)" onclick="bookingStepper.next()" target="_self" title="Staff Name">Oliver Butler</a></h5>
                                                            <span class="card-category font-sm">user0123@gmail.com</span>
                                                            <a href="javaScript:void(0)" class="btn-text color-primary mt-10" title="Select Staff" target="_self">Select Staff</a>
                                                        </div>
                                                    </div><!-- card --> 
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="card radius-md">
                                                        <figure class="card-img">
                                                            <a href="javaScript:void(0)" onclick="bookingStepper.next()" target="_self" title="Image" class="lazy-container ratio ratio-2-3">
                                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/staff/staff-4.jpg" alt="Staff">
                                                            </a>
                                                        </figure>
                                                        <div class="card-details text-center p-20">
                                                            <h5 class="card-title mb-0"><a href="javaScript:void(0)" onclick="bookingStepper.next()" target="_self" title="Staff Name">Oliver Butler</a></h5>
                                                            <span class="card-category font-sm">user0123@gmail.com</span>
                                                            <a href="javaScript:void(0)" class="btn-text color-primary mt-10" title="Select Staff" target="_self">Select Staff</a>
                                                        </div>
                                                    </div><!-- card --> 
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="card radius-md">
                                                        <figure class="card-img">
                                                            <a href="javaScript:void(0)" onclick="bookingStepper.next()" target="_self" title="Image" class="lazy-container ratio ratio-2-3">
                                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/staff/staff-3.jpg" alt="Staff">
                                                            </a>
                                                        </figure>
                                                        <div class="card-details text-center p-20">
                                                            <h5 class="card-title mb-0"><a href="javaScript:void(0)" onclick="bookingStepper.next()" target="_self" title="Staff Name">Oliver Butler</a></h5>
                                                            <span class="card-category font-sm">user0123@gmail.com</span>
                                                            <a href="javaScript:void(0)" class="btn-text color-primary mt-10" title="Select Staff" target="_self">Select Staff</a>
                                                        </div>
                                                    </div><!-- card --> 
                                                </div>
                                            </div>
                                            <div class="swiper-pagination position-static mt-10" id="staff-slider-pagination"></div>
                                        </div>
                                        <div class="text-center mt-10">
                                            <a href="javaScript:void(0)" class="btn-text color-primary icon-end" onclick="bookingStepper.next()" target="_self" title="Next Step">Next Step <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- Staff-area end -->
                                </div>
                                <div id="time" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="time-trigger">
                                    <div class="calender-area pt-4">
                                        <div class="section-title title-center mb-40">
                                            <h3 class="title">Set Your Available Time</h3>
                                        </div>
                                        <div class="booking-calendar mb-30"></div>
                                        <div class="booking-time">
                                            <h6 class="text-center mb-20">Our Available Schedule For You</h6>
                                            <div class="swiper booking-time-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item border radius-sm">
                                                        <i class="fal fa-clock"></i>
                                                        <div class="time d-flex flex-column gap-1">
                                                            <span>10.00 am</span>
                                                            <span>12.00 pm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-scrollbar position-static mt-10"></div>
                                            </div>
                                        </div>
                                        <div class="btn-groups justify-content-center w-100 mt-20">
                                            <a href="javaScript:void(0)" class="btn-text color-primary icon-start" onclick="bookingStepper.previous()" target="_self" title="Next Step"><i class="fal fa-long-arrow-left"></i>Prev Step</a>
                                            <a href="javaScript:void(0)" class="btn-text color-primary icon-end" onclick="bookingStepper.next()" target="_self" title="Next Step">Next Step <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="info" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="staff-trigger">
                                    <!-- Authentication-area start -->
                                    <div class="authentication-area pt-1">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="auth-form mt-3">
                                                    <form>
                                                        <div class="title mb-40">
                                                            <span class="h3 mb-0">Sign In</span>
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <label for="userName" class="form-label color-dark">Email/Username<span class="color-red">*</span></label>
                                                            <input type="text" name="user_name" id="userName" class="form-control" placeholder="Username" required>
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <label for="password" class="form-label color-dark">Password<span class="color-red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                                                                <div data-toggle="#password" class="show-password-field">
                                                                    <i class="show-icon"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="javaScript:void(0)" class="btn btn-lg btn-primary btn-gradient" title="Sign In" target="_self">Sign In</a>
                                                        <div class="link mt-20">
                                                            Don't have an account? <a href="signup.html">Click Here</a> to Signup
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="btn-groups mt-30">
                                                    <a href="javaScript:void(0)" class="btn-text color-primary icon-start" onclick="bookingStepper.previous()" target="_self" title="Next Step"><i class="fal fa-long-arrow-left"></i>Prev Step</a>
                                                    <a href="javaScript:void(0)" class="btn-text color-primary icon-end" onclick="bookingStepper.next()" target="_self" title="Next Step">Next Step <i class="fal fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="auth-form mt-3">
                                                    <form>
                                                        <div class="title mb-40">
                                                            <span class="h3 mb-0">Create Account</span>
                                                        </div>
                                                        <div class="row gx-3">
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-20">
                                                                    <label for="firstName" class="form-label color-dark">First Name<span class="color-red">*</span></label>
                                                                    <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Enter first name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-20">
                                                                    <label for="lastName" class="form-label color-dark">Last Name</label>
                                                                    <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Enter last name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group mb-20">
                                                                    <label for="email" class="form-label color-dark">Email Address<span class="color-red">*</span></label>
                                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your email address" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group mb-20">
                                                                    <label for="password2" class="form-label color-dark">Password<span class="color-red">*</span></label>
                                                                    <div class="position-relative">
                                                                        <input type="password" name="password" id="password2" class="form-control" placeholder="Enter password" required>
                                                                        <div data-toggle="#password" class="show-password-field">
                                                                            <i class="show-icon"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="custom-checkbox mb-20">
                                                                    <input class="input-checkbox" type="checkbox" name="checkbox" id="checkbox5" value="">
                                                                    <label class="form-check-label" for="checkbox5">I agree with Terms & Conditions <span class="color-red">*</span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="javaScript:void(0)" class="btn btn-lg btn-primary btn-gradient" title="Create Account" target="_self">Create Account</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Authentication-area end -->
                                </div>
                                <div id="payment" class="bs-stepper-pane fade" role="tabpanel">
                                    <div class="payment-area pt-4">
                                        <div class="section-title title-center mb-40">
                                            <h3 class="title col-lg-8">Choose Your Perfect Payment method For Booking</h3>
                                        </div>
                                        <div class="payment-form w-50 w-sm-100 mx-auto">
                                            <form>
                                                <div class="form-group">
                                                    <select id="payment-gateway" class="form-control form-select">
                                                        <option value="Paypal" selected="">Paypal</option>
                                                        <option value="Flutterwave">Flutterwave</option>
                                                        <option value="Razorpay">Razorpay</option>
                                                        <option value="Paytm">Paytm</option>
                                                        <option value="Paystack">Paystack</option>
                                                        <option value="Flutterwave">Flutterwave</option>
                                                        <option value="Razorpay">Razorpay</option>
                                                        <option value="Paytm">Paytm</option>
                                                        <option value="Paystack">Paystack</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="btn-groups justify-content-center w-100 mt-20">
                                            <a href="javaScript:void(0)" class="btn-text color-primary icon-start" onclick="bookingStepper.previous()" target="_self" title="Next Step"><i class="fal fa-long-arrow-left"></i>Prev Step</a>
                                            <a href="javaScript:void(0)" class="btn-text color-primary icon-end" onclick="bookingStepper.next()" target="_self" title="Next Step">Next Step <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="confirm" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="confirm-trigger">
                                    <div class="confirm-area pt-4">
                                        <div class="section-title title-center mb-40">
                                            <h3 class="title col-lg-8">congratulations Your Booking Completed</h3>
                                        </div>
                                        <div class="image text-center">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/book-success.png" alt="Image">
                                        </div>
                                        <div class="btn-groups justify-content-center w-100 mt-20">
                                            <a href="javaScript:void(0)" class="btn-text color-primary icon-start" onclick="bookingStepper.previous()" target="_self" title="Next Step"><i class="fal fa-long-arrow-left"></i>Prev Step</a>
                                            <a href="javaScript:void(0)" class="btn-text color-primary" title="Back to Home" target="_self" data-bs-dismiss="modal" aria-label="Close">Back to Home</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Modal End -->

    <!-- Jquery JS -->
     
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('frontend/assets/js/vendors/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/vendors/bootstrap.min.js') }}"></script>
    <!-- Data Tables JS -->
    <script src="{{ asset('frontend/assets/js/vendors/datatables.min.js') }}"></script>
    <!-- Date-range Picker JS -->
    <script src="{{ asset('frontend/assets/js/vendors/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/daterangepicker.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('frontend/assets/js/vendors/jquery.nice-select.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('frontend/assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <!-- Calendar js -->
    <script src="{{ asset('frontend/assets/js/vendors/pignose.calendar.full.min.js') }}"></script>
    <!-- Swiper Slider JS -->
    <script src="{{ asset('frontend/assets/js/vendors/swiper-bundle.min.js') }}"></script>
    <!-- Lazysizes -->
    <script src="{{ asset('frontend/assets/js/vendors/lazysizes.min.js') }}"></script>
    <!-- Noui Range Slider JS -->
    <script src="{{ asset('frontend/assets/js/vendors/nouislider.min.js') }}"></script>
    <!-- Twinmax JS -->
    <script src="{{ asset('frontend/assets/js/vendors/tweenMax.min.js') }}"></script>
    <!-- Simple Parallax JS -->
    <script src="{{ asset('frontend/assets/js/vendors/parallax.min.js') }}"></script>
    <!-- AOS JS -->
    <script src="{{ asset('frontend/assets/js/vendors/aos.min.js') }}"></script>
    <!-- Mouse Hover JS -->
    <script src="{{ asset('frontend/assets/js/vendors/mouse-hover-move.js') }}"></script>
    <!--====== Stepper js ======-->
    <script src="{{ asset('frontend/assets/js/vendors/bs-stepper.min.js') }}"></script>
    <!-- Main script JS -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
</body>


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:32:47 GMT -->
</html>