@extends('frontend.layout.app', ['title' => __('app.final_step_title')])
@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection
@section('content')

    <!-- Enhanced Hero Section with Success Celebration -->
    <div class="hero-section position-relative overflow-hidden">
        <!-- Background with gradient overlay -->
        <div class="hero-bg" data-bg-image="{{ asset('images/promo/7.jpg') }}"></div>
        <div class="hero-overlay"></div>

        <!-- Success celebration elements -->
        <div class="success-celebration">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="celebration-particles">
                <div class="particle particle-1"></div>
                <div class="particle particle-2"></div>
                <div class="particle particle-3"></div>
                <div class="particle particle-4"></div>
                <div class="particle particle-5"></div>
                <div class="particle particle-6"></div>
            </div>
        </div>

        <div class="container position-relative">
            <div class="hero-content text-center">
                <!-- Success Badge -->
                <div class="success-badge">
                    <span class="badge-icon"><i class="fas fa-star"></i></span>
                    <span class="badge-text">{{ __('app.booking_confirmed') }}</span>
                </div>

                <h1 class="hero-title">
                    <span class="title-highlight">{{ __('app.step_three_title') }}</span>
                </h1>

                <p class="hero-subtitle text-white">
                    {{ __('app.booking_success_msg') }}
                </p>

                <!-- Enhanced Breadcrumb -->
                <nav aria-label="breadcrumb" class="modern-breadcrumb-wrapper">
                    <ol class="breadcrumb modern-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}" class="breadcrumb-link">
                                <i class="fas fa-home"></i>
                                <span>{{ __('app.home') }}</span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                        </li>
                        <li class="breadcrumb-item active">
                            <i class="fas fa-calendar-check"></i>
                            <span>{{ __('app.step_three_title') }}</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Animated wave decoration -->
        <div class="hero-wave">
            <svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,60 C300,100 600,20 900,60 C1050,80 1200,40 1200,40 L1200,120 L0,120 Z"
                    fill="rgba(255,255,255,0.1)" />
            </svg>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Progress Section with Modern Design -->
            <div class="progress-section">
                <div class="container">
                    <div class="progress-wrapper">
                        <div class="progress-info">
                            <span class="progress-label">{{ __('app.booking_progress') }}</span>
                            <span class="progress-percentage">100%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill"></div>
                        </div>
                        <div class="progress-steps">
                            <div class="step completed">
                                <span class="step-icon"><i class="fas fa-check"></i></span>
                                <span class="step-label">{{ __('app.step_one') }}</span>
                            </div>
                            <div class="step completed">
                                <span class="step-icon"><i class="fas fa-check"></i></span>
                                <span class="step-label">{{ __('app.step_two') }}</span>
                            </div>
                            <div class="step completed active">
                                <span class="step-icon"><i class="fas fa-check"></i></span>
                                <span class="step-label">{{ __('app.step_three') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Alert with Enhanced Design -->
            @if (Session::has('paypal_error'))
                <div class="container">
                    <div class="alert alert-danger alert-modern" role="alert">
                        <div class="alert-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="alert-content">
                            <h6 class="alert-title">{{ __('app.error') }}</h6>
                            <p class="alert-message">{{ session('paypal_error') }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="container pt-2">
                    <div class="alert alert-success alert-modern success-celebration-alert" role="alert">
                        <div class="alert-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="alert-content">
                            <h6 class="alert-title">{{ __('app.booking_confirmed') }}</h6>
                            <p class="alert-message">{{ __('app.booking_success_msg') }}</p>
                        </div>
                        <div class="alert-decoration">
                            <div class="confetti confetti-1"></div>
                            <div class="confetti confetti-2"></div>
                            <div class="confetti confetti-3"></div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Booking Content Cards -->
            <div class="container">
                <div class="booking-content">
                    <div class="row">
                        <!-- Booking Summary Card -->
                        <div class="col-lg-4 col-md-5">
                            <div class="booking-summary-card">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <h3 class="card-title">{{ __('app.booking_summary') }}</h3>
                                    <div class="card-badge">
                                        <span class="badge badge-confirmed">{{ __('app.confirmed') }}</span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!-- Customer Information -->
                                    <div class="info-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-user-circle"></i>
                                            {{ __('app.customer_info') }}
                                        </h5>
                                        <div class="info-list">
                                            <div class="info-item">
                                                <div class="info-icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="info-content">
                                                    <span class="info-label">{{ __('app.full_name') }}</span>
                                                    <span class="info-value">{{ $booking->info->full_name }}</span>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="info-content">
                                                    <span class="info-label">{{ __('app.email') }}</span>
                                                    <span class="info-value">{{ $booking->info->email }}</span>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-icon">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                <div class="info-content">
                                                    <span class="info-label">{{ __('app.phone') }}</span>
                                                    <span class="info-value">{{ $booking->info->phone }}</span>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-icon">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </div>
                                                <div class="info-content">
                                                    <span class="info-label">{{ __('app.address') }}</span>
                                                    <span class="info-value">{{ $booking->info->full_address }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Appointment Details -->
                                    <div class="info-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ __('app.appointment_details') }}
                                        </h5>
                                        <div class="appointment-card">
                                            <div class="appointment-date">
                                                <div class="date-icon">
                                                    <i class="fas fa-calendar-day"></i>
                                                </div>
                                                <div class="date-info">
                                                    <span class="date-label">{{ __('app.date') }}</span>
                                                    <span class="date-value">{{ $booking->booking_date }}</span>
                                                </div>
                                            </div>
                                            <div class="appointment-time">
                                                <div class="time-icon">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                                <div class="time-info">
                                                    <span class="time-label">{{ __('app.time') }}</span>
                                                    <span class="time-value">{{ $booking->booking_time }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Booking Details -->
                                    <div class="info-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-info-circle"></i>
                                            {{ __('app.booking_details') }}
                                        </h5>
                                        <div class="booking-details-card">
                                            <div class="detail-item">
                                                <span class="detail-label">{{ __('app.category') }}</span>
                                                <span class="detail-value">{{ $category }}</span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">{{ __('app.package') }}</span> &nbsp;&nbsp;
                                                <span class="detail-value">{{ $package->title }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Participants Section -->
                        <div class="col-lg-8 col-md-7">
                            <div class="participants-card">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h3 class="card-title">{{ __('app.participants') }}</h3>
                                    @if ($booking->info->participants->count() > 0)
                                        <div class="participant-count">
                                            <span class="count-badge">{{ $booking->info->participants->count() }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="card-body">
                                    @if ($booking->info->participants->count() > 0)
                                        <div class="participants-grid">
                                            @foreach ($booking->info->participants as $index => $participant)
                                                <div class="participant-card">
                                                    <div class="participant-avatar">
                                                        <span
                                                            class="avatar-text">{{ substr($participant['full_name'], 0, 1) }}</span>
                                                    </div>
                                                    <div class="participant-info">
                                                        <h6 class="participant-name">{{ $participant['full_name'] }}</h6>
                                                        <div class="participant-details">
                                                            <span class="detail-item">
                                                                <i class="fas fa-id-card"></i>
                                                                {{ $participant['id_card'] }}
                                                            </span>
                                                            <span class="detail-item">
                                                                <i class="fas fa-user-tag"></i>
                                                                {{ $participant['relation'] }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="no-participants">
                                            <div class="no-data-icon">
                                                <i class="fas fa-user-slash"></i>
                                            </div>
                                            <h6 class="no-data-title">{{ __('app.no_participant') }}</h6>
                                            <p class="no-data-subtitle">{{ __('app.no_participant_desc') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons Section -->
                    <div class="action-section">
                        <div class="action-card">
                            <h4 class="action-title">{{ __('app.booking_actions') }}</h4>
                            <p class="action-subtitle">{{ __('app.booking_actions_desc') }}</p>

                            <div class="action-buttons">
                                <a href="{{ route('printNow', [$booking->id]) }}"
                                    onclick="open(this.href).print(); return false" class="btn btn-primary btn-modern">
                                    <div class="btn-icon">
                                        <i class="fas fa-print"></i>
                                    </div>
                                    <div class="btn-content">
                                        <span class="btn-title">{{ __('app.print_now') }}</span>
                                        <span class="btn-subtitle">{{ __('app.print_now_desc') }}</span>
                                    </div>
                                </a>

                                <a href="{{ route('printPdf', [$booking->id]) }}" class="btn btn-secondary btn-modern">
                                    <div class="btn-icon">
                                        <i class="fas fa-download"></i>
                                    </div>
                                    <div class="btn-content">
                                        <span class="btn-title">{{ __('app.print_pdf') }}</span>
                                        <span class="btn-subtitle">{{ __('app.print_pdf_desc') }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    @if (config('settings.stripe_enabled'))
        <script src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript">
            Stripe.setPublishableKey('{{ config('
                settings.stripe_sandbox_enabled ') ?
                config('settings.stripe_test_key_pk'): config('settings.stripe_live_key_pk')
            }
            }
            ');
            $('#stripe_cc_form').submit(function(e) {
                $form = $(this);
                $form.find('button').prop('disabled', true);
                $('#cc_loader').removeClass('d-none');
                Stripe.card.createToken($form, function(status, response) {

                    if (response.error) {
                        $('#cc_loader').addClass('d-none');
                        $form.find('.stripe_error').html('<div class="alert alert-danger">' + response.error
                            .message + '</div>');
                        $form.find('button').prop('disabled', false);
                    } else {
                        var token = response.id;
                        $form.append($('<input type="hidden" name="stripe-token">').val(token));
                        $form.get(0).submit();
                    }
                });
                return false;
            });
        </script>
    @endif
@endsection
