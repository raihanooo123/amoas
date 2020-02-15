@extends('layouts.admin', ['title' => __('backend.bookings')])

@section('styles')
<link href="{{ asset('plugins/datatables/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

    <div class="page-title">
        <h3>{{ __('backend.bookings') }}</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('backend.home') }}</a></li>
                <li class="active">{{ __('backend.bookings') }}</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12" >
                @include('alerts.bookings')
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <div class="col-md-8" id="options">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="xtreme-table" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('backend.serial_no') }}</th>
                                    <th>{{ __('backend.date') }}</th>
                                    <th>{{ __('backend.time') }}</th>
                                    <th>{{ __('backend.package') }}</th>
                                    <th>{{ __('backend.applicant') }}</th>
                                    <th>{{ __('backend.id_card') }}</th>
                                    <th>{{ __('backend.type') }}</th>
                                    <th>{{ __('backend.status') }}</th>
                                    <th>{{ __('backend.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script src="{{ asset('plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/js/buttons.print.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#xtreme-table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                    },
                },
            ],
            ajax: "{!! route('bookings.data') !!}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'serial_no',
                    name: 'serial_no'
                },
                {
                    data: 'booking_date',
                    name: 'booking_date'
                },
                {
                    data: 'booking_time',
                    name: 'booking_time'
                },
                {
                    data: 'package.title',
                    name: 'package.title'
                },
                {
                    data: 'info.full_name',
                    name: 'info.full_name'
                },
                {
                    data: 'info.id_card',
                    name: 'info.id_card'
                },
                {
                    data: 'booking_type',
                    name: 'booking_type'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false, 
                    searchable: false
                }
            ],
            "order": [[ 0, 'desc' ]]
        });
    });
</script>

@endsection