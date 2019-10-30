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

            <a class="btn btn-primary btn-lg btn-add" href="{{ route('visa-form.fill') }}"><i class="fa fa-plus"></i>
                {{__('tazkira.add')}} </a>
            <!-- <a class="btn btn-default btn-lg btn-add" href="{{ route('verification.edit', $visa_form->id) }}"><i
                    class="fa fa-edit"></i> {{__('tazkira.edit')}} </a> -->
            <a class="btn btn-default btn-lg btn-add" href="{{ route('visa.print', $visa_form->id) }}"><i
                    class="fa fa-print"></i> {{__('tazkira.print')}}</a>

            <button class="btn btn-lg btn-add btn-info" data-toggle="modal" data-target="#myModal"><i
                    class="fa fa-check"></i> {{__('backend.reserve_time')}} </button>
            <a class="btn btn-lg btn-add btn-default" href="{{ route('verification.edit', $visa_form->id) }}"><i
                    class="fa fa-close"></i> {{__('backend.reject')}} </a>

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

<script>
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
    $('#event_date').datepicker({
        orientation: "auto right",
        autoclose: true,
        startDate: today,
        // datesDisabled: JSON.parse(''),
        format: 'yyyy-mm-dd',
        // format: 'dd-mm-yyyy',
        daysOfWeekDisabled: "{{ $disable_days_string }}",
        language: "{{ App::getLocale() }}"
    });

    
    //remove date error
    $('#event_date').click(function () {
        $(this).removeClass('is-invalid').addClass('is-valid');
        $('#date_error_holder').addClass('d-none');
    });

    //populate timing slots

    $('input[id="event_date"]').change(function () {
        //populate timing slots
        var selected_date;
        selected_date = $(this).val();

        var URL_CONCAT = $('meta[name="index"]').attr('content');

        //prepare to send ajax request
        $.ajax({
            type: 'POST',
            url:'{{route("slots")}}',
            data: {
                event_date: selected_date,
                package_id: {{ \App\Models\Visa\VisaForm::getPackageId() }},
                _token: '<?php echo csrf_token(); ?>',
            },
            beforeSend: function () {
                $('#slots_loader').removeClass('d-none');
            },
            success: function (response) {
                $('#slots_holder').html(response);

            },
            complete: function () {
                $('#slots_loader').addClass('d-none');
            }
        });
    });

    //append selected slot to booking_step_2 form

    $('#slots_holder').on('click', 'a.btn-slot', function () {
        var slot_time = $(this).attr('data-slot-time');
        $('#slots_holder').find('.btn-slot').removeClass('slot-picked');
        $('#booking_slot').remove();
        $('#booking_step_2').append('<input type="hidden" name="booking_slot" id="booking_slot" value="' + slot_time + '">');
        $(this).addClass('slot-picked');
    });

    //handle form submission of step 2

    $('#booking_step_2').submit(function (e) {

        var check = true;
        var address;
        address = $('input[name=address]').val();
        var event_date;
        event_date = $('input[name=event_date]').val();
        var booking_slot;
        booking_slot = $('input[name=booking_slot]').val();


        if (event_date === "") {
            $('#event_date').addClass('is-invalid');
            $('#date_error_holder').removeClass('d-none');
            $("html, body").animate({
                scrollTop: 2000
            }, "slow");
            check = false;
        }

        if (check === false) {
            return false;
        } else if (check === true) {
            if (booking_slot === undefined) {
                $('#slot_error').removeClass('d-none');
                $("html, body").animate({
                    scrollTop: $(document).height() - $(window).height()
                });
                return false;
            } else {
                e.submit();
            }
        }
    });

</script>

@endsection
