@extends('layouts.admin', ['title' => __('backend.bookings')])

@section('styles')
<link href="{{ asset('plugins/datatables/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    {{-- Applying clean header padding and text color --}}
    <div class="page-title p-0 mb-6 border-b border-gray-200">
        <h3 class="text-2xl font-semibold text-gray-800 mb-1">{{ __('backend.bookings') }}</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb flex text-sm text-gray-500">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">{{ __('backend.home') }}</a></li>
                <li class="active font-medium">{{ __('backend.bookings') }}</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12" >
                @include('alerts.bookings')
                
                {{-- APPLYING THE NEW PANEL STYLE --}}
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        {{-- Custom buttons for 'Show 10 rows' and 'Print' will be injected here by Datatables DOM --}}
                        <div class="col-md-8" id="options">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            
                            {{-- APPLYING THE NEW TABLE STYLE --}}
                            <table id="xtreme-table" class="professional-table display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('backend.serial_no') }}</th>
                                    <th>{{ __('backend.date') }}</th>
                                    <th>{{ __('backend.time') }}</th>
                                    <th>{{ __('backend.package') }}</th>
                                    <th>{{ __('backend.applicant') }}</th>
                                    <th>{{ __('backend.id_card') }}</th>
                                    <th>{{ __('backend.email') }}</th>
                                    <th>{{ __('backend.phone') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Participants') }}</th> 
                                    <th>{{ __('Registrar') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <th searching="false" class="bg-white">#</th>
                                    <th>{{ __('backend.serial_no') }}</th>
                                    <th>{{ __('backend.date') }}</th>
                                    <th>{{ __('backend.time') }}</th>
                                    <th>{{ __('backend.package') }}</th>
                                    <th>{{ __('backend.applicant') }}</th>
                                    <th>{{ __('backend.id_card') }}</th>
                                    <th>{{ __('backend.email') }}</th>
                                    <th>{{ __('backend.phone') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th searching="false" class="bg-white">{{ __('Participants') }}</th> 
                                    <th>{{ __('Registrar') }}</th>
                                </tfoot>
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

        $('#xtreme-table tfoot th').each( function () {
            var title = $(this).text();
            // Critical: Ensure the form-control class is on the input
            if($(this).attr('searching') != 'false')
                $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' ); 
        });

        // Datatables initialization script remains unchanged, relying on the new CSS for styling.
        var table = $('#xtreme-table').DataTable({
            // ... (rest of Datatable configuration is unchanged)
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
                    data: 'DT_RowIndex',
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
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'info.phone',
                    name: 'info.phone'
                },
                {
                    data: 'booking_type',
                    name: 'booking_type'
                },
                {
                    data: 'participant_info', 
                    name: 'participant_info',
                    orderable: false,
                    searchable: false 
                },
                {
                    data: 'user.email',
                    name: 'user.email',
                }
            ],
            "order": []
        });

        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                    that.search(this.value.replace(/;/g, "|"), true, false)
                        .draw();
                }
            });
        });

    });
</script>

@endsection