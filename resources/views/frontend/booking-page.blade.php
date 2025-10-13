@extends('frontend.layout.app', ['title' => __('app.welcome_page_title')])

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
    <div class="page-title-area bg-img bg-cover" data-bg-image="{{ asset('images/promo.jpg') }}">
        <div class="container">
            <div class="content">
                <h2>{{ __('app.my_profile') }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('app.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('app.my_profile') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="row">
            <div class="col-md-12">
                <h4>{{ __('app.validation_t_message') }}</h4>
                <div class="error">
                    <ol>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    @endif

    <div class="user-dashboard pt-100 pb-60">
        <div class="container" id="app">
            <div class="row gx-xl-5">
                <div class="bs-stepper" id="booking-stepper">
                    <div class="bs-stepper-header text-center" role="tablist">
                        <!-- your steps here -->
                        <div class="step" data-target="#basic-information">
                            <button type="button" class="step-trigger" role="tab" aria-controls="basic-information"
                                id="basic-information-trigger">
                                <span class="h3 mb-1">01</span>
                                <span class="bs-stepper-circle"><i class="fal fa-user-circle"></i></span>
                                <span class="bs-stepper-label">Basic Information </span>
                            </button>
                        </div>
                        <div class="step" data-target="#time">
                            <button type="button" class="step-trigger" role="tab" aria-controls="time"
                                id="time-trigger">
                                <span class="h3 mb-1">02</span>
                                <span class="bs-stepper-circle"><i class="fal fa-clock"></i></span>
                                <span class="bs-stepper-label">Time</span>
                            </button>
                        </div>
                        <div class="step" data-target="#confirm">
                            <button type="button" class="step-trigger" role="tab" aria-controls="confirm"
                                id="confirm-trigger">
                                <span class="h3 mb-1">05</span>
                                <span class="bs-stepper-circle"><i class="fal fa-check-circle"></i></span>
                                <span class="bs-stepper-label">Confirmation</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form method="POST" action="{{ route('postStep2') }}" style="margin-top: -30px;">
                            {{ csrf_field() }}
                            <div class="container">
                                <div id="basic-information" class="bs-stepper-pane fade" role="tabpanel"
                                    aria-labelledby="basic-information-trigger">
                                    <!-- Basic Information-area start -->
                                    <div class="basic-information-area pt-4 shadow-sm p-2">
                                        <div class="section-title mb-40">
                                            <h3 class="title mb-20">Basic Information </h3>
                                        </div>
                                        <div class="swiper basic-information-slider">
                                            <div class="swiper-pagination position-static mt-10"
                                                id="basic-information-slider-pagination">
                                                <div class="row text-start">
                                                    <div class="col-md-12">
                                                        <div
                                                            class="form-group {{ $errors->has('booking_for') ? 'has-danger' : '' }}">
                                                            <label class="form-label color-dark text-start"
                                                                for="booking_for">
                                                                {{ __('app.booking_for') }} <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <select name="booking_for" id="booking_for" required
                                                                v-model="form.booking_for"
                                                                class="form-control form-control-lg {{ $errors->has('booking_for') ? 'is-invalid' : '' }}">
                                                                <option value="" selected disabled>
                                                                    {{ __('app.select_option') }}
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
                                                            <small class="form-text text-danger" v-if="errors.booking_for">
                                                                @{{ errors.booking_for }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row text-start pt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label text-start" for="email">
                                                                {{ __('app.provide_address') }} <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input name="email" id="email" type="email" required
                                                                v-model="form.email"
                                                                class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                                value="{{ old('email') }}"
                                                                placeholder="Enter your email address">
                                                            <small
                                                                class="form-text text-muted">{{ __('app.email_description') }}</small>
                                                            <small class="form-text text-danger" v-if="errors.email">
                                                                @{{ errors.email }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label text-start" for="full_name">
                                                                {{ __('app.full_name') }} <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input name="full_name" id="full_name" type="text"
                                                                required v-model="form.full_name"
                                                                class="form-control form-control-lg {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                                                value="{{ old('full_name') }}"
                                                                placeholder="Enter your full name">
                                                            <small class="form-text text-danger" v-if="errors.full_name">
                                                                @{{ errors.full_name }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label text-start" for="phone">
                                                                {{ __('app.phone') }} <span class="text-danger">*</span>
                                                            </label>
                                                            <input name="phone" id="phone" type="text" required
                                                                v-model="form.phone"
                                                                class="form-control form-control-lg {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                                value="{{ old('phone') }}"
                                                                placeholder="Enter your phone number">
                                                            <small class="form-text text-danger" v-if="errors.phone">
                                                                @{{ errors.phone }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label text-start" for="participant">
                                                                {{ __('app.participant') }} <span
                                                                    class="text-muted">({{ __('app.optional') }})</span>
                                                            </label>
                                                            <select name="participant" id="participant"
                                                                v-model="form.participant"
                                                                class="form-control form-control-lg {{ $errors->has('participant') ? 'is-invalid' : '' }}">
                                                                <option value="" selected>{{ __('app.iam_alone') }}
                                                                </option>
                                                                @for ($i = 1; $i <= 9; $i++)
                                                                    <option value="{{ $i }}"
                                                                        {{ old('participant') == $i ? 'selected' : null }}>
                                                                        {{ trans_choice('app.family_member', $i, ['count' => $i]) }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                            <small class="form-text text-danger"
                                                                v-if="errors.participant">
                                                                @{{ errors.participant }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-start">
                                            Please insert the addresses exactly as they appear on the back of your ID card,
                                            resident permit, passport, or travel document. This will be verified during
                                            check-in.
                                        </p>
                                        <div class="row text-start pt-1">
                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.current_street_house') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group mb-3">
                                                    <input name="street" type="text" required v-model="form.street"
                                                        class="form-control form-control-lg {{ $errors->has('street') ? 'is-invalid' : '' }}"
                                                        value="{{ old('street') }}"
                                                        placeholder="Enter your street and house number">
                                                    <small class="form-text text-danger" v-if="errors.street">
                                                        @{{ errors.street }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.postal') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group mb-3">
                                                    <select id="postal-code" name="postal" required
                                                        v-model="form.postal"
                                                        class="form-control form-control-lg {{ $errors->has('postal') ? 'is-invalid' : '' }}">
                                                        <option value="">{{ __('app.select_option') }}</option>
                                                    </select>
                                                    <small class="form-text text-danger" v-if="errors.postal">
                                                        @{{ errors.postal }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.current_city') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group mb-3">
                                                    <select id="place" name="place" required v-model="form.place"
                                                        class="form-control form-control-lg {{ $errors->has('place') ? 'is-invalid' : '' }}">
                                                        <option value="">{{ __('app.select_option') }}</option>
                                                    </select>
                                                    <small class="form-text text-danger" v-if="errors.place">
                                                        @{{ errors.place }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-10">
                                            <a href="javaScript:void(0)" type="submit"
                                                class="btn-text color-primary icon-end" @click="nextStep()"
                                                target="_self" title="Next Step">Next
                                                Step <i class="fal fa-long-arrow-right"></i></a>

                                        </div>
                                    </div>
                                    <!-- Basic Information-area end -->
                                </div>
                                <div id="time" class="bs-stepper-pane fade" role="tabpanel"
                                    aria-labelledby="time-trigger">
                                    <div class="calender-area pt-4">
                                        <div class="section-title mb-40">
                                            <h3 class="title">Select Booking Time</h3>
                                        </div>
                                        <div class="booking-time shadow-sm p-2">
                                            <h6 class="mb-20">Select Your Booking Time</h6>
                                            <div class="swiper booking-time-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="row text-start">
                                                        <div class="col-md-12">
                                                            <br>
                                                            <h5>{{ __('app.select_date') }}
                                                                <small>{{ __('app.no_paticipant_including_you', ['paticipant' => session()->has('participant') ? session('participant') + 1 : 1]) }}</small>
                                                            </h5>
                                                            <div class="form-group">
                                                                <input type="text" v-model="form.event_date"
                                                                    class="form-control form-control-lg {{ $errors->has('event_date') ? ' is-invalid' : '' }}"
                                                                    onkeydown="return false" name="event_date"
                                                                    id="event_date"
                                                                    placeholder="{{ __('app.date_placeholder') }}"
                                                                    value="{{ old('event_date') }}">
                                                                <p class="form-text text-danger d-none"
                                                                    id="date_error_holder">
                                                                    {{ __('app.date_error') }}
                                                                </p>
                                                                <small class="form-text text-danger"
                                                                    v-if="errors.event_date">
                                                                    @{{ errors.event_date }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" v-if="form.participant > 100">
                                                        <div class="col-md-12">
                                                            <br>
                                                            <h5>{{ __('app.participantInfo', ['participant' => session('participant')]) }}
                                                            </h5>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-3 col-form-label">{{ __('app.full_name') }}
                                                                    <small>({{ __('app.required') }})</small></label>
                                                                <label
                                                                    class="col-3 col-form-label">{{ __('app.id_card') }}
                                                                    <small>({{ __('app.required') }})</small></label>
                                                                <label
                                                                    class="col-3 col-form-label">{{ __('app.relationType') }}
                                                                    <small>({{ __('app.required') }})</small></label>
                                                                <label
                                                                    class="col-3 col-form-label">{{ __('app.select_service') }}
                                                                    <small>({{ __('app.required') }})</small></label>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-scrollbar position-static mt-10"></div>
                                            </div>
                                        </div>
                                        <div class="btn-groups justify-content-center w-100 mt-20">
                                            <a href="javaScript:void(0)" class="btn-text color-primary icon-start"
                                                onclick="bookingStepper.previous()" target="_self" title="Next Step"><i
                                                    class="fal fa-long-arrow-left"></i>Prev Step</a>
                                            <a href="javaScript:void(0)" class="btn-text color-primary icon-end"
                                                @click="nextStep()" target="_self" title="Next Step">Next
                                                Step <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="confirm" class="bs-stepper-pane fade" role="tabpanel"
                                    aria-labelledby="confirm-trigger">
                                    <div class="confirm-area pt-4">
                                        <!-- Header Section -->
                                        <div class="text-center mb-5">
                                            <div class="success-icon mb-3">
                                                <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                                            </div>
                                            <h2 class="text-success mb-2">Booking confirmed</h2>
                                            <p class="text-muted">Booking confirmation message</p>
                                        </div>

                                        <!-- Booking Summary Card -->
                                        <div class="card shadow-sm mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0 text-white">
                                                    <i class="fas fa-calendar-check me-2"></i>
                                                    Booking summary
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                                                            <strong> booking date & time :</strong>
                                                            <span class="badge bg-primary">@{{ form.event_date || 'N/A' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                                                            <strong> booking time :</strong>
                                                            <span class="badge bg-primary">@{{ form.booking_slot || 'N/A' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                                                            <strong> booking type :</strong>
                                                            <span>@{{ form.booking_type || 'N/A' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                                                            <strong> booking status :</strong>
                                                            <span class="badge bg-success">@{{ form.status || 'Pending' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Detailed Information Grid -->
                                        <div class="row g-4">
                                            <!-- Left Column -->
                                            <div class="col-lg-6">
                                                <div class="card h-100 shadow-sm">
                                                    <div class="card-header bg-info text-white">
                                                        <h6 class="mb-0">
                                                            <i class="fas fa-info-circle me-2"></i>
                                                            booking details
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span> booking serial number :</span>
                                                                <strong>@{{ form.serial_no || 'N/A' }}</strong>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span> booking department :</span>
                                                                <strong>@{{ form.department || 'N/A' }}</strong>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span> booking package :</span>
                                                                <strong>@{{ form.package || 'N/A' }}</strong>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span> booking category :</span>
                                                                <strong>@{{ form.category || 'N/A' }}</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="text-center mt-5">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-secondary me-2"
                                                    onclick="bookingStepper.previous()">
                                                    <i class="fas fa-arrow-left me-2"></i>back
                                                </button>
                                                <button type="button" class="btn btn-outline-primary me-2"
                                                    @click="printConfirmation()">
                                                    <i class="fas fa-print me-2"></i>print
                                                </button>
                                                <button type="button" class="btn btn-outline-info me-2"
                                                    @click="downloadPDF()">
                                                    <i class="fas fa-download me-2"></i>download pdf
                                                </button>
                                                <button type="submit" class="btn btn-success" form="booking-form">
                                                    <i class="fas fa-check me-2"></i>confirm booking
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.12.2/dist/axios.min.js"></script>
    <script>
        const {
            createApp,

        } = Vue

        const app = createApp({
            data() {
                return {
                    form: {
                        booking_for: '{{ old('booking_for') }}',
                        email: '{{ old('email') }}',
                        full_name: '{{ old('full_name') }}',
                        phone: '{{ old('phone') }}',
                        participant: '{{ old('participant') }}',
                        street: '{{ old('street') }}',
                        postal: '{{ old('postal') }}',
                        place: '{{ old('place') }}',
                        event_date: '{{ old('event_date') }}',
                        booking_slot: '{{ old('booking_slot') }}',
                        participantInfo: [],
                        booking_type: '',
                        package_id: {!! $package->id !!},
                        booking_date: '',
                        booking_time: '',
                        status: '',
                        serial_no: '',
                    },
                    errors: [],
                }
            },
            methods: {
                nextStep() {
                    // Get current step
                    const currentStep = this.getCurrentStep();
                    this.validateForm(currentStep);
                    if (Object.keys(this.errors).length === 0) {
                        bookingStepper.next();
                    }
                    if (currentStep === 1) {
                        axios.post('{{ route('get-available-dates') }}', {
                            package_id: this.form.package_id,
                        }).then(response => {
                            console.log(response);
                        });
                    }

                },
                getCurrentStep() {
                    // Find the active step by checking which pane is visible
                    if (document.querySelector('#basic-information').classList.contains('active')) {
                        return 1; // Basic Information step
                    } else if (document.querySelector('#time').classList.contains('active')) {
                        return 2; // Time step
                    } else if (document.querySelector('#confirm').classList.contains('active')) {
                        return 3; // Confirmation step
                    }
                    return 1; // Default to first step
                },
                onStepChange() {
                    // Clear errors when changing steps to avoid showing irrelevant errors
                    this.errors = {};
                },
                validateForm(step = null) {
                    // Clear all errors first
                    this.errors = {};

                    if (step === null) {
                        step = this.getCurrentStep();
                    }

                    // Validate based on current step
                    if (step === 1) {
                        // Basic Information step validation
                        if (this.form.booking_for === '') {
                            this.errors.booking_for = 'The booking for field is required';
                        }
                        if (this.form.email === '') {
                            this.errors.email = 'The email field is required';
                        }
                        if (this.form.full_name === '') {
                            this.errors.full_name = 'The full name field is required';
                        }
                        if (this.form.phone === '') {
                            this.errors.phone = 'The phone field is required';
                        }
                        if (this.form.participant === '') {
                            this.errors.participant = 'The participant field is required';
                        }
                        if (this.form.street === '') {
                            this.errors.street = 'The street field is required';
                        }
                        if (this.form.postal === '') {
                            this.errors.postal = 'The postal field is required';
                        }
                        if (this.form.place === '') {
                            this.errors.place = 'The place field is required';
                        }
                    } else if (step === 2) {
                        // Time step validation
                        // if (this.form.event_date === '') {
                        //     this.errors.event_date = 'The event date field is required';
                        // }
                        // if (this.form.booking_slot === '') {
                        //     this.errors.booking_slot = 'The booking slot field is required';
                        // }
                    } else if (step === 3) {
                        // Confirmation step validation (if needed)
                        if (this.form.participantInfo.length === 0) {
                            this.errors.participantInfo = 'The participant info field is required';
                        }
                    }
                },
                previousStep() {
                    bookingStepper.previous();
                },
                submitForm() {
                    console.log(this.form);
                }
            },
            setup() {

            }
        }).mount('#app');

        // Make Vue app globally accessible for stepper events
        window.vueApp = app;



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

                // Update Vue form data for postal field
                if (window.vueApp) {
                    window.vueApp.form.postal = selectedPostalCode.zip;
                }

                // set the #city select2 value
                const cityValue = {
                    id: selectedPostalCode.place,
                    text: selectedPostalCode.place + ' (' + selectedPostalCode.state + ')'
                };

                const place = $('#place');
                place.append(new Option(cityValue.text, cityValue.id, true, true));

                // Update Vue form data for place field
                if (window.vueApp) {
                    window.vueApp.form.place = selectedPostalCode.place;
                }
            });

            $('#place').select2({
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
            }).on('select2:select', function(e) {
                // Update Vue form data for place field when changed directly
                if (window.vueApp) {
                    window.vueApp.form.place = e.params.data.id;
                }
            });
        });

        var myself = @json(['email' => auth()->user()->email, 'full_name' => auth()->user()->full_name]);

        // add on value change event listener to select named booking_for with jquery
        $('select[name="booking_for"]').on('change', function() {
            var bookingFor = $(this).val();

            // Update Vue form data for booking_for
            if (window.vueApp) {
                window.vueApp.form.booking_for = bookingFor;
            }

            if (bookingFor === 'myself') {
                $('input[name="email"]').val(myself.email);
                $('input[name="full_name"]').val(myself.full_name);

                // Update Vue form data for email and full_name
                if (window.vueApp) {
                    window.vueApp.form.email = myself.email;
                    window.vueApp.form.full_name = myself.full_name;
                }
            } else {
                $('input[name="email"]').val('');
                $('input[name="full_name"]').val('');

                // Update Vue form data for email and full_name
                if (window.vueApp) {
                    window.vueApp.form.email = '';
                    window.vueApp.form.full_name = '';
                }
            }
        });

        // Add event listeners for other form fields to update Vue data
        $('input[name="phone"]').on('input', function() {
            if (window.vueApp) {
                window.vueApp.form.phone = $(this).val();
            }
        });

        $('input[name="street"]').on('input', function() {
            if (window.vueApp) {
                window.vueApp.form.street = $(this).val();
            }
        });

        $('select[name="participant"]').on('change', function() {
            if (window.vueApp) {
                window.vueApp.form.participant = $(this).val();
            }
        });

        // Add event listener for date picker
        $(document).on('change', 'input[name="event_date"]', function() {
            if (window.vueApp) {
                window.vueApp.form.event_date = $(this).val();
            }
        });


        var nowDate = new Date();
        var firstDay = new Date(nowDate.getFullYear(), nowDate.getMonth(), 1);
        var lastDay = new Date(nowDate.getFullYear(), nowDate.getMonth() + 1, 0);
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        $('#event_date').datepicker({
            orientation: "auto right",
            autoclose: true,
            startDate: today,
            endDate: new Date(lastDay.setMonth(lastDay.getMonth() + 6)),
            datesDisabled: JSON.parse('{!! auth()->check() && auth()->user()->role && (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                ? '[]'
                : $disabledDates !!}'),
            format: 'yyyy-mm-dd',
            // format: 'dd-mm-yyyy',
            daysOfWeekDisabled: "{{ $disable_days_string }}",
            language: "{{ App::getLocale() }}"
        });
    </script>


    @if (config('settings.google_maps_api_key') != null)
        <script src="{{ asset('js/map.js') }}"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.google_maps_api_key') }}&libraries=places&callback=initAutocomplete"
            async defer></script>
    @endif
@endsection
