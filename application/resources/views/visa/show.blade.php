@extends('layouts.admin', ['title' => __('backend.bookings')])

@section('content')

<div class="page-title">
    <h3>{{ __('backend.tazkira') }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">{{ __('backend.home') }}</a></li>
            <li class="active">{{ __('backend.tazkira') }}</li>
            <li><a href="{{ route('verification.index') }}">{{ __('backend.verification') }}</a></li>
        </ol>
    </div>
</div>

<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            @include('alerts.bookings')

            <a class="btn btn-primary btn-lg btn-add" href="{{ route('verification.create') }}"><i
                    class="fa fa-plus"></i> {{__('tazkira.add')}} </a>
            <a class="btn btn-default btn-lg btn-add" href="{{ route('verification.edit', $visa_form->id) }}"><i
                    class="fa fa-edit"></i> {{__('tazkira.edit')}} </a>
            <!-- <a class="btn btn-default btn-lg btn-add" href="{{-- route('verification.print', $visa_form->id) --}}"><i class="fa fa-print"></i> {{__('tazkira.print')}} </a> -->
            <span class="dropdown">
                <a class="btn btn-default btn-lg btn-add dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-print"></i> {{__('tazkira.print')}}
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-item" href="#">
                        <a class="btn btn-default btn-lg"
                            href="{{ route('verification.print.excel', $visa_form->id) }}"><i
                                class="fa fa-file-excel-o"></i> {{__('tazkira.print')}} {{__('tazkira.excel')}} </a>
                    </li>
                    <li class="dropdown-item" href="#">
                        <a class="btn btn-default btn-lg"
                            href="{{ route('verification.print.word', $visa_form->id) }}"><i
                                class="fa fa-file-word-o"></i> {{__('tazkira.print')}} {{__('tazkira.word')}} </a>
                    </li>
                    <li class="dropdown-item" href="#">
                        <a class="btn btn-default btn-lg"
                            href="{{ route('verification.print.pdf', $visa_form->id) }}"><i
                                class="fa fa-file-pdf-o"></i> {{__('tazkira.print')}} {{__('tazkira.pdf')}} </a>
                    </li>
                </ul>

                <button class="btn btn-lg btn-add btn-info" data-toggle="modal" data-target="#myModal"><i
                        class="fa fa-check"></i> {{__('backend.reserve_time')}} </button>
                <a class="btn btn-lg btn-add btn-default" href="{{ route('verification.edit', $visa_form->id) }}"><i
                        class="fa fa-close"></i> {{__('backend.reject')}} </a>
            </span>

            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                </div>
                @php
                if(app()->isLocale('dr') || app()->isLocale('ps')){
                setlocale(LC_TIME, 'fa_IR');
                Carbon\Carbon::setLocale('fa');
                }
                @endphp
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{$visa_form->image ? asset('img/visa/' . $visa_form->image->path) :
                                    asset('images/profile-placeholder.png') }}" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.department')}}</label>
                            <p><strong>{{ $visa_form->department->name_en }}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.serial_no')}}</label>
                            <p><strong>{{$visa_form->serial_no}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.title')}}</label>
                            <p><strong>{{ucwords($visa_form->title)}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.family_name')}}</label>
                            <p><strong>{{$visa_form->family_name}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.given_name')}}</label>
                            <p><strong>{{$visa_form->given_name}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.father_name')}}</label>
                            <p><strong>{{$visa_form->father_name}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.dob')}}</label>
                            <p><strong>{{$visa_form->dob}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.birth_country')}}</label>
                            <p><strong>{{$visa_form->birthCountry->name_en}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.gender')}}</label>
                            <p><strong>{{ucwords($visa_form->gender)}}</strong></p>
                        </div>

                        <div class="col-md-3">
                            <label for="">{{ __('backend.marital_status')}}</label>
                            <p><strong>{{$visa_form->marital_status}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.residence_country')}}</label>
                            <p><strong>{{$visa_form->country->name_en}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.nationality')}}</label>
                            <p><strong>{{$visa_form->nationality}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.other_nationality')}}</label>
                            <p><strong>{{$visa_form->other_nationality}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.under_18')}}</label>
                            <p><strong>{{$visa_form->under_18 ? 'Yes' : 'No'}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.address')}}</label>
                            <p><strong>{{$visa_form->address}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.email')}}</label>
                            <p><strong>{{$visa_form->email}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.mobile')}}</label>
                            <p><strong>{{$visa_form->mobile}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.occupation')}}</label>
                            <p><strong>{{$visa_form->occupation}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.employer_name')}}</label>
                            <p><strong>{{$visa_form->employer_name}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.employer_address')}}</label>
                            <p><strong>{{$visa_form->employer_address}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.pre_employer_name')}}</label>
                            <p><strong>{{$visa_form->pre_employer_name}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.status')}}</label>
                            <p><strong>{{$visa_form->status}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.pre_employer_address')}}</label>
                            <p><strong>{{$visa_form->pre_employer_address}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.visa_type')}}</label>
                            <p><strong>{{$visa_form->type->label_en}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.purpose')}}</label>
                            <p><strong>{{$visa_form->purpose}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.entry_date')}}</label>
                            <p><strong>{{$visa_form->entry_date}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.intend_duration')}}</label>
                            <p><strong>{{$visa_form->intend_duration}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.entry_point')}}</label>
                            <p><strong>{{$visa_form->entry_point}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.children_no')}}</label>
                            <p><strong>{{$visa_form->children_no}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.visit_places')}}</label>
                            <p><strong>{{$visa_form->visit_places}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.af_address')}}</label>
                            <p><strong>{{$visa_form->af_address}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.visited_before')}}</label>
                            <p><strong>{{$visa_form->visited_before}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.applied_visa')}}</label>
                            <p><strong>{{$visa_form->applied_visa}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.criminal_record')}}</label>
                            <p><strong>{{$visa_form->criminal_record}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.passport_type')}}</label>
                            <p><strong>{{$visa_form->passport_type}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.passport_no')}}</label>
                            <p><strong>{{$visa_form->passport_no}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.issue_place')}}</label>
                            <p><strong>{{$visa_form->issue_place}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.issue_date')}}</label>
                            <p><strong>{{$visa_form->issue_date}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.expire_date')}}</label>
                            <p><strong>{{$visa_form->expire_date}}</strong></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">{{ __('backend.registrar_id')}}</label>
                            <p><strong>{{$visa_form->registrar_id ? $visa_form->registrar->email : 'N/A' }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{__('backend.acceptModal')}}</h4>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" id="booking_step_2" action="{{ route('postStep2') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <h5>{{ __('app.select_date') }}</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="event_date"
                                        id="event_date" placeholder="{{ __('app.date_placeholder') }}"
                                        autocomplete="off">
                                    <p class="form-text text-danger d-none" id="date_error_holder">
                                        {{ __('app.date_error') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="slots_loader" class="d-none">
                                    <p style="text-align: center;"><img src="{{ asset('images/loader.gif') }}"
                                            width="52" height="52"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="slots_holder"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger col-md-12 d-none" id="slot_error"
                                    style="margin-bottom: 50px;">
                                    {{ __('app.time_slot_error') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>{{ __('app.add_instructions') }}</h5>
                                    <textarea class="form-control" name="instructions" rows="7"
                                        placeholder="{{ __('app.add_instructions_placeholder') }}"></textarea>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">{{__('backend.reserve_time')}}</button>
            </div>
        </div>
    </div>
</div>

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


@endsection