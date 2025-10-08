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
                        <img src="{{ asset('/images/logo/logo-1.png') }}" alt="Brand logo">
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
                             
                        </ul>
                    </div>
                    <div class="more-option mobile-item ">
                        <div class="item">
                            <div class="language">
                                <select class="niceselect" onchange="window.location.href='{{ route('lang', ['en']) }}'">
                                    <option value="1">{{ __('app.english') }}</option>
                                    <option value="2">{{ __('app.dutch') }}</option> 
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
    @yield('content')
    <footer class="footer-area mt-30 bg-primary-light">
        <div class="go-top"><i class="fal fa-long-arrow-up"></i></div>
        <div class="footer-top pt-100 pb-70 text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5" data-aos="fade-up">
                        <div class="navbar-brand mt-10">
                            <span></span>
                            <a href="index.html" target="_self" title="Link">
                                <img src="{{ asset('frontend/assets/images/logo/logo-1.png') }}" alt="Brand Logo">
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
                                                                <img class="lazyload" src="{{ asset('frontend/assets/images/placeholder.png') }}" data-src="{{ asset('frontend/assets/images/staff/staff-1.jpg') }}" alt="Staff">
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
                                                                <img class="lazyload" src="{{ asset('frontend/assets/images/placeholder.png') }}" data-src="{{ asset('frontend/assets/images/staff/staff-2.jpg') }}" alt="Staff">
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
                                                                <img class="lazyload" src="{{ asset('frontend/assets/images/placeholder.png') }}" data-src="{{ asset('frontend/assets/images/staff/staff-4.jpg') }}" alt="Staff">
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
                                                                <img class="lazyload" src="{{ asset('frontend/assets/images/placeholder.png') }}" data-src="{{ asset('frontend/assets/images/staff/staff-3.jpg') }}" alt="Staff">
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
    @yield('scripts')

</body>


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:32:47 GMT -->
</html>