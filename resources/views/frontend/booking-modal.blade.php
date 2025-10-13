    <div class="modal booking-modal fade" id="makeBooking" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-md-down">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fal fa-times"></i></button>
                <div class="modal-body">
                    <div class="bs-stepper" id="booking-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#basic-information">
                                <button type="button" class="step-trigger" role="tab"
                                    aria-controls="basic-information" id="basic-information-trigger">
                                    <span class="h3 mb-1">01</span>
                                    <span class="bs-stepper-circle"><i class="fal fa-user-circle"></i></span>
                                    <span class="bs-stepper-label">Basic Information</span>
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
                            <div class="step" data-target="#info">
                                <button type="button" class="step-trigger" role="tab" aria-controls="info"
                                    id="info-trigger">
                                    <span class="h3 mb-1">03</span>
                                    <span class="bs-stepper-circle"><i class="fal fa-clipboard-list-check"></i></span>
                                    <span class="bs-stepper-label">Information</span>
                                </button>
                            </div>
                            <div class="step" data-target="#payment">
                                <button type="button" class="step-trigger" role="tab" aria-controls="payment"
                                    id="payment-trigger">
                                    <span class="h3 mb-1">04</span>
                                    <span class="bs-stepper-circle"><i class="fal fa-credit-card"></i></span>
                                    <span class="bs-stepper-label">Payment</span>
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
                                        <div class="basic-information-area pt-4">
                                            <div class="section-title title-center mb-40">
                                                <h3 class="title mb-5">Basic Information</h3>
                                            </div>
                                            <div class="swiper basic-information-slider">
                                                <div class="">
                                                    <div class="col-md-12">
                                                        <label class="form-label">{{ __('app.booking_for') }} <span
                                                                class="text-danger">*</span></label>
                                                        <div
                                                            class="form-group {{ $errors->has('booking_for') ? 'has-danger' : '' }}">
                                                            <select name="booking_for" required
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
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">{{ __('app.provide_address') }}
                                                                <span class="text-danger">*</span></label>
                                                            <div class="form-group mb-3">
                                                                <input name="email" type="email" required
                                                                    class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                                    value="{{ old('email') }}"
                                                                    placeholder="Enter your email address">
                                                                <small
                                                                    class="form-text text-muted">{{ __('app.email_description') }}</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">{{ __('app.full_name') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-group mb-3">
                                                                <input name="full_name" type="text" required
                                                                    class="form-control form-control-lg {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                                                    value="{{ old('full_name') }}"
                                                                    placeholder="Enter your full name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">{{ __('app.phone') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-group mb-3">
                                                                <input name="phone" type="text" required
                                                                    class="form-control form-control-lg {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                                    value="{{ old('phone') }}"
                                                                    placeholder="Enter your phone number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">{{ __('app.participant') }}
                                                                <span
                                                                    class="text-muted">({{ __('app.optional') }})</span></label>
                                                            <div class="form-group mb-3">
                                                                <select name="participant"
                                                                    class="form-control form-control-lg {{ $errors->has('participant') ? 'is-invalid' : '' }}">
                                                                    <option value="" selected>
                                                                        {{ __('app.iam_alone') }}</option>
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
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label
                                                                    class="form-label">{{ __('app.current_street_house') }}
                                                                    <span class="text-danger">*</span></label>
                                                                <div class="form-group mb-3">
                                                                    <input name="street" type="text" required
                                                                        class="form-control form-control-lg {{ $errors->has('street') ? 'is-invalid' : '' }}"
                                                                        value="{{ old('street') }}"
                                                                        placeholder="Enter your street and house number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">{{ __('app.postal') }} <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-group mb-3">
                                                                    <select id="postal-code" name="postal" required
                                                                        class="form-control form-control-lg {{ $errors->has('postal') ? 'is-invalid' : '' }}">
                                                                        <option value="">
                                                                            {{ __('app.select_option') }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">{{ __('app.current_city') }}
                                                                    <span class="text-danger">*</span></label>
                                                                <div class="form-group mb-3">
                                                                    <select id="place" name="place" required
                                                                        class="form-control form-control-lg {{ $errors->has('place') ? 'is-invalid' : '' }}">
                                                                        <option value="">
                                                                            {{ __('app.select_option') }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-pagination position-static mt-10"
                                                    id="staff-slider-pagination"></div>
                                            </div>
                                            <div class="text-center mt-10">
                                                <button type="submit" class="btn btn-primary btn-lg modern-btn">
                                                    <i class="fas fa-arrow-right mr-2"></i>{!! __('pagination.next') !!}
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Staff-area end -->
                                    </div>
                                    <div id="time" class="bs-stepper-pane fade" role="tabpanel"
                                        aria-labelledby="time-trigger">
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
                                                <a href="javaScript:void(0)" class="btn-text color-primary icon-start"
                                                    onclick="bookingStepper.previous()" target="_self"
                                                    title="Next Step"><i class="fal fa-long-arrow-left"></i>Prev
                                                    Step</a>
                                                <a href="javaScript:void(0)" class="btn-text color-primary icon-end"
                                                    onclick="bookingStepper.next()" target="_self"
                                                    title="Next Step">Next
                                                    Step <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="info" class="bs-stepper-pane fade" role="tabpanel"
                                        aria-labelledby="staff-trigger">
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
                                                                <label for="userName"
                                                                    class="form-label color-dark">Email/Username<span
                                                                        class="color-red">*</span></label>
                                                                <input type="text" name="user_name" id="userName"
                                                                    class="form-control" placeholder="Username"
                                                                    required>
                                                            </div>
                                                            <div class="form-group mb-20">
                                                                <label for="password"
                                                                    class="form-label color-dark">Password<span
                                                                        class="color-red">*</span></label>
                                                                <div class="position-relative">
                                                                    <input type="password" name="password"
                                                                        id="password" class="form-control"
                                                                        placeholder="Enter password" required>
                                                                    <div data-toggle="#password"
                                                                        class="show-password-field">
                                                                        <i class="show-icon"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="javaScript:void(0)"
                                                                class="btn btn-lg btn-primary btn-gradient"
                                                                title="Sign In" target="_self">Sign In</a>
                                                            <div class="link mt-20">
                                                                Don't have an account? <a href="signup.html">Click
                                                                    Here</a>
                                                                to Signup
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="btn-groups mt-30">
                                                        <a href="javaScript:void(0)"
                                                            class="btn-text color-primary icon-start"
                                                            onclick="bookingStepper.previous()" target="_self"
                                                            title="Next Step"><i
                                                                class="fal fa-long-arrow-left"></i>Prev
                                                            Step</a>
                                                        <a href="javaScript:void(0)"
                                                            class="btn-text color-primary icon-end"
                                                            onclick="bookingStepper.next()" target="_self"
                                                            title="Next Step">Next Step <i
                                                                class="fal fa-long-arrow-right"></i></a>
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
                                                                        <label for="firstName"
                                                                            class="form-label color-dark">First
                                                                            Name<span
                                                                                class="color-red">*</span></label>
                                                                        <input type="text" name="first_name"
                                                                            id="firstName" class="form-control"
                                                                            placeholder="Enter first name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-20">
                                                                        <label for="lastName"
                                                                            class="form-label color-dark">Last
                                                                            Name</label>
                                                                        <input type="text" name="last_name"
                                                                            id="lastName" class="form-control"
                                                                            placeholder="Enter last name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mb-20">
                                                                        <label for="email"
                                                                            class="form-label color-dark">Email
                                                                            Address<span
                                                                                class="color-red">*</span></label>
                                                                        <input type="email" name="email"
                                                                            id="email" class="form-control"
                                                                            placeholder="Your email address" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mb-20">
                                                                        <label for="password2"
                                                                            class="form-label color-dark">Password<span
                                                                                class="color-red">*</span></label>
                                                                        <div class="position-relative">
                                                                            <input type="password" name="password"
                                                                                id="password2" class="form-control"
                                                                                placeholder="Enter password" required>
                                                                            <div data-toggle="#password"
                                                                                class="show-password-field">
                                                                                <i class="show-icon"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="custom-checkbox mb-20">
                                                                        <input class="input-checkbox" type="checkbox"
                                                                            name="checkbox" id="checkbox5"
                                                                            value="">
                                                                        <label class="form-check-label"
                                                                            for="checkbox5">I
                                                                            agree with Terms & Conditions <span
                                                                                class="color-red">*</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="javaScript:void(0)"
                                                                class="btn btn-lg btn-primary btn-gradient"
                                                                title="Create Account" target="_self">Create
                                                                Account</a>
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
                                                <h3 class="title col-lg-8">Choose Your Perfect Payment method For
                                                    Booking
                                                </h3>
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
                                                <a href="javaScript:void(0)" class="btn-text color-primary icon-start"
                                                    onclick="bookingStepper.previous()" target="_self"
                                                    title="Next Step"><i class="fal fa-long-arrow-left"></i>Prev
                                                    Step</a>
                                                <a href="javaScript:void(0)" class="btn-text color-primary icon-end"
                                                    onclick="bookingStepper.next()" target="_self"
                                                    title="Next Step">Next
                                                    Step <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="confirm" class="bs-stepper-pane fade" role="tabpanel"
                                        aria-labelledby="confirm-trigger">
                                        <div class="confirm-area pt-4">
                                            <div class="section-title title-center mb-40">
                                                <h3 class="title col-lg-8">congratulations Your Booking Completed</h3>
                                            </div>
                                            <div class="image text-center">
                                                <img class="lazyload" src="assets/images/placeholder.png"
                                                    data-src="assets/images/book-success.png" alt="Image">
                                            </div>
                                            <div class="btn-groups justify-content-center w-100 mt-20">
                                                <a href="javaScript:void(0)" class="btn-text color-primary icon-start"
                                                    onclick="bookingStepper.previous()" target="_self"
                                                    title="Next Step"><i class="fal fa-long-arrow-left"></i>Prev
                                                    Step</a>
                                                <a href="javaScript:void(0)" class="btn-text color-primary"
                                                    title="Back to Home" target="_self" data-bs-dismiss="modal"
                                                    aria-label="Close">Back to Home</a>
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
    </div>


    