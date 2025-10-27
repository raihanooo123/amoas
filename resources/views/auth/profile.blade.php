@extends('frontend.layout.app', ['title' => __('app.welcome_page_title')])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection
@section('content')
    <div class="page-title-area bg-img bg-cover position-relative overflow-hidden"
        data-bg-image="{{ asset('images/promo/7.jpg') }}">
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
                                    <i class="fas fa-home mr-1"></i>&nbsp; {{ __('app.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span class="breadcrumb-current">
                                    <a href="{{ route('home') }}"> <i class="fas fa-user-circle ml-1"></i>&nbsp
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

    <div class="user-dashboard pt-4">
        @include('alerts.profile')
        @include('alerts.customerPassword')
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-3">
                    <aside class="widget-area mb-40">
                        <div class="widget p-25 radius-md">
                            <ul class="links">
                                <li><a onclick="showDivContent('dashboard')" id="dashboard-link"
                                        class="active cursor:pointer">{{ __('app.dashboard') }}</a></li>
                                <li><a onclick="showDivContent('appointments')" id="appointments-link"
                                        class="cursor-pointer">{{ __('app.appointments') }} </a></li>
                                <li>
                                    <a onclick="showDivContent('profile')" id="profile-link"
                                        class="cursor-pointer">{{ __('app.profile') }} </a>
                                </li>
                                <li>
                                    <a onclick="showDivContent('reset-password')" id="reset-password-link"
                                        class="cursor-pointer">{{ __('app.reset_password') }} </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                {{-- Start Profile Content --}}
                <div class="col-lg-9" id="dashboard-content">
                    <div class="user-profile-details mb-30">
                        <div class="account-info radius-md">
                            <div class="title">
                                <h4>{{ __('app.account_information') }}</h4>
                            </div>
                            <div class="main-info">
                                <h6>{{ __('app.user') }}</h6>
                                <ul class="list">
                                    <li><span>{{ __('app.name') }}:</span> <span>{{ $user->first_name }}
                                            {{ $user->last_name }}</span></li>
                                    <li><span>{{ __('app.email') }}:</span> <span>{{ $user->email }}</span></li>
                                    <li><span>{{ __('app.phone') }}:</span> <span>{{ $user->phone_number }}</span></li>
                                    <li><span>{{ __('app.postal_code') }}:</span> <span>{{ $user->postal_code }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        @include('auth.dashboard')
                    </div>
                </div>
                {{-- End Dashboard Content --}}

                {{-- Start appointments Content --}}
                @include('auth.appointments')
                {{-- End appointments Content --}}
                {{-- Start profile Content --}}
                @include('auth.edit-profile')
                {{-- End profile Content --}}
                {{-- Start reset password Content --}}
                @include('auth.reset-password')
                {{-- End reset password Content --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showDivContent(divId) {
            // Hide all content divs and remove active class from links
            var contentDivs = ['dashboard', 'appointments', 'profile', 'reset-password'];
            contentDivs.forEach(function(id) {
                document.getElementById(id + '-content').style.display = 'none';
                document.getElementById(id + '-link').classList.remove('active');
            });

            // Show selected div and add active class to its link
            document.getElementById(divId + '-content').style.display = 'block';
            document.getElementById(divId + '-link').classList.add('active');
        }
    </script>
@endsection
