<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Otp; // Corrected import based on previous error resolution
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * We redirect to the phone verification notice page.
     *
     * @var string
     */
    protected $redirectTo = '/verify-phone/notice';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:users', 
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'terms' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration and start OTP process.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // 1. Create the User (is_active=0 prevents login before verification)
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_active' => 0, // Deactivate user until phone is verified
        ]);
        
        // 2. Generate and store OTP
        $otp_code = rand(100000, 999999);
        
        Otp::create([ 
            'user_id' => $user->id,
            'otp_code' => (string)$otp_code,
            'expires_at' => Carbon::now()->addMinutes(10), // Valid for 10 minutes
        ]);
        
        // 3. Send the SMS (Placeholder)
        // SMS_SERVICE::send($user->phone_number, "Your verification code is: " . $otp_code);

        // 4. Store user's ID and OTP code in session for the verification process
        session([
            'verifying_user_id' => $user->id,
            'test_otp_code' => $otp_code, // Keep for development testing
        ]);

        return $user;
    }

    /**
     * The user has been registered. We override this to prevent logging the user in.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function registered(Request $request, $user)
    {
        // 1. Log out the user (the trait logs them in by default)
        $this->guard()->logout();
        
        // 2. Redirect to the custom verification path
        return redirect($this->redirectPath());
    }
}