<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KreativDev">

    <title>AMOAS Registration</title>
    <link rel="shortcut icon" href="{{ asset('/images/logo-light.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600;700&amp;family=Poppins:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/bs-stepper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/pignose.calendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendors/animate.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
</head>

<body class="theme-color-1">
    <div id="preLoader">
        <div class="loader"></div>
    </div>
    <div class="authentication-area bg-light" style="min-height: 100vh;">
        <div class="container">
            <div class="row min-vh-100 align-items-center justify-content-center py-5">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="wrapper shadow-lg radius-xl bg-white p-30 p-sm-50">
                        <div class="main-form" style="margin: 0 auto;">
                            <div class="text-center mb-40">
                                <a href="{{ url('/') }}" target="_self" title="AMOAS">
                                    <img src="{{ asset('/images/logo-dark.png') }}" alt="Logo" style="max-height: 60px;">
                                </a>
                            </div>

                            <div class="title text-center mb-30">
                                <h3 class="mb-10 fw-bold color-dark">Create Your AMOAS Account</h3>
                                <p class="color-heading fs-6">Enter your details to get started.</p>
                            </div>

                            <form id="authForm" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-20">
                                            <label for="first_name" class="form-label color-dark fs-6 fw-medium">{{ __('app.first_name') }}  <span class="color-red">*</span></label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="{{ __('app.first_name') }}" required>
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback d-block mt-1" role="alert"><strong>{{ $errors->first('first_name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-20">
                                            <label for="last_name" class="form-label color-dark fs-6 fw-medium">{{ __('app.last_name') }}<span class="color-red">*</span></label>
                                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="{{ __('app.last_name') }}" required>
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback d-block mt-1" role="alert"><strong>{{ $errors->first('last_name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-20">
                                            <label for="phone_number" class="form-label color-dark fs-6 fw-medium">{{ __('app.phone_number') }}   <span class="color-red">*</span></label>
                                            <div class="position-relative">
                                                <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="{{ __('app.phone_number') }}" required>
                                            </div>
                                            @if ($errors->has('phone_number'))
                                                <span class="invalid-feedback d-block mt-1" role="alert"><strong>{{ $errors->first('phone_number') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-20">
                                            <label for="email" class="form-label color-dark fs-6 fw-medium">{{ __('app.email') }}   <span class="color-red">*</span></label>
                                            <div class="position-relative">
                                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="{{ __('app.email') }}" required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback d-block mt-1" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <label for="password3" class="form-label color-dark fs-6 fw-medium">{{ __('app.password') }}   <span class="color-red">*</span></label>
                                            <div class="position-relative">
                                                <input type="password" name="password" id="password3" class="form-control" placeholder="{{ __('app.password') }}" required>
                                                <span class="show-password-field">
                                                    <i class="show-icon"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback d-block mt-1" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <label for="confirmPassword" class="form-label color-dark fs-6 fw-medium">{{ __('app.password_confirmation') }}   <span class="color-red">*</span></label>
                                            <div class="position-relative">
                                                <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" placeholder="{{ __('app.password_confirmation') }}" required>
                                                <span class="show-password-field">
                                                    <i class="show-icon"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="invalid-feedback d-block mt-1" role="alert"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-40">
                                    <div class="custom-checkbox font-sm">
                                        <input class="input-checkbox" type="checkbox" name="checkbox" id="checkbox4" value="" required>
                                        <label class="form-check-label" for="checkbox4"><span> I agree with AMOAS's
                                            <a href="{{ route('privacy-policy') }}" class="text-primary fw-medium">Terms & Conditions</a></span></label>
                                    </div>
                                </div>

                                <div class="text-center mb-20">
                                    <button class="btn btn-primary btn-gradient w-100" type="submit" aria-label="Signup">
                                        <span class="fw-bold fs-6">Sign Up</span>
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="font-sm color-heading">
                                        Already have an account? <a href="{{ route('login') }}" class="text-primary fw-medium" target="_self" title="Login Now">Login Now</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend/assets/js/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/datatables.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/daterangepicker.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/pignose.calendar.full.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/swiper-bundle.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/lazysizes.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/tweenMax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/aos.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/mouse-hover-move.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
</body>


</html>