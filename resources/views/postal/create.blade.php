@extends('layouts.admin', ['title' => 'Postal Packages'])

@section('content')

    <div class="page-title">
        <h3>Postal Packages</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('backend.home') }}</a></li>
                <li><a href="{{ route('misc.index') }}">Postal Packages</a></li>
                <li class="active">Create</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <div class="col-md-12">
                            <h4 class="panel-title">Add new Postal Packages</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{route('postal.store')}}" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="col-md-4 form-group {{$errors->has('name') ? ' has-error' : ''}}">
                                <label class="control-label" for="name"><span class="text-danger">*</span> Applicant full name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-8 form-group {{$errors->has('address') ? ' has-error' : ''}}">
                                <label class="control-label" for="address"><span class="text-danger">*</span>Address</label>
                                <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4 form-group {{$errors->has('phone_no') ? ' has-error' : ''}}">
                                <label class="control-label" for="phone_no">Phone Number</label>
                                <input type="text" class="form-control" name="phone_no" value="{{old('phone_no')}}">
                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4 form-group {{$errors->has('status') ? ' has-error' : ''}}">
                                <label class="control-label" for="status">Status</label>
                                <input type="text" class="form-control" name="status" value="{{old('status')}}">
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4 form-group {{$errors->has('post') ? ' has-error' : ''}}">
                                <label class="control-label" for="post">Post</label>
                                <input type="text" class="form-control" name="post" value="{{old('post')}}">
                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="col-md-12 form-group {{$errors->has('description') ? ' has-error' : ''}}">
                                <label class="control-label" for="description">Descriptions</label>
                                <textarea class="form-control" name="description" rows="5">{{old('description')}}</textarea>
                                @if ($errors->has('descriptions'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group  text-right">
                                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection