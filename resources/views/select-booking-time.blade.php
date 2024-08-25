@extends('layouts.app', ['title' => __('app.step_two_page_title')])

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2-bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="jumbotron promo">
        <div class="container">
            <h1 class="text-center promo-heading">{{ __('app.welcome_title') }}</h1>
            <p class="promo-desc text-center">{{ __('app.welcome_subtitle') }}</p>
        </div>
    </div>

    <form method="post" action="{{ route('postStep2') }}">
        {{ csrf_field() }}
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress mx-lg-12">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"><strong>50%</strong></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        {{-- a label and a select with For yourself, For someone else --}}
                        <label>{{ __('app.booking_for') }}</label>
                        <div class="form-group {{ $errors->has('booking_for') ? 'has-danger' : '' }}">
                            <select name="booking_for"
                                class="form-control form-control-lg {{ $errors->has('booking_for') ? 'is-invalid' : '' }}">
                                <option value="" selected disabled>{{ __('app.select_option') }}</option>
                                <option value="myself" {{ old('booking_for') == 'myself' ? 'selected' : null }}>
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
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label>{{ __('app.provide_address') }} <small>({{ __('app.required') }})</small></label>
                        <div class="form-group">
                            <input id="autocomplete" placeholder="{{ __('app.provide_address') }}  {{ __('app.here') }}"
                                name="email" type="email"
                                class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                value="{{ old('email', auth()->user()->email) }}">
                            <small>{{ __('app.email_description') }}</small>
                            <p class="form-text text-danger d-none" id="address_error_holder">
                                {{ __('app.address_error') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('app.full_name') }} <small>({{ __('app.required') }})</small></label>
                            {{-- <small>{{ __('app.email_description') }}</small> --}}
                            <div class="form-group">
                                <input id="autocomplete" placeholder="{{ __('app.full_name') }} {{ __('app.here') }}"
                                    name="full_name" type="text"
                                    class="form-control form-control-lg {{ $errors->has('full_name') ? 'is-invalid' : '' }} "
                                    value="{{ old('full_name', auth()->user()->first_name . ' ' . auth()->user()->last_name) }}">
                                <small>&nbsp;</small>
                                <p class="form-text text-danger d-none" id="address_error_holder">
                                    {{ __('app.address_error') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('app.phone') }}</label>
                            <div class="form-group">
                                <input id="autocomplete" placeholder="{{ __('app.phone') }} {{ __('app.here') }}"
                                    name="phone" type="text"
                                    class="form-control form-control-lg {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                    value="{{ old('phone') }}">
                                <small>&nbsp;</small>
                                <p class="form-text text-danger d-none" id="address_error_holder">
                                    {{ __('app.address_error') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('app.id_card_passport_no') }}</label>
                            <div class="form-group">
                                <input id="autocomplete" name="idcard" type="text"
                                    class="form-control form-control-lg {{ $errors->has('idcard') ? 'is-invalid' : '' }}"
                                    value="{{ old('idcard') }}">
                                <small>{{ __('app.id_card_description') }}</small>
                                <p class="form-text text-danger d-none" id="address_error_holder">
                                    {{ __('app.address_error') }}
                                </p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('app.current_street_house') }}
                                <small>({{ __('app.required') }})</small></label>
                            <div class="form-group">
                                <input id="autocomplete" name="street" type="text"
                                    class="form-control form-control-lg {{ $errors->has('street') ? 'is-invalid' : '' }}"
                                    value="{{ old('street') }}">
                                <p class="form-text text-danger d-none">
                                    {{ __('app.street') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('app.current_city') }}
                                <small>({{ __('app.required') }})</small></label>
                            <div class="form-group">
                                <input id="autocomplete" name="city" type="text"
                                    class="form-control form-control-lg {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                    value="{{ old('city') }}">
                                <p class="form-text text-danger d-none">
                                    {{ __('app.city') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('app.postal') }} / {{ __('app.zip') }}
                                <small>({{ __('app.required') }})</small></label>
                            <div class="form-group">
                                <input id="autocomplete" name="postal" type="text"
                                    class="form-control form-control-lg {{ $errors->has('postal') ? 'is-invalid' : '' }}"
                                    value="{{ old('postal') }}">
                                <small>{{ __('app.postalDesc') }}</small>
                                <p class="form-text text-danger d-none" id="address_error_holder">
                                    {{ __('app.address_error') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('app.participant') }}</label>

                            <input id="autocomplete" min="1" max="8"
                                placeholder="{{ __('app.participant') }} {{ __('app.here') }}" name="participant"
                                type="number"
                                class="form-control form-control-lg {{ $errors->has('participant') ? 'is-invalid' : '' }}"
                                value="{{ old('participant') }}">
                            <small>{{ __('app.participant_desc') }}</small>
                            <p class="form-text text-danger d-none" id="address_error_holder">
                                {{ __('app.address_error') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
        </div> <!-- Closing the container div -->

        <footer class="footer d-none d-sm-none d-md-block d-lg-block d-xl-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="text-copyrights">
                            {{ __('auth.copyrights') }}. &copy; {{ date('Y') }}. {{ __('auth.rights_reserved') }}
                            {{ config('settings.business_name', 'Bookify') }}.
                        </span>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="navbar-btn btn btn-primary btn-lg ml-auto">
                            {!! __('pagination.next') !!}
                        </button>
                    </div>
                </div>
            </div>
        </footer>

        {{-- FOOTER FOR PHONES --}}
        <footer class="footer d-block d-sm-block d-md-none d-lg-none d-xl-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="navbar-btn btn btn-primary btn-lg ml-auto">
                            {!! __('pagination.next') !!}
                        </button>
                    </div>
                </div>
            </div>
        </footer>
    </form>
@endsection
