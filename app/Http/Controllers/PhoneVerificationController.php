<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Otp; // Assuming App\Models\Otp based on previous error resolution
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PhoneVerificationController extends Controller
{
    public function __construct()
    {
        // Middleware ensures only non-logged in users who need verification can access this.
        $this->middleware('guest'); 
    }

    /**
     * Show the notice page where the user is informed about the OTP being sent.
     */
    public function showNotice()
    {
        $verifying_user_id = session('verifying_user_id');

        if (!$verifying_user_id) {
            return redirect()->route('login');
        }

        $user = User::find($verifying_user_id);
        
        // Mask the phone number and get the testing OTP from the session
        $masked_phone = substr($user->phone_number, 0, 3) . '****' . substr($user->phone_number, -4);
        $test_otp = session('test_otp_code');

        // FIX: Define the required $title variable
        $title = 'Verification Notice';
        
        return view('auth.verify-phone-notice', compact('masked_phone', 'test_otp', 'title'));
    }

    /**
     * Show the form to input the OTP.
     */
    public function showVerificationForm()
    {
        $verifying_user_id = session('verifying_user_id');
        $test_otp = session('test_otp_code');

        if (!$verifying_user_id) {
            return redirect()->route('login');
        }
        
        // FIX: Define the required $title variable
        $title = 'Enter Code';

        return view('auth.verify-phone-form', compact('test_otp', 'title'));
    }

    /**
     * Handle the POST request to verify the OTP.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);
        
        $verifying_user_id = session('verifying_user_id');

        if (!$verifying_user_id) {
            return redirect()->route('login')->withErrors(['error' => 'Verification session expired.']);
        }
        
        $user = User::find($verifying_user_id);
        if (!$user) {
            return back()->withErrors(['otp' => 'User not found.']);
        }

        // Check for a valid, unexpired OTP code
        $otp = Otp::where('user_id', $user->id) 
                  ->where('otp_code', $request->otp)
                  ->where('expires_at', '>', Carbon::now())
                  ->first();

        if (!$otp) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // Verification successful: Activate user and cleanup
        $user->is_active = 1; 
        $user->save();
        
        $otp->delete(); // Delete the used OTP record

        // Log the user in and clean up the session
        Auth::login($user);
        $request->session()->forget(['verifying_user_id', 'test_otp_code']);

        return redirect()->intended('/home');
    }
}