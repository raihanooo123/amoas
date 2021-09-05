@extends('layouts.admin', ['title' => __('backend.dashboard')])

@section('styles')
    <link href="{{ asset('plugins/morris/morris.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <div class="page-title">
        <h3>{{ __('backend.dashboard') }}</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('backend.home') }}</a></li>
                <li class="active">{{ __('Dashboard') }}</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('receipts.create') }}"><i
                    class="fa fa-plus"></i>&nbsp;&nbsp;Create</a>

                <a class="btn btn-default" href="{{ route('receipts.index') }}"><i
                    class="fa fa-list-ol"></i>&nbsp;&nbsp;List of Receipt</a>
            </div>
        </div>


@endsection

@section('scripts')
@endsection