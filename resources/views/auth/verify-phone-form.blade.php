@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter Verification Code</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('verification.phone.verify') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <strong>Verification Failed:</strong><br>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                        
                        @if(isset($test_otp))
                        {{-- THIS BLOCK IS FOR DEVELOPMENT/TESTING ONLY --}}
                        <div class="alert alert-info text-center" role="alert">
                            <strong>For Testing:</strong> OTP is: <strong>{{ $test_otp }}</strong>
                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="otp" class="col-md-4 col-form-label text-md-right">6-Digit Code</label>
                            <div class="col-md-6">
                                <input id="otp" type="text" class="form-control" name="otp" required autofocus maxlength="6">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Verify Phone
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection