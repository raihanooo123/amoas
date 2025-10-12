<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:33:22 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KreativDev">

    <!-- Title -->
    <title>AMOAS Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/logo-light.png') }}" type="image/x-icon">

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
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/animate.min.css') }} ">
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

    <!-- Authentication Start -->
    <div class="authentication-area bg-light">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-12">
                    <div class="wrapper shadow-md radius-lg bg-white">
                        <div class="row align-items-center">
                            <div class="col-lg-6 bg-primary-light">
                                <div class="content">
                                    <div class="logo mb-3 p-30">
                                        <a href="index.html" target="_self" title="Teeno"><img src="{{ asset('/images/logo-dark.png') }}" alt="Logo"></a>
                                    </div>
                                    <div class="svg-image">
                                        <img class="lazyload" src="{{ asset('frontend/assets/images/banner/placeholder.png') }}" data-src="{{ asset('frontend/assets/images/banner/login.svg') }}" alt="Image">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="main-form">
                                    <a href="index.html" class="icon-link" title="Go back to home" target="_self"><i class="fal fa-home"></i></a>
                                    <div class="title">
                                        <h3 class="mb-30">Login to AMOAS</h3>
                                    </div>
                                    @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                                    <form method="post" action="{{ route('login') }}" class="auth-form" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-20">
                                                    <label for="userName2" class="form-label color-dark">{{ __('auth.email_placeholder') }}<span class="color-red">*</span></label>
                                                    <input type="text" id="email" name="email"
                                                    placeholder="{{ __('auth.email_placeholder') }}" value="{{ old('email') }}" class="form-control" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mb-20">
                                                    <label for="password" class="form-label color-dark">{{ __('auth.password_placeholder') }}<span class="color-red">*</span></label>
                                                    <div class="position-relative">
                                                        <input type="password" name="password" id="password" class="form-control" {{ __('auth.password_placeholder') }} required>
                                                        <span class="show-password-field">
                                                            <i class="show-icon"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="custom-checkbox mb-10 font-sm">
                                                    <input class="input-checkbox" type="checkbox" name="checkbox" id="checkbox4" value="">
                                                    <label class="form-check-label" for="checkbox4"><span> I agree with Teeno's <a href="{{ route('privacy-policy') }}">Terms & Conditions</a></span></label>
                                                </div>
                                                <div class="custom-checkbox mb-10 font-sm">
                                                    <input class="input-checkbox" type="checkbox" name="checkbox" id="checkbox5" value="">
                                                    <label class="form-check-label" for="checkbox5"><span>I’d like being informed about latest news and tips</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-10 mb-15">
                                            <button class="btn btn-lg btn-primary btn-gradient w-100" type="submit" aria-label="Login">{{ __('auth.login_btn') }}</button>
                                        </div>
                                        <div class="d-flex justify-content-between flex-wrap gap-2">
                                            <div class="link font-sm">
                                                <a href="{{ route('password.request') }}" title="Forgot Password">{{ __('auth.forgot_password_title') }}</a>
                                            </div>
                                            <div class="link font-sm">
                                                Don't have an account? <a href="{{ route('register') }}" title="Go Signup" target="_self">Click Here</a> to Signup
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Authentication End -->

    <!-- Add Review Modal Start -->
 
    <!-- Add Review Modal End -->

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
    <script src="{{ asset('frontend/assets/js/vendors/swiper-bundle.min.js') }} "></script>
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


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:33:23 GMT -->
</html>