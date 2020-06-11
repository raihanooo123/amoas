@extends('layouts.admin', ['title' => 'Postal Packages'])

@section('styles')
<link href="{{ asset('plugins/datatables/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

<div class="page-title">
    <h3>Postal Packages</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">{{ __('backend.home') }}</a></li>
            <li class="active"><a href="{{ route('misc.index') }}">Postal Packages</a></li>
        </ol>
    </div>
</div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12" >
                @include('alerts.alert')
                <a class="btn btn-primary" href="{{ route('postal.create') }}"><i
                    class="fa fa-plus"></i>&nbsp;&nbsp;Create</a>
                {{-- <a class="btn btn-default" href="{{ route('misc-types.index') }}"><i
                    class="fa fa-list-ul"></i>&nbsp;&nbsp;Misc Types</a> --}}
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
                                    <th>UID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Documents</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>{{ __('backend.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <th searching="false">#</th>
                                    <th>UID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Documents</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th searching="false">{{ __('backend.actions') }}</th>
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
            if($(this).attr('searching') != 'false')
                $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
            // $(this).html('<textarea class="form-control" rows="2"></textarea>');
        });

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
            ajax: "{!! route('postal.data') !!}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'uid',
                    name: 'uid'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'documents',
                    name: 'documents'
                },
                {
                    data: 'post',
                    name: 'post'
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