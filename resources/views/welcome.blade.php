@extends('layouts.app', ['title' => __('app.welcome_page_title')])

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
            <p class="promo-desc text-center">
                {{ __('app.welcome_subtitle') }}
            </p>
        </div>
    </div>

    <form method="post" id="booking_step_1" action="{{ Auth::user() ? route('postStep1') : route('register') }}">

        {{csrf_field()}}
        <div class="container">
            <div class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="progress mx-lg-12">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <br><br>
                    </div>
                </div>

                <div class="row" id="guideline">
                    <div class="col-md-8">
                        <h5>How to reserve a set on our mission?</h5>
                        <ol>
                            <li> <strong>Step 1:</strong> Select the services which you want to be done by us.</li>
                            <li>Select the package within the selected service. 
                                The detailed inforamtion of each package will show with package selection, please read once and click on 
                                <button class="btn btn-sm" onclick="return false;">
                                    <i class="far fa-clock"></i> &nbsp; Select Booking Time
                                </button> button at bottom of the page.</li>

                            <li> <strong>Step 2:</strong> On the next part, please enter you information properly and click on 
                                <button class="btn btn-sm" onclick="return false;">
                                        Next »
                                </button>
                                    button, although some package may have different procedure for booking.</li>
                            
                            <li> <strong>Step 3:</strong> Select the booking date and time. Dates the are disables, may already booked or it is a holyday.</li>
                            <li> <strong>Step 4:</strong> This is final step. You have successfully booked a time and print the slip, it is neccessary while entering to our mission.</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <h5>Quick access links</h5>
                        <ul>
                            <li>Check your Visa status <a href="{{route('check-status')}}">here.</a>
                                <br>
                                Although we will sent you the approval or rejection of the Online Visa Application Form to your email.
                            </li>
                            <li>Create an account <a href="{{route('register')}}">here.</a>
                                <br>
                                Before going further, you must have a verified account. 
                            </li>
                        </ul>
                    </div>
                </div>
                <br>
                <div id="categories_holder">
                    <h5>Select Your Category of Services</h5>
                    <br>
                    <div class="row">
                        @if(count($categories))
                            @foreach($categories as $category)
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                    <div class="type_box category_box" data-category-id="{{ $category->id }}">
                                        <div class="responsive-image"><img class="responsive-image" alt="{{ $category->title }}" src="{{ asset($category->photo->file) }}"></div>
                                        <div class="type_title">
                                            <div class="text-container">
                                                <p class="text_type">{{ $category->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <div class="alert alert-danger">{{ __('app.no_category_error') }}</div>
                            </div>
                        @endif
                    </div>
                    <br>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="packages_loader" class="d-none"><p style="text-align: center;"><img src="{{ asset('images/loader.gif') }}" width="52" height="52"></p></div>
                    </div>
                </div>

                <div id="packages_holder"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="package_info_loader" class="d-none"><p style="text-align: center;"><img src="{{ asset('images/loader.gif') }}" width="52" height="52"></p></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 d-none" id="package_desc_container">
                        <h5>Package information and requirements</h5>
                        <div id="package_desc"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger d-none" id="package_error">{{ __('app.no_package_selected_error') }}</div>
                        <br>
                    </div>
                </div>

            </div>
        </div>

        <footer class="footer d-none d-sm-none d-md-block d-lg-block d-xl-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="text-copyrights">
                            {{ __('auth.copyrights') }}. &copy; {{ date('Y') }}. {{ __('auth.rights_reserved') }} {{ config('settings.business_name', 'Bookify') }}.
                        </span>
                    </div>
                    <div class="col-md-6 text-right">
                        @if(Auth::user())
                        <button type="submit" class="navbar-btn btn btn-primary btn-lg ml-auto">
                            <i class="far fa-clock"></i> &nbsp; {{ __('app.welcome_post_btn') }}
                        </button>
                        @else
                        <a href="{{ route('login') }}" class="navbar-btn btn btn-primary btn-lg ml-auto">
                            <i class="fa fa-sign-in-alt"></i> &nbsp; Login/Register
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </footer>
 
        {{--FOOTER FOR PHONES--}}

        <footer class="footer d-block d-sm-block d-md-none d-lg-none d-xl-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if(Auth::user())
                        <button type="submit" class="navbar-btn btn btn-primary btn-lg ml-auto">
                            <i class="far fa-clock"></i> &nbsp; {{ __('app.welcome_post_btn') }}
                        </button>
                        @else
                        <a href="{{ route('login') }}" class="navbar-btn btn btn-primary btn-lg ml-auto login-btn">
                            <i class="fa fa-sign-in-alt"></i> &nbsp; Login/Register
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </footer>

    </form>

<!-- Modal -->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{asset('images/loader.gif')}}" alt="loading..." srcset="">
                <h2>Loading, please wait...</h2>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        
        //append form with selected package_id

        $('body').on('click', 'a.btn_package_select', function () {
            console.log('first step');
            var package_id = $(this).attr('data-package-id');
            $('#package_error').addClass('d-none');

            $('#package_id').remove();
            $('#booking_step_1').append('<input type="hidden" name="package_id" id="package_id" value="' + package_id + '">');
        // });
        // $('body').on('click', 'a.btn_package_select', function() {
            console.log('second step');
            $('#loadingModal').modal('show');
            $('.btn_package_select').text('{{ __("app.booking_package_btn_select") }}').removeClass('btn-danger').addClass('btn-primary');
            $(this).text('{{ __("app.booking_package_btn_selected") }}').removeClass('btn-primary').addClass('btn-danger');
        // });

        // $('body').on('click', 'a.btn_package_select', function() {
            console.log('third step');
            var package_id = $(this).attr('data-package-id');
            $('#package_info_loader').removeClass('d-none');
            
            $.get("{{ URL('/ajax_package_info') }}", {id:package_id}, function(data){
                
                console.log('fourth step');
                $('#loadingModal').modal('hide');
                $('#package_desc_container').removeClass('d-none');
                $('#package_desc').html(data);

                $('#package_info_loader').addClass('d-none');

                $('html,body').animate({
                    scrollTop: $('#package_desc').offset().top
                }, 'slow');
                console.log('end in ajax');
            });
        });
        
    </script>

@endsection