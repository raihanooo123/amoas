@extends('layouts.app', ['title' => 'AMOAS Register'])

@section('content')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('app.registration') }}</div>

                    <div class="card-body ">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('app.first_name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                        name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('app.last_name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                        name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- NEW PHONE NUMBER FIELD START --}}
                            <div class="form-group row">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('app.phone_number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="tel" {{-- Use type="tel" for phone number input --}}
                                        class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                        name="phone_number" value="{{ old('phone_number') }}" required>

                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- NEW PHONE NUMBER FIELD END --}}

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('app.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- ... (rest of the form remains the same) ... --}}
                            
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('app.password') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('app.password_confirmation') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>

                            {{-- I need a check box to accept terms and data privacy policy --}}
                            <div class="form-group row">
                                <span class="col-md-4"></span>
                                <div class="col-md-6">

                                    <label for="terms"
                                        class="col-form-label{{ $errors->has('terms') ? ' text-danger' : '' }}">
                                        <input id="terms" type="checkbox" name="terms" required>
                                        {{ __('app.i_accept_terms') }}
                                    </label>

                                    <span>
                                        {{-- for more information, please visit <a href="{{ route('privacy-policy') }}">Data Privacy Policy</a>. --}}
                                        {{ __('app.for_more_information') }} <a
                                            href="{{ route('privacy-policy') }}">{{ __('app.data_privacy_policy') }}</a>.
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('app.register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection