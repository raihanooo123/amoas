@extends('layouts.login', ['title' => __('auth.page_title')])

@section('content')

<div class="row">
    <div class="col-md-3 center">
        <div class="login-box">
            
            <p style="text-align:center;">
                <a href="{{ route('index') }}" class="logo-name text-lg text-center"><img
                        src="{{ asset('images/logo-dark.png') }}" class="img-responsive"></a>
            </p>

            <div class="form-group">
                <!-- <div class="col-md-6"> -->
                    <a href="{{ url('login/facebook') }}" class="btn btn-block btn-social-icon btn-facebook"><i
                            class="fa fa-facebook"></i> Login Via Facebook</a>
                    <a href="{{ url('login/twitter') }}" class="btn btn-block btn-social-icon btn-twitter"><i
                            class="fa fa-facebook-f"></i> Login Via Twitter</a>
                    <a href="{{ url('login/google') }}" class="btn btn-block btn-social-icon btn-google"><i
                            class="fa fa-google-plus"></i> Login Via Google</a>
                <!-- </div> -->
            </div>

            <p class="text-center m-t-md">{{ __('auth.login_title') }}</p>

            @if ($errors->has('email'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
            @endif

            <form class="m-t-md" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="{{ __('auth.email_placeholder') }}" value="{{ old('email') }}" autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="{{ __('auth.password_placeholder') }}">
                </div>
                <button type="submit" class="btn btn-success btn-block">{{ __('auth.login_btn') }}</button>
                <br>
                <p class="text-center m-t-xs text-sm">
                    <a href="{{ route('password.request') }}">{{ __('auth.forgot_password_title') }} </a>
                    <br>
                    <a href="{{ route('register') }}">{{ __('auth.create_account') }}</a>
                </p>
            </form>
            <p class="text-center m-t-xs text-sm">
                {{ __('auth.copyrights') }}. &copy; {{ date('Y') }}. {{ __('auth.rights_reserved') }}
                {{ config('settings.business_name', 'Bookify') }}.
            </p>
        </div>
    </div>
</div>

@endsection