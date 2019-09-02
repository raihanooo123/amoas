@extends('layouts.app', ['title' => __('app.step_two_page_title')])

@section('styles')

<style>
    .nav-link.active {
        color: #fff !important;
        background-color: #007bff;
    }

    .nav-link {
        color: #000000 !important;
    }

    .form-control {
        padding: 0.2em 0.5em;
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

<form method="post" action="{{ route('postStep2') }}">
    {{ csrf_field() }}
    <div class="container">
        <div class="content">
            
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <!-- Tab panes -->
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-persoanl-information-tab" data-toggle="pill"
                            href="#v-pills-persoanl-information" role="tab" aria-controls="v-pills-persoanl-information"
                            aria-selected="true">Personal Information</a>
                        <a class="nav-link disabled" id="v-pills-services-tab" data-toggle="pill"
                            href="#v-pills-services" role="tab" aria-controls="v-pills-services"
                            aria-selected="false">Select Service</a>
                        <a class="nav-link disabled" id="v-pills-address-tab" data-toggle="pill" href="#v-pills-address"
                            role="tab" aria-controls="v-pills-address" aria-selected="false">Addresses</a>
                        <a class="nav-link disabled" id="v-pills-detailed-information-tab" data-toggle="pill"
                            href="#v-pills-detailed-information" role="tab" aria-controls="v-pills-detailed-information"
                            aria-selected="false">Detailed Information</a>
                        <a class="nav-link disabled" id="v-pills-sibling-information-tab" data-toggle="pill"
                            href="#v-pills-sibling-information" role="tab" aria-controls="v-pills-sibling-information"
                            aria-selected="false">Sibling Information</a>
                        <a class="nav-link disabled" id="v-pills-delegate-tab" data-toggle="pill"
                            href="#v-pills-delegate" role="tab" aria-controls="v-pills-delegate"
                            aria-selected="false">Delegate Information</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-persoanl-information" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <legend>Personal Information</legend>
                            <h6 class="text-danger">All field should fill in persian.</h6>
                            <div class="row">
                                <br>
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input name="name" value="{{ old('name') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Last Name</label>
                                    <input name="last_name" required minlength="3" value="{{ old('last_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Father Name</label>
                                    <input name="father_name" required minlength="3" value="{{ old('father_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Grand Father Name</label>
                                    <input name="grand_father_name" required minlength="3"
                                        value="{{ old('grand_father_name') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Birth Place</label>
                                    <input name="birth_place" required minlength="3" value="{{ old('birth_place') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Marital Status</label>
                                    <input name="marital_status" reuqired value="{{ old('marital_status') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Living Duration in abroad</label>
                                    <div class="input-group">
                                        <input name="living_duration" required value="{{ old('living_duration') }}"
                                            type="text" class="form-control personal-information form-control-lg">
                                        <div class="input-group-append">
                                            <select name="" class="form-control personal-information">
                                                <option value="months">Months</option>
                                                <option value="years" selected>Years</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <input name="living_duration" value="{{ old('living_duration') }}" type="text"
                                    class="form-control form-control-lg"> --}}
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Last return date to Afghanistan</label>
                                    <input name="last_trip" value="{{ old('last_trip') }}" type="date" required
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Contact No. in abroad</label>
                                    <input name="contact_no" value="{{ old('contact_no') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email Address</label>
                                    <input name="email" value="{{ old('email') }}" required type="email"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group offset-md-10 col-md-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-persoanl-information', 'v-pills-services-tab', event)">
                                        <i class="fa fa-arrow-right"></i> NEXT
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-services" role="tabpanel"
                            aria-labelledby="v-pills-services-tab">
                            <div class="row">
                                <legend>Which service you want?</legend>
                                <br>
                                <div class="form-group col-md-12">
                                    <label for="">Available Services</label>
                                    <select class="form-control" name="service_id">
                                        @foreach (\App\Models\Verification\Service::all() as $service)
                                        <option value="{{$service->id}}"> {{$service->name}} ({{$service->label_en}})
                                        </option>
                                        @endforeach
                                    </select>
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group offset-md-10 col-md-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-services', 'v-pills-address-tab', event)">
                                        <i class="fa fa-arrow-right"></i> NEXT
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                <legend>Addresses of applicant.</legend>
                                <br>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Original Village</label>
                                    <input name="original-village" value="{{ old('original-village') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Original District</label>
                                    <input name="original-district" value="{{ old('original-district') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Original Province</label>
                                    <input name="original-district" value="{{ old('original-district') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Current City</label>
                                    <input name="current-city" value="{{ old('current-city') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Current District</label>
                                    <input name="current-state" value="{{ old('current-state') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Current Country</label>
                                    <input name="current-country" value="{{ old('current-country') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group offset-md-10 col-md-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-address', 'v-pills-detailed-information-tab', event)">
                                        <i class="fa fa-arrow-right"></i> NEXT
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-detailed-information" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <div class="row">
                                <legend>More details of applicant.</legend>
                                <br>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Height <small>in centimeter (cm)</small></label>
                                    <input name="current-city" value="{{ old('current-city') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Eyes Color</label>
                                    <input name="current-state" value="{{ old('current-state') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Skin Color</label>
                                    <input name="current-country" value="{{ old('current-country') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Hair Color</label>
                                    <input name="current-country" value="{{ old('current-country') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="">Other Information</label>
                                    <input name="current-country" value="{{ old('current-country') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group offset-md-10 col-md-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-detailed-information', 'v-pills-sibling-information-tab', event)">
                                        <i class="fa fa-arrow-right"></i> NEXT
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-sibling-information" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <div class="row">
                                <legend>Applicant siblings information.</legend>
                                <br>
                                <div class="form-group col-md-6">
                                    <label for="">Siblings Name</label>
                                    <input name="name" value="{{ old('name') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Siblings Last Name</label>
                                    <input name="last_name" required minlength="3" value="{{ old('last_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Siblings Father Name</label>
                                    <input name="father_name" required minlength="3" value="{{ old('father_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Siblings Grand Father Name</label>
                                    <input name="grand_father_name" required minlength="3"
                                        value="{{ old('grand_father_name') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Sibling relation with applicant</label>
                                    <select class="form-control" name="service_id">
                                        @foreach (\App\Models\Verification\Sibling::all() as $sibling)
                                        <option value="{{$sibling->id}}"> {{$sibling->code}} ({{$sibling->label_en}})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row col-12">
                                    <label class="col-sm-12 col-md-12">Siblings Tazkira Details </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputPassword"
                                            placeholder="Page No.">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputPassword"
                                            placeholder="Version No.">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputPassword"
                                            placeholder="Note No.">
                                    </div>
                                </div>
                                <div class="form-group row col-12">
                                    <label class="col-sm-12 col-md-12">Siblings Tazkira Issue Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputPassword" placeholder="Year">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputPassword" placeholder="Month">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputPassword" placeholder="Day">
                                    </div>
                                </div>
                                <div class="form-group offset-md-10 col-md-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-sibling-information', 'v-pills-delegate-tab', event)">
                                        <i class="fa fa-arrow-right"></i> NEXT
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-delegate" role="tabpanel"
                            aria-labelledby="v-pills-delegate-tab">
                            <div class="row">
                                <legend>Applicant delegate in Afghanistan.</legend>
                                <br>
                                <div class="form-group col-md-4">
                                    <label for="">Delegate Name</label>
                                    <input name="name" value="{{ old('name') }}" type="text"
                                        class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Delegate Last Name</label>
                                    <input name="last_name" required minlength="3" value="{{ old('last_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Delegate Father Name</label>
                                    <input name="father_name" required minlength="3" value="{{ old('father_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Delegate Contact No. 1</label>
                                    <input name="father_name" required minlength="3" value="{{ old('father_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Delegate Contact No. 2</label>
                                    <input name="father_name" required minlength="3" value="{{ old('father_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Delegate email</label>
                                    <input name="father_name" required minlength="3" value="{{ old('father_name') }}"
                                        type="text" class="form-control personal-information form-control-lg">
                                    <p class="form-text text-danger d-none" id="address_error_holder">
                                        {{ __('app.address_error') }}
                                    </p>
                                </div>
                                <div class="form-group offset-md-10 col-md-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-delegate', '', event)">
                                        <i class="fa fa-arrow-right"></i> NEXT
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="slots_loader" class="d-none">
                        <p style="text-align: center;"><img src="{{ asset('images/loader.gif') }}" width="52"
                                height="52"></p>
                    </div>
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
                        {{ __('auth.copyrights') }}. &copy; {{ date('Y') }}. {{ __('auth.rights_reserved') }}
                        {{ config('settings.business_name', 'Bookify') }}.
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
    function validate(param, nextTab, e) {
        e.preventDefault();

        $('#' + param + '-tab').removeClass("active show");
        var next = $('#' + nextTab);
        next.addClass("active show");
        next.removeClass("disabled");

        var activedTab = $('.tab-content > .active');
        activedTab.removeClass("active show");
        activedTab.next().addClass("active show");
    }
</script>
@endsection