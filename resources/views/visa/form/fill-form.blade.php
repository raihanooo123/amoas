@extends('layouts.app', ['title' => __('app.step_two_page_title')])

@section('pure-style')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/select2-bootstrap.min.css') }}">
@endsection
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
        padding: 0.3em 0.5em;
        font-size: 15px;
    }

    i.fa-asterisk {
        font-size: 0.7em !important;
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

<form method="post" id="save-form" action="{{ route('visa-form.fill.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Afghanistan Online Visa Form</h3>
                    <hr>
                    @if (count($errors) > 0)
                    <h4>Invalid information. please fill the following form correctly.</h4>
                    <div class="error">
                        <ol>
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <!-- Tab panes -->
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-persoanl-information-tab" data-toggle="pill"
                            href="#v-pills-persoanl-information" role="tab" aria-controls="v-pills-persoanl-information"
                            aria-selected="true">Personal Information</a>
                        <a class="nav-link disabled" id="v-pills-services-tab" data-toggle="pill"
                            href="#v-pills-services" role="tab" aria-controls="v-pills-services"
                            aria-selected="false">Contact Details</a>
                        <a class="nav-link disabled" id="v-pills-address-tab" data-toggle="pill" href="#v-pills-address"
                        role="tab" aria-controls="v-pills-address" aria-selected="false">Employment Details</a>
                        <a class="nav-link disabled" id="v-pills-delegate-tab" data-toggle="pill"
                            href="#v-pills-delegate" role="tab" aria-controls="v-pills-delegate"
                            aria-selected="false">Passport Details</a>
                        <a class="nav-link disabled" id="v-pills-detailed-information-tab" data-toggle="pill"
                            href="#v-pills-detailed-information" role="tab" aria-controls="v-pills-detailed-information"
                            aria-selected="false">Visa Details</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-persoanl-information" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <legend>Personal Information</legend>
                            <div class="row">
                                <br>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Title</label>
                                    <select name="title" required
                                        class="form-control personal-information {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                        <option></option>
                                        <option value="mr." {{ 'mr.' == old('title') ? 'selected' : null }}>Mr.</option>
                                        <option value="mrs." {{ 'mrs.' == old('title') ? 'selected' : null }}>Mrs.</option>
                                        <option value="ms." {{ 'ms.' == old('title') ? 'selected' : null }}>Ms.</option>
                                        <option value="eng." {{ 'eng.' == old('title') ? 'selected' : null }}>Eng.</option>
                                        <option value="dr." {{ 'dr.' == old('title') ? 'selected' : null }}>Dr.</option>
                                        <option value="pro." {{ 'pro.' == old('title') ? 'selected' : null }}>Pro.</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Family Name <small>shown in passport</small></label>
                                    <input name="family_name" required value="{{ old('family_name') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('family_name') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Given Name <small>shown in passport</small></label>
                                    <input name="given_name" required value="{{ old('given_name') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('given_name') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Father's Full Name</label>
                                    <input name="father_name" required value="{{ old('father_name') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('father_name') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Marital Status</label>
                                    <select name="marital_status" required
                                        class="form-control personal-information {{ $errors->has('marital_status') ? 'is-invalid' : '' }}">
                                        <option></option>
                                        <option value="single" {{ 'single' == old('marital_status') ? 'selected' : null }}>Single</option>
                                        <option value="engaged" {{ 'engaged' == old('marital_status') ? 'selected' : null }}>Engaged</option>
                                        <option value="married" {{ 'married' == old('marital_status') ? 'selected' : null }}>Married</option>
                                        <option value="separated" {{ 'separated' == old('marital_status') ? 'selected' : null }}>Separated</option>
                                        <option value="divorced" {{ 'divorced' == old('marital_status') ? 'selected' : null }}>Divorced</option>
                                        <option value="widow/widower" {{ 'widow/widower' == old('marital_status') ? 'selected' : null }}>Widow/Widower</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Date of Birth</label>
                                    <input name="dob" value="{{ old('dob') }}" type="date" required
                                        class="form-control personal-information form-control-lg {{ $errors->has('dob') ? 'is-invalid' : '' }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Current Country</label>
                                    <select required
                                        class="form-control simple-select2 {{ $errors->has('residence_country') ? 'is-invalid' : '' }}"
                                        name="residence_country">
                                        @foreach (\DB::table('countries')->get() as $country)
                                        <option value="{{$country->id}}"
                                            {{ $country->id == old('residence_country') ? 'selected' : null }}>
                                            {{ ucfirst($country->name_en) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row col-6">
                                    <label class="col-12"><i class="fa fa-asterisk text-danger "></i> Gender</label>
                                    <div class="col-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="gender" value="male" checked
                                                class="custom-control-input" id="customControlAutosizingMale">
                                            <label class="custom-control-label"
                                                for="customControlAutosizingMale">Male</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="gender" value="female"
                                                class="custom-control-input" id="customControlAutosizingFemale">
                                            <label class="custom-control-label"
                                                for="customControlAutosizingFemale">Female</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Nationality</label>
                                    <input name="nationality" required value="{{ old('nationality') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('nationality') ? 'is-invalid' : '' }}">
                                </div>

                                <div class="form-group row col-6">
                                    <label class="col-12"><i class="fa fa-asterisk text-danger "></i> Child
                                        <small>(Under 18
                                            years)</small></label>
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="under_18" value="1" class="custom-control-input"
                                                id="customControlAutosizingYes">
                                            <label class="custom-control-label"
                                                for="customControlAutosizingYes">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="under_18" value="0" checked
                                                class="custom-control-input" id="customControlAutosizingNo">
                                            <label class="custom-control-label"
                                                for="customControlAutosizingNo">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Country of Birth</label>
                                    <select required
                                        class="form-control simple-select2 {{ $errors->has('birth_country') ? 'is-invalid' : '' }}"
                                        name="birth_country">
                                        @foreach (\DB::table('countries')->get() as $country)
                                        <option value="{{$country->id}}"
                                            {{ $country->id == old('birth_country') ? 'selected' : null }}>
                                            {{ ucfirst($country->name_en) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Other Nationality</label>
                                    <input name="other_nationality" value="{{ old('other_nationality') }}"
                                        type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('other_nationality') ? 'is-invalid' : '' }}">
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
                            <legend>Contact details of applicant.</legend>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Current Address</label>
                                    <input name="address" required value="{{ old('address') }}" type="text"
                                        class="form-control form-control-lg {{ $errors->has('address') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Email <small>We will inform you via this email.</small></label>
                                    <input name="email" required value="{{ old('email') }}" type="email"
                                        class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Mobile</label>
                                    <input name="mobile" required value="{{ old('mobile') }}" type="text"
                                        class="form-control form-control-lg {{ $errors->has('mobile') ? 'is-invalid' : '' }}">
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
                            <legend>Employment details of applicant.</legend>
                            <br>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Current Occupation</label>
                                    <input name="occupation" required value="{{ old('occupation') }}" type="text" class="form-control personal-information form-control-lg
                                {{ $errors->has('occupation') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Employers' Name</label>
                                    <input name="employer_name" value="{{ old('employer_name') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('employer_name') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Employers' Address</label>
                                    <input name="employer_address" value="{{ old('employer_address') }}"
                                        type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('employer_address') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Previous Employers' Name</label>
                                    <input name="pre_employer_name" value="{{ old('pre_employer_name') }}"
                                        type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('pre_employer_name') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Previous Employers' Address</label>
                                    <input name="pre_employer_address" value="{{ old('pre_employer_address') }}"
                                        type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('pre_employer_address') ? 'is-invalid' : '' }}">
                                </div>

                                <div class="form-group offset-md-10 col-md-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-address', 'v-pills-delegate-tab', event)">
                                        <i class="fa fa-arrow-right"></i> NEXT
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="v-pills-delegate" role="tabpanel"
                            aria-labelledby="v-pills-delegate-tab">
                            <legend>Applicant's Passport Details.</legend>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Passport Type</label>
                                    <input name="passport_type" required value="{{ old('passport_type') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('passport_type') ? 'is-invalid' : '' }}">
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Passport Number</label>
                                    <input name="passport_no" required value="{{ old('passport_no') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('passport_no') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Place of Issue</label>
                                    <input name="issue_place" required value="{{ old('issue_place') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('issue_place') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Issue Date</label>
                                    <input name="issue_date" required value="{{ old('issue_date') }}" type="date"
                                        class="form-control personal-information form-control-lg {{ $errors->has('issue_date') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Expiry Date</label>
                                    <input name="expire_date" required value="{{ old('expire_date') }}" type="date"
                                        class="form-control personal-information form-control-lg {{ $errors->has('expire_date') ? 'is-invalid' : '' }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Photo <small>please upload a passport size photo.</small></label>
                                    <input type="file" required name="photo" class="form-control form-control-file {{ $errors->has('photo') ? 'is-invalid' : '' }}">
                                </div>

                                <div class="form-group offset-md-10 col-md-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-delegate', 'v-pills-detailed-information-tab', event)">
                                        <i class="fa fa-arrow-right"></i> NEXT
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-detailed-information" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <legend>Visa Details</legend>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Embassy or Consulate want to apply for Visa. <small>Select the nearest embassy or consulate</small> </label>
                                    <select
                                        class="form-control simple-select2 {{ $errors->has('department_id') ? 'is-invalid' : '' }}"
                                        name="department_id">
                                        @foreach (\App\Department::whereIn('type', ['embassy', 'consulate'])->get() as $department)
                                        <option value="{{$department->id}}"
                                            {{ $department->id == old('department_id') ? 'selected' : null }}>
                                            {{ ucfirst($department->name_en) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Visa Type</label>
                                    <select
                                        class="form-control simple-select2 {{ $errors->has('visa_type') ? 'is-invalid' : '' }}"
                                        name="visa_type">
                                        @foreach (\DB::table('visa_types')->get() as $country)
                                        <option value="{{$country->id}}"
                                            {{ $country->id == old('visa_type') ? 'selected' : null }}>
                                            {{ ucfirst($country->name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Purpose of Journey</label>
                                    <select multiple required class="form-control {{ $errors->has('purpose[]') ? 'is-invalid' : '' }}"
                                        id="village" name="purpose[]">
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Entry Date</label>
                                    <input name="entry_date" required value="{{ old('entry_date') }}" type="date"
                                        class="form-control personal-information form-control-lg {{ $errors->has('entry_date') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Intended Duration of Stay
                                        <small>(days)</small></label>
                                    <input name="intend_duration" required value="{{ old('intend_duration') }}"
                                        type="number"
                                        class="form-control personal-information form-control-lg {{ $errors->has('intend_duration') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Point of Entry</label>
                                    <input name="entry_point" required value="{{ old('entry_point') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('entry_point') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Number of Children
                                        Accompanied</label>
                                    <input name="children_no" value="{{ old('children_no') }}" type="number"
                                        class="form-control personal-information form-control-lg {{ $errors->has('children_no') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Places in Afghanistan
                                        Intended to Visit</label>
                                    <input name="visit_places" required value="{{ old('visit_places') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('visit_places') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-asterisk text-danger"></i> <label for="">Complete Address in
                                        Afghanistan</label>
                                    <input name="af_address" required value="{{ old('af_address') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('af_address') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Have you ever visited Afghanistan Before? <small>If Yes please provide
                                            details.</small> <small>If No leave it blank.</small></label>
                                    <input name="visited_before" value="{{ old('visited_before') }}"
                                        type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('visited_before') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Have you applied for an Afghanistan Visa Before? <small>If Yes please
                                            provide details.</small> <small>If No leave it blank.</small></label>
                                    <input name="applied_visa" value="{{ old('applied_visa') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('applied_visa') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Do you have a criminal record? <small>If Yes please provide
                                            details.</small> <small>If No leave it blank.</small></label>
                                    <input name="applied_visa" value="{{ old('applied_visa') }}" type="text"
                                        class="form-control personal-information form-control-lg {{ $errors->has('applied_visa') ? 'is-invalid' : '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" required class="custom-control-input" id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">
                                            I Declare that the information provided on this application is true and correct. 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group offset-md-9 col-md-3">
                                    <button class="btn btn-primary btn-block"
                                        onclick="validate('v-pills-detailed-information', '', event)">
                                        <i class="fa fa-arrow-right"></i> SUBMIT
                                    </button>
                                </div>
                            </div>
                        </div>
                        
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

<!-- Modal -->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{asset('images/loader.gif')}}" alt="" srcset="">
                <h2>Loading, please wait...</h2>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

<script>
    $(function () {
        $('.simple-select2').select2({
            'theme': 'bootstrap'
        });


        $('#village').select2({
            'theme': 'bootstrap',
            minimumInputLength: 2,
            tags: true,
            multiple: true,
            ajax: {
                url: "{!! route('ajaxRequest', ['t'=>'village','f'=>['id','label_dr', 'label_en'],'s'=>['name', 'label_dr', 'label_en']]) !!}",
                dataType: 'json',
                type: "get",
                quietMillis: 5,
                data: function (term) {
                    return term;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.label_en + ' (' + item.label_dr + ')',
                                slug: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        $('#district').select2({
            placeholder: 'district here...',
            'theme': 'bootstrap',
            minimumInputLength: 2,
            tags: true,
            ajax: {
                url: "{!! route('ajaxRequest', ['t'=>'districts','f'=>['id','label_dr', 'label_en'],'s'=>['name', 'label_dr', 'label_en']]) !!}",
                dataType: 'json',
                type: "get",
                quietMillis: 5,
                data: function (term) {
                    return term;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.label_en + ' (' + item.label_dr + ')',
                                slug: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

    });

    function validate(param, nextTab, e) {
        e.preventDefault();

        if(!validateSection(param)) return false;
        if (nextTab === undefined || nextTab == null || nextTab.length <= 0){
            $('#save-form').submit();
            $('#loadingModal').modal('show')
        } 
        
        $('#' + param + '-tab').removeClass("active show");
        var next = $('#' + nextTab);
        next.addClass("active show");
        next.removeClass("disabled");

        var activedTab = $('.tab-content > .active');
        activedTab.removeClass("active show");
        activedTab.next().addClass("active show");
    }

    function validateSection(param) {
        console.log(param);
        // var sectionForms = $('#' + param + ' input, select');
        var sectionForms = $('#' + param).find("select, textarea, input");
        console.log(sectionForms);
        var results = []
        for (var i = 0; i < sectionForms.length; i++) {
            console.log(i + ' -> ' + doValidation($(sectionForms[i])));
            results.push(doValidation($(sectionForms[i])));
        }

        return !results.includes(false);
    }

    function doValidation(el){

        var type = el.attr('type');
        if(type == 'text')
            return validateRequired(el);
        // if(type == 'radio')
        //     return el;
        if(type == 'checkbox')
            return validateCheckbox(el);
        if(type == 'file')
            return validateFile(el);
        if(type == 'date')
            return validateRequired(el);
        if(type == 'number')
            return validateRequired(el);
        if(type == 'email')
            return validateRequired(el);
        
        if(el.is('select'))
            return validateRequired(el);

        return true;
        
    }

    function validateRequired(el){
        var required = el.attr("required");
        if (required != null) {
            
            if($.trim(el.val()) <= 0){
                el.addClass('is-invalid');
                el.removeClass('is-valid');
                return false;
            }
            el.removeClass('is-invalid');
            el.addClass('is-valid');
            return true;
        }
        return true;
    }

    function validateCheckbox(el){
        var required = el.attr("required");
        if (required != null) {
            
            if(!el.is(':checked')){
                el.addClass('is-invalid');
                el.removeClass('is-valid');
                return false;
            }
            el.removeClass('is-invalid');
            el.addClass('is-valid');
            return true;
        }
        return true;
    }

    function validateFile(el){
        var required = el.attr("required");
        if (required != null) {
            
            if(el.get(0).files.length === 0){
                el.addClass('is-invalid');
                el.removeClass('is-valid');
                return false;
            }
            el.removeClass('is-invalid');
            el.addClass('is-valid');
            return true;
        }
        return true;
    }

</script>
@endsection