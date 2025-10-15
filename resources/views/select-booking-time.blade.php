@extends('frontend.layout.app', ['title' => __('app.step_two_page_title')])

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection

@section('content')
    <!-- Modern Hero Section -->

    <div class="page-title-area bg-img bg-cover position-relative overflow-hidden"
        data-bg-image="{{ asset('images/promo.jpg') }}">
        <!-- Overlay with gradient -->
        <div class="page-title-overlay"></div>

        <!-- Animated particles -->
        <div class="particles-container">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
            <div class="particle particle-5"></div>
        </div>

        <div class="container position-relative">
            <div class="content text-center">
                <div class="page-title-content">
                    <h2 class="page-title animate-title">{{ __('app.my_profile') }}</h2>
                    <div class="title-divider"></div>
                    <nav aria-label="breadcrumb" class="breadcrumb-container">
                        <ol class="breadcrumb modern-breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="breadcrumb-link">
                                    <i class="fas fa-home mr-1"></i>{{ __('app.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span class="breadcrumb-current">
                                    <a href="/home"> <i class="fas fa-user-circle ml-1"></i>&nbsp
                                        {{ __('app.my_profile') }}</a>
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Decorative wave -->
        <div class="title-wave">
            <svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,60 C300,100 600,20 900,60 C1050,80 1200,40 1200,40 L1200,120 L0,120 Z"
                    fill="rgba(255,255,255,0.1)" />
            </svg>
        </div>
    </div>
    <div class="bg-gradient-primary position-relative overflow-hidden" style="margin-bottom: -100px !important;">
        <!-- Animated background elements -->
        <div class="hero-bg-animation">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
        </div>

        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 font-weight-bold animate-fade-in">
                        <i class="fas fa-calendar-alt mr-3 pulse-icon"></i>&nbsp {{ __('app.step_two_page_title') }}
                    </h1>
                    <p class="lead animate-fade-in-delay text-white-50">
                        Please provide your personal and contact information for the booking process.
                    </p>
                    <div class="hero-stats d-flex justify-content-center flex-wrap gap-4 animate-fade-in-delay-2">
                        <div class="stat-item glassmorphism">
                            <div class="stat-number">Step 2</div>
                            <div class="stat-label">of 4</div>
                        </div>
                        <div class="stat-item glassmorphism">
                            <div class="stat-number">50%</div>
                            <div class="stat-label">Complete</div>
                        </div>
                        <div class="stat-item glassmorphism">
                            <div class="stat-number">Secure</div>
                            <div class="stat-label">Form</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,60 C300,100 600,20 900,60 C1050,80 1200,40 1200,40 L1200,120 L0,120 Z"
                    fill="rgba(255,255,255,0.1)" />
            </svg>
        </div>
    </div>


    <form method="POST" action="{{ route('postStep2') }}" style="margin-top: -30px;">
        {{ csrf_field() }}
        <div class="container border rounded-3 shadow-sm" style="background: rgba(43, 59, 101, 0.08); color: #2b3b65;">
            <div class="content">
                <!-- Modern Progress Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress-wrapper">
                            <div class="progress-info text-center mb-4">
                                <small class="text-muted fw-bold">Booking Progress - Step 2 of 4</small>
                            </div>
                            <div class="progress modern-progress position-relative"
                                style="height: 35px; border-radius: 20px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);">
                                <div class="progress-bar progress-bar-striped progress-bar-animated position-relative"
                                    role="progressbar"
                                    style="width: 50%; height: 35px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    <span class="progress-text">50%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Booking Information Card -->
                <div class="row p-3">
                    <div class="col-md-12">
                        <div class="booking-info-card card shadow-sm hover-lift">
                            <div class="card-header bg-info text-white position-relative overflow-hidden">
                                <div class="card-header-bg"></div>
                                <h5 class="mb-0 position-relative">
                                    <i class="fas fa-user-circle mr-2"></i>{{ __('app.booking_for') }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('app.booking_for') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group {{ $errors->has('booking_for') ? 'has-danger' : '' }}">
                                            <select name="booking_for" required
                                                class="form-control form-control-lg modern-select {{ $errors->has('booking_for') ? 'is-invalid' : '' }}">
                                                <option value="" selected disabled>{{ __('app.select_option') }}
                                                </option>
                                                <option value="myself"
                                                    {{ old('booking_for') == 'myself' ? 'selected' : null }}>
                                                    {{ __('app.myself') }}
                                                </option>
                                                <option value="someone_else"
                                                    {{ old('booking_for') == 'someone_else' ? 'selected' : null }}>
                                                    {{ __('app.someone_else') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Card -->
                <div class="row p-3">
                    <div class="col-md-12">
                        <div class="contact-info-card card shadow-sm hover-lift">
                            <div class="card-header bg-success text-white position-relative overflow-hidden">
                                <div class="card-header-bg"></div>
                                <h5 class="mb-0 position-relative">
                                    <i class="fas fa-address-book mr-2"></i>Contact Information
                                </h5>
                            </div>
                            <div class="card-body" style="padding: 1.5rem;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.provide_address') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group mb-3">
                                            <input name="email" type="email" required
                                                class="form-control form-control-lg modern-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                value="{{ old('email') }}" placeholder="Enter your email address">
                                            <small class="form-text text-muted">{{ __('app.email_description') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.full_name') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group mb-3">
                                            <input name="full_name" type="text" required
                                                class="form-control form-control-lg modern-input {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                                value="{{ old('full_name') }}" placeholder="Enter your full name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.phone') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group mb-3">
                                            <input name="phone" type="text" required
                                                class="form-control form-control-lg modern-input {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                value="{{ old('phone') }}" placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.participant') }} <span
                                                class="text-muted">({{ __('app.optional') }})</span></label>
                                        <div class="form-group mb-3">
                                            <select name="participant"
                                                class="form-control form-control-lg modern-select {{ $errors->has('participant') ? 'is-invalid' : '' }}">
                                                <option value="" selected>{{ __('app.iam_alone') }}</option>
                                                @for ($i = 1; $i <= 9; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ old('participant') == $i ? 'selected' : null }}>
                                                        {{ trans_choice('app.family_member', $i, ['count' => $i]) }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Address Information Card -->
                <div class="row p-3">
                    <div class="col-md-12">
                        <div class="address-info-card card shadow-sm hover-lift">
                            <div class="card-header bg-info text-white position-relative overflow-hidden">
                                <div class="card-header-bg"></div>
                                <h5 class="mb-0 position-relative">
                                    <i class="fas fa-map-marker-alt mr-2"></i>Address Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.current_street_house') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group mb-3">
                                            <input name="street" type="text" required
                                                class="form-control form-control-lg modern-input {{ $errors->has('street') ? 'is-invalid' : '' }}"
                                                value="{{ old('street') }}"
                                                placeholder="Enter your street and house number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.postal') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group mb-3">
                                            <select id="postal-code" name="postal" required
                                                class="form-control form-control-lg modern-select {{ $errors->has('postal') ? 'is-invalid' : '' }}">
                                                <option value="">{{ __('app.select_option') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.current_city') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group mb-3">
                                            <select id="place" name="place" required
                                                class="form-control form-control-lg modern-select {{ $errors->has('place') ? 'is-invalid' : '' }}">
                                                <option value="">{{ __('app.select_option') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary btn-lg modern-btn pulse-on-hover">
                                        <i class="fas fa-arrow-right mr-2"></i>{!! __('pagination.next') !!}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div> <!-- Closing the container div -->

        <!-- Bottom spacing -->
        <div style="height: 100px;"></div>

        <!-- Modern Footer -->
        {{-- <footer class="modern-footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="footer-info">
                            <p class="mb-0 text-muted">
                                <i class="fas fa-copyright mr-1"></i>
                                {{ __('auth.copyrights') }} &copy; {{ date('Y') }} {{ __('auth.rights_reserved') }}
                                <strong>{{ config('settings.business_name', 'Bookify') }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-secondary btn-lg mr-2 modern-btn" onclick="history.back()">
                            <i class="fas fa-arrow-left mr-2"></i>{!! __('pagination.previous') !!}
                        </button>
                        <button type="submit" class="btn btn-primary btn-lg modern-btn">
                            <i class="fas fa-arrow-right mr-2"></i>{!! __('pagination.next') !!}
                        </button>
                    </div>
                </div>
            </div>
        </footer> --}}

        <!-- Mobile Footer -->
        {{-- <footer class="mobile-footer d-block d-sm-block d-md-none">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">
                        <button type="button" class="navbar-btn btn btn-light btn-lg" onclick="history.back()">
                            {!! __('pagination.previous') !!}
                        </button>
                    </div>
                    <div class="col-6 text-right">
                        <button type="submit" class="navbar-btn btn btn-primary btn-lg">
                            {!! __('pagination.next') !!}
                        </button>
                    </div>
                </div>
            </div>
        </footer> --}}
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

    <script>
        var selectedPostalCode;

        $(document).ready(function() {
            $('#postal-code').select2({
                ajax: {
                    url: "{{ route('postal-codes.list') }}", // Route to fetch postal codes
                    dataType: 'json',
                    delay: 50,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    state: item.state,
                                    place: item.place,
                                    zip: item.zip,
                                    text: item.zip + ' ' + item.place + ' (' + item.state + ')',
                                    id: item.zip
                                }
                            })
                        };
                    },
                    cache: true
                },
                placeholder: '{{ __('app.select_option') }}',
                minimumInputLength: 2,
                theme: 'bootstrap4',
            }).on('select2:select', function(e) {
                selectedPostalCode = e.params.data;
                // set the #city select2 value 
                const cityValue = {
                    id: selectedPostalCode.place,
                    text: selectedPostalCode.place + ' (' + selectedPostalCode.state + ')'
                };

                const place = $('#place');

                place.append(new Option(cityValue.text, cityValue.id, true, true));

            });

            $('#city').select2({
                ajax: {
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                },
                placeholder: '{{ __('app.select_option') }}',
                minimumInputLength: 2,
                theme: 'bootstrap4',
            });
        });

        var myself = @json(['email' => auth()->user()->email, 'full_name' => auth()->user()->full_name]);

        // add on value change event listener to select named booking_for with jquery
        $('select[name="booking_for"]').on('change', function() {
            var bookingFor = $(this).val();
            if (bookingFor === 'myself') {
                $('input[name="email"]').val(myself.email);
                $('input[name="full_name"]').val(myself.full_name);
            } else {
                $('input[name="email"]').val('');
                $('input[name="full_name"]').val('');
            }
        });
    </script>
@endsection
