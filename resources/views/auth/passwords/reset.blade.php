@extends('layouts.login', ['title' => __('passwords.reset_title')])

@section('content')

    <div class="row">
        <div class="col-md-3 center">
            <div class="login-box">
                <p style="text-align:center;">
                    <a href="{{ route('index') }}" class="logo-name text-lg text-center"><img src="{{ asset('images/logo-dark.png') }}" class="img-responsive"></a>
                </p>
                <p class="text-center m-t-md">{{ __('passwords.reset_title') }}</p>
                <form class="m-t-md" method="post" action="{{ route('password.request') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('auth.email_placeholder') }}" value="{{ $email }}">
                        @if($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('passwords.new_password_placeholder') }}">
                        @if($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('passwords.repeat_placeholder') }}" name="password_confirmation">
                        @if($errors->has('password_confirmation'))
                            <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success btn-block">{{ __('passwords.reset_btn') }}</button>
                    <a href="{{ route('login') }}" class="display-block text-center m-t-md text-sm">{{ __('passwords.back_to_login_btn') }}</a>
                </form>
                <p class="text-center m-t-xs text-sm">
                    {{ __('auth.copyrights') }}. &copy; {{ date('Y') }}. {{ __('auth.rights_reserved') }} {{ config('settings.business_name', 'Bookify') }}.
                </p>
            </div>
        </div>
    </div>

@endsection
