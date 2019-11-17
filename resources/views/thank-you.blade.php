@extends('layouts.app', ['title' => __('app.thank_you_title')])

@section('content')

    <div class="jumbotron promo">
        <div class="container">
            <h1 class="text-center promo-heading">{{ __('app.welcome_title') }}</h1>
            @if(session()->has('department'))
                @php
                    $department = session('department');
                @endphp
                <h3 class="text-center promo-heading">{{ $department->name_en }}</h3>
            @endif
            <p class="promo-desc text-center">{{ __('app.welcome_subtitle') }}</p>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <br>
                    <p style="text-align: center;">
                        <img src="{{ asset('images/icon-booking-completed.png') }}">
                    </p>
                    <br>
                    <h1 class="text-dark"><strong>{{ __('app.thank_you_heading') }}</strong></h1>
                    <br><br>
                    <p class="text-muted">{{ __('app.thank_you_paragraph') }}</p>
                    <br>

                    <div class="d-sm-none d-none d-md-block d-lg-block">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg"><i class="far fa-user"></i>&nbsp;&nbsp;{{ __('app.my_account_link') }}</a>
                        <a href="/" class="btn btn-dark btn-lg"><i class="far fa-plus-square"></i>&nbsp;&nbsp;{{ __('app.new_booking_link') }}</a>
                    </div>

                    <div class="d-sm-block d-block d-md-none d-lg-none">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block"><i class="far fa-user"></i>&nbsp;&nbsp;{{ __('app.my_account_link') }}</a>
                        <a href="/" class="btn btn-dark btn-lg btn-block"><i class="far fa-plus-square"></i>&nbsp;&nbsp;{{ __('app.new_booking_link') }}</a>
                    </div>

                    <br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                        <span class="text-copyrights">
                            {{ __('auth.copyrights') }}. &copy; {{ date('Y') }}. {{ __('auth.rights_reserved') }} {{ config('settings.business_name', 'Bookify') }}.
                        </span>
                </div>
            </div>
        </div>
    </footer>

@endsection