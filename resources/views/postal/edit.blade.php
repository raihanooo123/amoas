@extends('layouts.admin', ['title' => 'Postal Packages'])

@section('content')

    <div class="page-title">
        <h3>Postal Packages</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('backend.home') }}</a></li>
                <li><a href="{{ route('misc.index') }}">Postal Packages</a></li>
                <li class="active">Edit</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <div class="col-md-12">
                            <h4 class="panel-title">Edit Postal Packages</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{route('postal.update', $postal->id)}}" enctype="multipart/form-data">

                            {{csrf_field()}}
                            @method('PUT')

                            <div class="col-md-3 form-group {{$errors->has('name') ? ' has-error' : ''}}">
                                <label class="control-label" for="name"><span class="text-danger">*</span> Applicant full name</label>
                                <input type="text" class="form-control" name="name" value="{{$postal->name}}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3 form-group {{$errors->has('address') ? ' has-error' : ''}}">
                                <label class="control-label" for="address"><span class="text-danger">*</span>Address</label>
                                <input type="text" class="form-control" name="address" value="{{$postal->address}}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3 form-group {{$errors->has('post') ? ' has-error' : ''}}">
                                <label class="control-label" for="post">Postal Code</label>
                                <input type="text" class="form-control" name="post" value="{{$postal->post}}">
                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3 form-group {{$errors->has('place') ? ' has-error' : ''}}">
                                <label class="control-label" for="place">Place</label>
                                <input type="text" class="form-control" name="place" value="{{$postal->place}}">
                                @if ($errors->has('place'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3 form-group {{$errors->has('phone_no') ? ' has-error' : ''}}">
                                <label class="control-label" for="phone_no">Phone Number</label>
                                <input type="text" class="form-control" name="phone_no" value="{{$postal->phone}}">
                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3 form-group {{$errors->has('email') ? ' has-error' : ''}}">
                                <label class="control-label" for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$postal->phone}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- <div class="col-md-3 form-group {{$errors->has('status') ? ' has-error' : ''}}">
                                <label class="control-label" for="status">Status</label>
                                <input type="text" class="form-control" name="status" value="{{$postal->status}}">
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div> --}}

                            <div class="col-md-3 form-group {{$errors->has('date') ? ' has-error' : ''}}">
                                <label class="control-label" for="date">Date</label>
                                <input type="date" value="{{$postal->date}}" class="form-control" name="date">
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3 form-group {{$errors->has('status') ? ' has-error' : ''}}">
                                <label class="control-label" for="status">Status</label>
                                {{-- <input type="text" class="form-control" name="status" value="{{old('status')}}"> --}}
                                <select class="form-control" name="status">
                                    
                                    <option value="Label Created" {{$postal->status == 'Label Created' ? 'selected' : '' }}>Label Created</option>
                                    <option value="Shipped" {{$postal->status == 'Shipped' ? 'selected': ''}}>Shipped</option>
                                    <option value="Delivered" {{$postal->status == 'Delivered' ? 'selected': ''}}>Delivered</option>
                                    <option value="Returned" {{$postal->status == 'Returned' ? 'selected': ''}}>Returned</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                <hr>
                                <h3>List of Deliverable Documents</h3>
                            </div>

                            <div class="col-md-4">
                            @php
                                $count = $postal->deliverables()->count();
                            @endphp
                            @foreach ($postal->deliverables as $counter => $d)
                                @php
                                    $counter++
                                @endphp
                                <input type="hidden" name="id{{$counter}}" value="{{$d->id}}">
                                {{-- <div class="col-md-4 form-group {{$errors->has('doc_type'. $counter) ? ' has-error' : ''}}">
                                    <label class="control-label" for="doc_type">Document type {{$counter}} </label>
                                    <input type="text" class="form-control" name="doc_type{{$counter}}" value="{{$d->doc_type}}">
                                    @if ($errors->has('doc_type'. $counter))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('doc_type'. $counter) }}</strong>
                                        </span>
                                    @endif
                                </div> --}}

                                <div class="form-group {{$errors->has('name'. $counter) ? ' has-error' : ''}}">
                                    <label class="control-label" for="name">Name {{$counter}}</label>
                                    <input type="text" class="form-control" name="name{{$counter}}" value="{{$d->name}}">
                                    @if ($errors->has('name'. $counter))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('name'. $counter) }}</strong>
                                        </span>
                                    @endif
                                </div>

                                {{-- <div class="col-md-4 form-group {{$errors->has('uid'. $counter) ? ' has-error' : ''}}">
                                    <label class="control-label" for="uid">Unique ID (uid) {{$counter}}</label>
                                    <input type="text" class="form-control" name="uid{{$counter}}" value="{{$d->uid}}">
                                    @if ($errors->has('uid'. $counter))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('uid'. $counter) }}</strong>
                                        </span>
                                    @endif
                                </div> --}}
                            @endforeach

                            @foreach (range(++$count,8) as $counter)
                                
                                {{-- <div class="col-md-4 form-group {{$errors->has('doc_type'. $counter) ? ' has-error' : ''}}">
                                    <label class="control-label" for="doc_type">Document type {{$counter}} </label>
                                    <input type="text" class="form-control" name="doc_type{{$counter}}" value="{{old('doc_type'. $counter)}}">
                                    @if ($errors->has('doc_type'. $counter))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('doc_type'. $counter) }}</strong>
                                        </span>
                                    @endif
                                </div> --}}

                                <div class="form-group {{$errors->has('name'. $counter) ? ' has-error' : ''}}">
                                    <label class="control-label" for="name">Name {{$counter}}</label>
                                    <input type="text" class="form-control" name="name{{$counter}}" value="{{old('name'. $counter)}}">
                                    @if ($errors->has('name'. $counter))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('name'. $counter) }}</strong>
                                        </span>
                                    @endif
                                </div>

                                {{-- <div class="col-md-4 form-group {{$errors->has('uid'. $counter) ? ' has-error' : ''}}">
                                    <label class="control-label" for="uid">Unique ID (uid) {{$counter}}</label>
                                    <input type="text" class="form-control" name="uid{{$counter}}" value="{{old('uid'. $counter)}}">
                                    @if ($errors->has('uid'. $counter))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('uid'. $counter) }}</strong>
                                        </span>
                                    @endif
                                </div> --}}
                            @endforeach
                            
                            </div>
                            <div class="col-md-8 form-group {{$errors->has('description') ? ' has-error' : ''}}">
                                <label class="control-label" for="description">Remarks</label>
                                <textarea class="form-control" name="description" rows="5">{{$postal->description}}</textarea>
                                @if ($errors->has('descriptions'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('descriptions') }}</strong>
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