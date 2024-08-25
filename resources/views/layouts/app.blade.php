<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="{{ $title }}" />
    <meta name="description" content="{{ config('settings.business_name') }} booking portal." />
    <meta name="keywords" content="Booking, Calender, Make Booking, Laravel" />
    <meta name="author" content="Mohammad Asif Gulistani" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- INDEX URL -->
    <meta name="index" content="{{ route('index') }}">

    @yield('pure-style')
    <!-- Title -->
    <title>{{ $title }} | {{ config('settings.business_name', 'Bookify') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @yield('styles')
    @include('settings.customization')
    <style>
        .promo {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .7)),
                rgba(0, 0, 0, .7) url('{{ asset('images/promo.jpg') }}') no-repeat;
            background-size: cover;
            background-position: center;
        }

        .package_box {
            height: auto;
        }
    </style>
</head>

<body style="background-color: #F2F2F2;">

    <nav class="navbar navbar-light navbar-expand-lg bg-primary top-nav">
        <a class="navbar-brand" href="{{ route('index') }}" style="color:#FFFFFF;"><img
                src="{{ asset('images/logo-light.png') }}" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown mr-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-language"></i> {{ __('app.language') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('lang', ['de']) }}">{{ __('app.dutch') }}</a>
                        <a class="dropdown-item" href="{{ route('lang', ['en']) }}">{{ __('app.english') }}</a>
                        {{-- <a class="dropdown-item" href="#">{{ __('app.persian') }}</a> --}}
                        {{-- <a class="dropdown-item" href="#">{{ __('app.pashto') }}</a> --}}
                    </div>
                </li>

                @if (!Auth::user())
                    {{-- <ul class="navbar-nav ml-auto"> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="color:#FFF;"><i
                                class="fa fa-sign-in-alt"></i> &nbsp; {{ __('app.login_link') }}</a>
                    </li>
                    {{-- </ul> --}}
                @else
                    {{-- <ul class="navbar-nav ml-auto"> --}}
                    <li class="nav-item">
                        <img src="{{ Auth::user()->photo ? asset(Auth::user()->photo->file) : asset('images/profile-placeholder.png') }}"
                            class="rounded-circle d-inline mx-2" width="40" height="40">
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mb-3 mb-md-0 mr-md-5" href="#"
                            id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" style="color:#FFF;">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('home') }}"><i class="fa fa-home text-primary"></i>
                                &nbsp; {{ __('backend.dashboard1') }}</a>
                            <a class="dropdown-item" href="{{ route('customerProfile') }}"><i
                                    class="fa fa-user text-primary"></i> &nbsp; {{ __('app.my_account_link') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out-alt text-danger"></i> &nbsp; {{ __('app.logout_link') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{-- </ul> --}}
                @endif
            </ul>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset(mix('/js/app.js')) }}"></script>
    @if (config('settings.freshchat_widget') != null)
        <script src="https://wchat.freshchat.com/js/widget.js"></script>
        <script>
            window.fcWidget.init({
                token: "{{ config('settings.freshchat_widget') }}",
                host: "https://wchat.freshchat.com"
            });
            @if (Auth::user())
                window.fcWidget.setExternalId("{{ Auth::user()->id }}");
                window.fcWidget.user.setFirstName("{{ Auth::user()->first_name }}");
                window.fcWidget.user.setLastName("{{ Auth::user()->last_name }}");
                window.fcWidget.user.setEmail("{{ Auth::user()->email }}");
            @endif
        </script>
    @endif
    @yield('scripts')
</body>

</html>
