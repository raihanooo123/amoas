<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:33:23 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KreativDev">

    <!-- Title -->
    <title>AMOAS Registration</title>
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

    <!-- Authentication-area start -->
    <div class="authentication-area bg-light">
        <div class="container">
            <div class="row min-vh-75 align-items-center justify-content-center">
                <div class="col-lg-7 col-md-9 col-sm-10">
                    <div class="wrapper shadow-md radius-lg bg-white">
                        <div class="main-form p-25" style="max-width: 500px; margin: 0 auto;">
                            <a href="{{ url('/') }}" class="icon-link" title="Go back to home" target="_self"><i class="fal fa-home"></i></a>
                            <div class="text-center mb-20">
                                <a href="{{ url('/') }}" target="_self" title="AMOAS">
                                    <img src="{{ asset('/images/logo-dark.png') }}" alt="Logo" style="max-height: 50px;">
                                </a>
                            </div>
                            <div class="title text-center">
                                <h5 class="mb-20 fw-semibold">Signup to AMOAS</h5>
                            </div>
                            <form id="#authForm" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-15">
                                    <label for="first_name" class="form-label color-dark fs-6">{{ __('app.first_name') }}  <span class="color-red">*</span></label>
                                    <input type="text" name="first_name" id="first_name" class="form-control form-control-sm" placeholder="{{ __('app.first_name') }}" required>
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('first_name') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group mb-15">
                                    <label for="last_name" class="form-label color-dark fs-6">{{ __('app.last_name') }}<span class="color-red">*</span></label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control form-control-sm" placeholder="{{ __('app.last_name') }}" required>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('last_name') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group mb-15">
                                    <label for="phone_number" class="form-label color-dark fs-6">{{ __('app.phone_number') }}   <span class="color-red">*</span></label>
                                    <div class="position-relative">
                                        <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="form-control form-control-sm" placeholder="{{ __('app.phone_number') }}" required>
                                        <span class="show-password-field">
                                            <i class="show-icon"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone_number') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group mb-15">
                                    <label for="email" class="form-label color-dark fs-6">{{ __('app.email') }}   <span class="color-red">*</span></label>
                                    <div class="position-relative">
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control form-control-sm" placeholder="{{ __('app.email') }}" required>
                                        <span class="show-password-field">
                                            <i class="show-icon"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group mb-15">
                                    <label for="password3" class="form-label color-dark fs-6">{{ __('app.password') }}   <span class="color-red">*</span></label>
                                    <div class="position-relative">
                                        <input type="password" name="password" id="password3" value="{{ old('password') }}" class="form-control form-control-sm" placeholder="{{ __('app.password') }}" required>
                                        <span class="show-password-field">
                                            <i class="show-icon"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group mb-15">
                                    <label for="confirmPassword" class="form-label color-dark fs-6">{{ __('app.password_confirmation') }}   <span class="color-red">*</span></label>
                                    <div class="position-relative">
                                        <input type="password" name="password_confirmation" id="confirmPassword" class="form-control form-control-sm" placeholder="{{ __('app.password_confirmation') }}" required>
                                        <span class="show-password-field">
                                            <i class="show-icon"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group mb-15">
                                    <div class="custom-checkbox font-sm">
                                        <input class="input-checkbox" type="checkbox" name="checkbox" id="checkbox4" value="">
                                        <label class="form-check-label" for="checkbox4"><span> I agree with AMOAS's
                                            <a href="{{ route('privacy-policy') }}">Terms & Conditions</a></span></label>
                                    </div>
                                </div>
                                <div class="text-center mb-15">
                                    <button class="btn btn-primary btn-gradient w-100 btn-sm" type="submit" aria-label="Signup">Signup</button>
                                </div>
                                <div class="text-center" style="font-size: 0.8rem;">
                                    <div class="link">
                                        Already a member? <a href="{{ route('login') }}" target="_self" title="Login Now">Login Now</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Authentication-area end -->

    <!-- Booking Modal Start -->
 
    <!-- Booking Modal End -->

    <!-- Jquery JS -->
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


<!-- Mirrored from themeforest.kreativdev.com/bookapp/demo/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Oct 2025 16:33:23 GMT -->
</html> 