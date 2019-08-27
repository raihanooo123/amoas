@extends('layouts.app', ['title' => __('app.step_two_page_title')])

@section('styles')

    <style>
        .nav-link.active {
            color: #fff !important;
            background-color: #007bff;
        }
        .nav-link {
            color: #000000!important;
        }

        .form-control{
            padding:0.2em 0.5em;
            font-size: 15px;
        }


    </style>

@endsection

@section('content')

    <div class="jumbotron promo">
        <div class="container">
            <h1 class="text-center promo-heading">{{ __('app.step_two_page_title') }}</h1>
            <p class="promo-desc text-center">{{ __('app.step_two_subtitle') }}</p>
        </div>
    </div>

    <form method="post" id="booking_step_2" action="{{ route('postStep2') }}">
        {{ csrf_field() }}
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress mx-lg-5">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Tab panes -->
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Nav tabs -->
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    <legend>Personal Information</legend>
                                    <br>
                                    <div class="form-group col-md-6">
                                        <label for="">Name</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Last Name</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Father Name</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Grand Father Name</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Birth Place</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Marital Status</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Living Duration in abroad</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Last return date to Afghanistan</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Contact No. in abroad</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Email Address</label>
                                        <input
                                                name="address" type="text" class="form-control form-control-lg">
                                        <p class="form-text text-danger d-none" id="address_error_holder">
                                            {{ __('app.address_error') }}
                                        </p>
                                    </div>
                                    <div class="form-group offset-md-10 col-md-2">
                                        <button class="btn btn-primary btn-block" onclick="validate(this, 'v-pills-profile', event)">
                                            <i class="fa fa-arrow-right"></i> NEXT
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                Profile woking fine
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                Messages woking fine
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                Settings woking fine
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="slots_loader" class="d-none"><p style="text-align: center;"><img src="{{ asset('images/loader.gif') }}" width="52" height="52"></p></div>
                    </div>
                </div>

                <br>

                <div id="slots_holder"></div>

                <div class="row col-md-12">
                    <div class="alert alert-danger col-md-12 d-none" id="slot_error" style="margin-bottom: 50px;">
                        {{ __('app.time_slot_error') }}
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
                </div>
            </div>
        </footer>

        {{--FOOTER FOR PHONES--}}

    </form>

@endsection

@section('scripts')
<script>
    
    function validate(param, nextTab, e){
        $('#v-pills-tab ' + '#' +nextTab).on('click', function (e) {
            e.preventDefault();
            $(param).tab('show');
        });
    }

</script>
@endsection