<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KreativDev">

    <!-- Title -->
    <title>{{ __('passwords.page_title') }} - AMOAS</title>
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
            <div class="row min-vh-75 align-items-center justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="wrapper shadow-md radius-lg bg-white">
                        <div class="main-form p-25" style="max-width: 400px; margin: 0 auto;">
                            <a href="{{ url('/') }}" class="icon-link" title="Go back to home" target="_self"><i
                                    class="fal fa-home"></i></a>
                            <div class="text-center mb-20">
                                <a href="{{ url('/') }}" target="_self" title="AMOAS">
                                    <img src="{{ asset('/images/logo-dark.png') }}" alt="Logo"
                                        style="max-height: 50px;">
                                </a>
                            </div>
                            <div class="title text-center">
                                <h5 class="mb-20 fw-semibold">{{ __('passwords.page_title') }}</h5>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif

                            <form method="post" action="{{ route('password.email') }}" class="auth-form" novalidate>
                                @csrf
                                <div class="form-group mb-15">
                                    <label for="email"
                                        class="form-label color-dark fs-6">{{ __('auth.email_placeholder') }}<span
                                            class="color-red">*</span></label>
                                    <input type="email" id="email" name="email"
                                        placeholder="{{ __('auth.email_placeholder') }}" value="{{ old('email') }}"
                                        class="form-control form-control-sm" autocomplete="email" required autofocus>
                                </div>

                                <div class="text-center mb-15">
                                    <button class="btn btn-primary btn-gradient w-100 btn-sm" type="submit"
                                        aria-label="Send Reset Link">{{ __('passwords.reset_btn') }}</button>
                                </div>
                                <div class="d-flex justify-content-between flex-wrap gap-1 text-center"
                                    style="font-size: 0.8rem;">
                                    <div class="link">
                                        {{ __('passwords.remembered') }}
                                    </div>
                                    <div class="link">
                                        <a href="{{ route('login') }}"
                                            title="Back to Login">{{ __('passwords.back_to_login_btn') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Authentication End -->

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

</html>
