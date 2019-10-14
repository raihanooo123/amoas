@extends('layouts.app', ['title' => __('app.step_two_page_title')])

@section('styles')

<link rel="stylesheet" href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}">

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
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                            role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100"></div>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                            role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100">50%</div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <br><br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.provide_address') }}</h5>
                    <div class="form-group">
                        <input id="autocomplete" placeholder="{{ __('app.provide_address') }}  {{ __('app.here') }}" 
                        name="email" type="email" class="form-control form-control-lg" value="{{old('email')}}">
                        <small>{{ __('app.email_description') }}</small>
                        <p class="form-text text-danger d-none" id="address_error_holder">
                            {{ __('app.address_error') }}
                        </p>
                    </div>
                    <br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.postal') }} / {{ __('app.zip') }}</h5>
                    <div class="form-group">
                        <input id="autocomplete" placeholder="{{ __('app.postal') }} / {{ __('app.zip') }} {{ __('app.here') }}"
                            name="postal" type="text" class="form-control form-control-lg" value="{{old('postal')}}">
                        <small>&nbsp;</small>
                        <p class="form-text text-danger d-none" id="address_error_holder">
                            {{ __('app.address_error') }}
                        </p>
                    </div>
                    <br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.phone') }}</h5>
                    <div class="form-group">
                        <input id="autocomplete" placeholder="{{ __('app.phone') }} {{ __('app.here') }}"
                            name="phone" type="text" class="form-control form-control-lg" value="{{old('phone')}}">
                        <small>&nbsp;</small>
                        <p class="form-text text-danger d-none" id="address_error_holder">
                            {{ __('app.address_error') }}
                        </p>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <br><br>
                        <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.full_name') }}</h5>
                        {{-- <small>{{ __('app.email_description') }}</small> --}}
                        <div class="form-group">
                            <input id="autocomplete" placeholder="{{ __('app.full_name') }} {{ __('app.here') }}"
                                name="full_name" type="text" class="form-control form-control-lg" value="{{old('full_name')}}">
                            <small>&nbsp;</small>
                            <p class="form-text text-danger d-none" id="address_error_holder">
                                {{ __('app.address_error') }}
                            </p>
                        </div>
                        <br>
                        <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.id_card') }}</h5>
                        <div class="form-group">
                            <input id="autocomplete" placeholder="{{ __('app.id_card') }} {{ __('app.here') }}"
                                name="idcard" type="text" class="form-control form-control-lg" value="{{old('idcard')}}">
                            <small>{{ __('app.id_card_description') }}</small>
                            <p class="form-text text-danger d-none" id="address_error_holder">
                                {{ __('app.address_error') }}
                            </p>
                        </div>
                        <br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.participant') }}</h5>
                    <div class="form-group">
                        <input id="autocomplete" placeholder="{{ __('app.participant') }} {{ __('app.here') }}"
                            name="participant" type="number" class="form-control form-control-lg" value="{{old('participant')}}">
                        <small>{{ __('app.participant_desc') }}</small>
                        <p class="form-text text-danger d-none" id="address_error_holder">
                            {{ __('app.address_error') }}
                        </p>
                    </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.address') }}</h5>
                    <div class="form-group">
                        <input id="autocomplete" placeholder="{{ __('app.address') }} {{ __('app.here') }}"
                            name="address" type="text" class="form-control form-control-lg" value="{{old('address')}}">
                        <small>{{ __('app.address_desc') }}</small>
                        <p class="form-text text-danger d-none" id="address_error_holder">
                            {{ __('app.address_error') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-12">
                    <br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.select_date') }}</h5>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="event_date" id="event_date"
                            placeholder="{{ __('app.date_placeholder') }}" value="{{old('email')}}">
                        <p class="form-text text-danger d-none" id="date_error_holder">
                            {{ __('app.date_error') }}
                        </p>
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
                <div class="col-md-6 text-right">
                    <button type="submit" class="navbar-btn btn btn-primary btn-lg ml-auto">
                        {!! __('pagination.next') !!}
                    </button>
                </div>
            </div>
        </div>
    </footer>

    {{--FOOTER FOR PHONES--}}

    <footer class="footer d-block d-sm-block d-md-none d-lg-none d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="navbar-btn btn btn-primary btn-lg ml-auto">
                        {!! __('pagination.next') !!}
                    </button>
                </div>
            </div>
        </div>
    </footer>

</form>

@endsection

@section('scripts')


<script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
    $('#event_date').datepicker({
        orientation: "auto right",
        autoclose: true,
        startDate: today,
        format: 'dd-mm-yyyy',
        daysOfWeekDisabled: "{{ $disable_days_string }}",
        language: "{{ App::getLocale() }}"
    });
</script>


@if(config('settings.google_maps_api_key') != NULL)
<script src="{{ asset('js/map.js') }}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.google_maps_api_key') }}&libraries=places&callback=initAutocomplete"
    async defer></script>
@endif



@endsection