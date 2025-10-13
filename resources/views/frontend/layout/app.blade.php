<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:32:25 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KreativDev">

    <!-- Title -->
    <title>AMOAS</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/logo-light.png') }}" type="image/x-icon">

    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600;700&amp;family=Poppins:wght@400;500;600&amp;display=swap"
        rel="stylesheet">
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
    @yield('styles')

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
                    <a href="{{ url('/') }}" target="_self" title="Superv">
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
                    <a class="navbar-brand" href="{{ url('/') }}" target="_self" title="Superv">
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
                                <select class="niceselect"
                                    onchange="window.location.href='{{ route('lang', ['en']) }}'">
                                    <option value="1">{{ __('app.english') }}</option>
                                    <option value="2">{{ __('app.dutch') }}</option>
                                </select>
                            </div>
                        </div>
                        @if (!Auth::user())
                            <div class="item d-flex p-2">
                                <a href="{{ route('login') }}"
                                    class="btn btn-md btn-primary btn-gradient icon-start mx-auto p-2" title="Login"
                                    target="_self"><i class="fal fa-sign-in-alt"></i> {{ __('auth.login_btn') }}</a>
                                &nbsp;
                                <a href="{{ route('register') }}"
                                    class="btn btn-md btn-primary btn-gradient icon-start" title="Login"
                                    target="_self"><i class="fal fa-sign-in-alt"></i>
                                    {{ __('auth.create_account') }}</a>
                            </div>
                        @else
                            <div class="collapse navbar-collapse">
                                <ul id="mainMenu" class="navbar-nav mobile-item mx-auto">
                                    <li class="nav-item">
                                        <a href="#home" class="nav-link toggle">{{ Auth::user()->first_name }}
                                            {{ Auth::user()->last_name }} <i class="fal fa-arrow-down"></i></a>
                                        <ul class="menu-dropdown">
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('home') }}">{{ __('backend.my_profile') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('changePassword') }}">{{ __('backend.change_password') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('backend.logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endif



                    </div>
                </nav>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="footer-area mt-30 bg-primary-light">
        <div class="go-top"><i class="fal fa-long-arrow-up"></i></div>
        <div class="footer-top pt-40 pb-30 text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5" data-aos="fade-up">
                        <div class="navbar-brand mt-10">
                            <span></span>
                            <a href="{{ url('/') }}" target="_self" title="Link">
                                <img src="{{ asset('/images/logo-dark.png') }}" alt="Brand Logo">
                            </a>
                            <span></span>
                        </div>
                        <ul class="info-list mt-15">
                            <li>
                                <a href="mailto:live@example.com">live@example.com</a>
                            </li>
                            <li>
                                <a href="tel:9992233555">+999 22 33 5555</a>
                            </li>
                        </ul>
                        <div class="social-link mt-15">
                            <a href="https://www.instagram.com/" target="_blank" title="instagram"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://www.dribbble.com/" target="_blank" title="dribbble"><i
                                    class="fab fa-dribbble"></i></a>
                            <a href="https://www.twitter.com/" target="_blank" title="twitter"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/" target="_blank" title="youtube"><i
                                    class="fab fa-youtube"></i></a>
                        </div>
                        {{-- <div class="newsletter-form mx-auto mt-30">
                            <form id="newsletterForm">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter email here..." type="text" name="EMAIL" required="" autocomplete="off">
                                    <button class="btn btn-md btn-primary btn-gradient no-animation" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div> --}}
                        <br>
                        <ul class="footer-links list-unstyled mt-20">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link" target="_self"
                                    title="link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="about-us.html" class="nav-link" target="_self" title="link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="services.html" class="nav-link" target="_self" title="link">Register</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-area border-top ptb-15">
            <div class="container">
                <div class="copy-right-content">
                    <span>
                        Copyright <i class="fal fa-copyright"></i><span id="footerDate">
                        </span> <a href="index.html" target="_self" title="Bookapp"
                            class="color-primary">َAMOAS</a>. All Rights Reserved
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area end-->



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
    <script src="{{ asset(mix('/js/app.js')) }}"></script>

    @yield('scripts')

</body>


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:32:47 GMT -->

</html>
