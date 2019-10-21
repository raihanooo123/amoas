@extends('layouts.app', ['title' => __('app.step_two_page_title')])

@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/select2-bootstrap.min.css') }}">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="progress mx-lg-5">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                </div>
            </div>
            <br><br>
            @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-12">
                    <h4>{{ __('app.validation_t_message') }}</h4>
                    <div class="error">
                        <ol>
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <br><br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.provide_address') }}</h5>
                    <div class="form-group">
                        <input id="autocomplete" placeholder="{{ __('app.provide_address') }}  {{ __('app.here') }}" name="email" type="email" class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email', auth()->user()->email)}}">
                        <small>{{ __('app.email_description') }}</small>
                        <p class="form-text text-danger d-none" id="address_error_holder">
                            {{ __('app.address_error') }}
                        </p>
                    </div>
                    <br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.postal') }} / {{ __('app.zip') }}</h5>
                    <div class="form-group">
                        <input id="autocomplete" placeholder="{{ __('app.postal') }} {{ __('app.here') }}" name="postal" type="text" class="form-control form-control-lg {{ $errors->has('postal') ? 'is-invalid' : '' }}" value="{{old('postal')}}">
                        <small>&nbsp;</small>
                        <p class="form-text text-danger d-none" id="address_error_holder">
                            {{ __('app.address_error') }}
                        </p>
                    </div>
                    <br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.phone') }}</h5>
                    <div class="form-group">
                        <input id="autocomplete" placeholder="{{ __('app.phone') }} {{ __('app.here') }}" name="phone" type="text" class="form-control form-control-lg {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{old('phone')}}">
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
                            <input id="autocomplete" placeholder="{{ __('app.full_name') }} {{ __('app.here') }}" name="full_name" type="text" class="form-control form-control-lg {{ $errors->has('full_name') ? 'is-invalid' : '' }} " value="{{old('full_name', auth()->user()->first_name .' ' . auth()->user()->last_name)}}">
                            <small>&nbsp;</small>
                            <p class="form-text text-danger d-none" id="address_error_holder">
                                {{ __('app.address_error') }}
                            </p>
                        </div>
                        <br>
                        <h5><i class="fa fa-asterisk text-danger"></i> {{ __('app.id_card') }}</h5>
                        <div class="form-group">
                            <input id="autocomplete" placeholder="{{ __('app.id_card') }} {{ __('app.here') }}" name="idcard" type="text" class="form-control form-control-lg {{ $errors->has('idcard') ? 'is-invalid' : '' }}" value="{{old('idcard')}}">
                            <small>{{ __('app.id_card_description') }}</small>
                            <p class="form-text text-danger d-none" id="address_error_holder">
                                {{ __('app.address_error') }}
                            </p>
                        </div>
                        <br>
                        <h5>{{ __('app.participant') }}</h5>
                        <div class="form-group">
                            <input id="autocomplete" min="1" max="8" placeholder="{{ __('app.participant') }} {{ __('app.here') }}" name="participant" type="number" class="form-control form-control-lg {{ $errors->has('participant') ? 'is-invalid' : '' }}" value="{{old('participant')}}">
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
                        <input id="autocomplete" placeholder="{{ __('app.address') }} {{ __('app.here') }}" name="address" type="text" class="form-control form-control-lg {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{old('address')}}">
                        <small>{{ __('app.address_desc') }}</small>
                        <p class="form-text text-danger d-none" id="address_error_holder">
                            {{ __('app.address_error') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-12">
                    <br>
                    <h5><i class="fa fa-asterisk text-danger"></i> {{ __('backend.department') }}</h5>
                    <div class="form-group">
                        <select
                            class="form-control simple-select2 form-control-lg {{ $errors->has('department_id') ? 'is-invalid' : '' }}"
                            name="department_id">
                            @foreach (\App\Department::whereIn('type', ['embassy', 'consulate'])->get() as $department)
                            <option value="{{$department->id}}" {{ $department->id == 96 ? 'selected' : '' }}
                                {{ $department->id == old('department_id') ? 'selected' : null }}>
                                {{ ucfirst($department->name_en) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <br>
            <br>
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

<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

<script>
    $(function () {
        $('.simple-select2').select2({
                'theme': 'bootstrap'
            });
    });
</script>

@if(config('settings.google_maps_api_key') != NULL)
<script src="{{ asset('js/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.google_maps_api_key') }}&libraries=places&callback=initAutocomplete" async defer>
</script>
@endif

@endsection