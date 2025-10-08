@extends('frontend.layout.app', ['title' => __('app.welcome_page_title')])

@section('content')
    
<section class="hero-banner hero-banner-1 parallax">
    <div class="container container-lg-fluid">
        <div class="row align-items-center gx-xl-5">
            <div class="col-lg-6">
                <div class="fluid-left">
                    <div class="banner-content mb-40">
                        <h1 class="title mb-30" data-aos="fade-up" data-aos-delay="100"> Find Anything From Nearest Location To Make A Booking </h1>
                        <p class="text" data-aos="fade-up" data-aos-delay="100">Link Build is an advanced and modern-looking directory script with rich SEO features where you can create your.  </p>
                        <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="150">
                            <div class="form-wrapper shadow-md bg-white p-20 radius-md">
                                {{-- <form action="#">
                                    <div class="row align-items-center">
                                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="location" class="text-gradient"><i class="fal fa-map-marker-alt"></i></label>
                                                <input type="text" id="location" class="form-control" placeholder="Search Location">
                                                <div class="vr"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search" class="text-gradient"><i class="fal fa-clipboard-list"></i></label>
                                                <input type="text" id="search" class="form-control" placeholder="Search Services">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-2 col-md-4 col-sm-6">
                                            <button type="button" class="btn btn-lg btn-primary icon-start w-100">
                                                <i class="fal fa-search"></i>
                                                <span>Find Now</span>
                                            </button>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up">
                <div class="banner-image mb-40 parallax-img" data-speed="0.5" data-revert="true">
                    <img class="lazyload blur-up"  data-src="{{ asset('frontend/assets/images/banner/hero-banner-1.png') }}" alt="Banner Image">
                </div>
            </div>
        </div>
    </div>
</section>
 
    <!-- Category-area start -->
    <section class="category-area category-1 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-0">Most Popular Categories</h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    <div class="swiper category-slider" id="category-slider-1" data-slides-per-view="5" data-swiper-loop="false">
                        <div class="swiper-wrapper">
                        @foreach($categories as $category)
                            <div class="swiper-slide">
                                <div class="card p-25 border radius-md text-center">
                                    <div class="card-icon radius-md mx-auto mb-20">
                                        <i class="ico-{{ $category->title }}"></i>
                                        <img src="{{ asset($category->photo->file) }}" alt="{{ $category->title }}">
                                    </div>
                                    <h4 class="card-title lc-1 mb-1">
                                        <a href="services.html" target="_self" title="{{ $category->title }}">
                                            {{ $category->title }}
                                        </a>
                                    </h4>
                                    <span class="font-sm">{{ count($category->packages) }}+ {{ $category->title }} Available</span>
                                </div>
                            </div>
                        @endforeach
                        </div>
                            
                        </div>
                        <div class="swiper-pagination position-static mt-40" id="category-slider-1-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category-area end -->

        <!-- Works-area start -->
        <section class="works-area works-1 pt-100 pb-60 bg-img bg-cover" data-bg-image="{{ asset('frontend/assets/images/work-bg-1.png') }} ">
            <div class="container">
                <div class="row align-items-center gx-xl-5">
                    <div class="col-lg-5">
                        <div class="content-title mb-40" data-aos="fade-up">
                            <h2 class="title mb-25 color-white">
                                How appointment Booking System Works
                            </h2>
                            <p class="color-white">
                                Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind.
                            </p>
                            <div class="mt-30">
                                <button class="btn btn-lg btn-primary btn-gradient icon-start" data-bs-toggle="modal" data-bs-target="#makeBooking" type="button" aria-label="Book Now">
                                    <i class="fal fa-calendar-check"></i>
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="swiper works-slider mb-40" id="works-slider-1" data-aos="fade-up">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card p-30 radius-lg">
                                        <div class="card-icon color-white">
                                            <i class="ico-person"></i>
                                        </div>
                                        <div class="line bg-white my-3 rounded-pill"></div>
                                        <h4 class="card-title color-white lc-1 mb-15">
                                            Create an Account
                                        </h4>
                                        <p class="card-text color-light">
                                            Sign up on our platform to manage your appointments and access services.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card p-30 radius-lg">
                                        <div class="card-icon color-white">
                                            <i class="ico-booking"></i>
                                        </div>
                                        <div class="line bg-white my-3 rounded-pill"></div>
                                        <h4 class="card-title color-white lc-1 mb-15">
                                            Select a Service
                                        </h4>
                                        <p class="card-text color-light">
                                            Log in and choose the service you need. Review the required documents 
                                            and service details, then click the \'Next »\' button at the bottom.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card p-30 radius-lg">
                                        <div class="card-icon color-white">
                                            <i class="ico-person"></i>
                                        </div>
                                        <div class="line bg-white my-3 rounded-pill"></div>
                                        <h4 class="card-title color-white lc-1 mb-15">
                                            Enter Personal Information
                                        </h4>
                                        <p class="card-text color-light">
                                            Fill in your personal details accurately and click \'Next »\' to continue.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card p-30 radius-lg">
                                        <div class="card-icon color-white">
                                            <i class="ico-thunder"></i>
                                        </div>
                                    </div>
                                    <div class="line bg-white my-3 rounded-pill"></div>
                                    <h4 class="card-title color-white lc-1 mb-15">
                                        Choose Date and Time
                                    </h4>
                                    <p class="card-text color-light">
                                        Pick an available date and time. Disabled dates may be fully booked or holidays.
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card p-30 radius-lg">
                                        <div class="card-icon color-white">
                                            <i class="ico-info"></i>
                                        </div>
                                    </div>
                                    <div class="line bg-white my-3 rounded-pill"></div>
                                    <h4 class="card-title color-white lc-1 mb-15">
                                        Save/Print Appointment Confirmation
                                    </h4>
                                    <p class="card-text color-light">
                                        You\'ve successfully booked your appointment! Save or print the confirmation slip for your visit.
                                        It is necessary to bring show this confirmation slip at the mission.
                                    </p>
                                </div>
                                </div>
                            </div>
                            <div class="swiper-pagination position-static mt-30" id="works-slider-1-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Works-area end -->

            <!-- Service-area start -->
    <section class="service-area service-1 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">Our Top Featured Services</h2>
                        <!-- Slider navigation buttons -->
                        <div class="slider-navigation">
                            <button type="button" title="Slide prev" class="slider-btn" id="product-slider-1-prev">
                                <i class="fal fa-angle-left"></i>
                            </button>
                            <button type="button" title="Slide next" class="slider-btn" id="product-slider-1-next">
                                <i class="fal fa-angle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Slider main container -->
                    <div class="swiper product-slider" id="product-slider-1" data-slides-per-view="4" data-swiper-loop="true" data-aos="fade-up">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach($packages as $package)
                            <div class="swiper-slide">
                                <div class="product-default border radius-md p-15 mb-25">

                                    <figure class="product-img mb-15">
                                        <a href="service-details.html" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3">
                                            <img class="lazyload" src="{{ asset($package->photo->file) }}" alt="Product">
                                        </a>
                                    </figure>
                                    
                                    <div class="product-details">
                                        <div class="d-flex align-items-center justify-content-between gap-2">
                                            <span class="tag font-sm">{{ $package->category->title }}</span>
                                            <a href="wishlist.html" class="btn btn-icon border radius-sm" title="Save to Wishlist">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                        </div>
                                        <h6 class="product-title mb-0">
                                            <a href="service-details.html" target="_self" title="{{ $package->title }}">{{ $package->title }}</a>
                                        </h6>
                                        <div class="product-description mt-2">
                                            {!! $package->description !!}
                                        </div>
                                        {{-- <div class="author mb-10 mt-10">
                                            <img class="lazyload blur-up" src="{{ asset($package->photo->file) }}" data-src="{{ asset($package->photo->file) }}" alt="Image">
                                            <span class="font-sm">
                                                 <a href="javaScript:void(0)" target="_self" title="John Doe">
                                                    {{ $package->category->title }}</a>
                                            </span>
                                        </div> --}}
                                        {{-- <span class="font-sm icon-start"><i class="fal fa-map-marker-alt"></i>City
                                            {{ $package->category->title }}</span> --}}
                                        <div class="d-flex align-items-center justify-content-between gap-2 mt-10">
                                            <div class="product-price">
                                                <span class="h6 new-price">{{ $package->price }}</span>
                                                {{-- <span class="prev-price font-sm">{{ $package->price }}</span> --}}
                                            </div>
                                            <a href="javaScript:void(0)" class="btn btn-sm btn-outline-2" data-bs-toggle="modal" data-bs-target="#makeBooking" title="Book Now" target="_self">Book Now</a>
                                        </div>
                                    </div>
                                </div><!-- product-default -->
                            </div> 
                            @endforeach
                        </div>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination position-static" id="product-slider-1-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service-area end -->
@endsection

@section('scripts')
    <script>
        //append form with selected package_id

        $('body').on('click', 'a.btn_package_select', function() {

            var package_id = $(this).attr('data-package-id');
            $('#package_error').addClass('d-none');

            $('#package_id').remove();
            $('#booking_step_1').append('<input type="hidden" name="package_id" id="package_id" value="' +
                package_id + '">');

            $('.btn_package_select').text('{{ __('app.booking_package_btn_select') }}').removeClass(
                'btn-secondary').addClass('btn-primary').css('color', 'white');
            $(this).text('{{ __('app.booking_package_btn_selected') }}').removeClass('btn-primary').addClass(
                'btn-secondary');

            var package_id = $(this).attr('data-package-id');
            $('#package_info_loader').removeClass('d-none');

            $.get("{{ URL('/ajax_package_info') }}", {
                id: package_id
            }, function(data) {

                $('#package_desc_container').removeClass('d-none');
                $('#package_desc').html(data);

                $('#package_info_loader').addClass('d-none');

                $('html,body').animate({
                    scrollTop: $('#package_desc').offset().top
                }, 'slow');

                // set progress bar 25%
                $('#progressbar').css('width', '25%').attr('aria-valuenow', 25).text('25%');

            });
        });
    </script>
@endsection
