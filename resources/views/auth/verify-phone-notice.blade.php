@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Phone Verification Required</div>
                <div class="card-body text-center">
                    <h4 class="mb-4">Verification Code Sent! 📱</h4>
                    <p>A 6-digit verification code has been sent to your mobile number: <strong>{{ $masked_phone ?? 'number not found' }}</strong>.</p>
                    
                    @if(isset($test_otp))
                    {{-- THIS BLOCK IS FOR DEVELOPMENT/TESTING ONLY --}}
                    <div class="alert alert-info mt-3" role="alert">
                        <strong>For Testing:</strong> The generated OTP is: <strong>{{ $test_otp }}</strong>
                    </div>
                    @endif

                    <p>Please click the button below to enter the code and complete your registration.</p>
                    
                    <a href="{{ route('verification.phone.form') }}" class="btn btn-primary mt-3">
                        Enter Verification Code
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection