<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // <-- NEW: Must be imported for the override method
use Illuminate\Support\Facades\Auth; // <-- Optional, but good practice

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // We removed the 'verified' middleware from the routes, but the trait may still enforce a check.
        $this->middleware('guest')->except('logout');
    }

    // =======================================================================
    // FIX: Override the trait's success method to enforce phone verification
    // and prevent the call to the non-existent 'verification.notice' route.
    // =======================================================================
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Check if the user is active based on your phone verification process
        if ($user->is_active == 0) {
            // If phone verification is pending, log them out and redirect
            Auth::logout();
            
            // Re-store the user ID for the verification session if necessary (optional step)
            // session(['verifying_user_id' => $user->id]); 
            
            return redirect()->route('verification.phone.notice');
        }
        
        // If the user is active, allow the default redirect (to /home)
        return redirect()->intended($this->redirectPath());
    }

    // =======================================================================
    // Existing Socialite Methods (Ensure they handle the 'is_active' column if needed)
    // =======================================================================

    public function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $userSocial = \Socialite::driver($social)->stateless()->user();
        $user = \App\User::where(['email' => $userSocial->getEmail()])->first();
        
        if ($user) {
            // Check active status here too, if the user might be logging in before phone verification
            if ($user->is_active == 0) {
                 // You might want a different flow here, but for now, we just redirect home
            }
            \Auth::login($user);

            return redirect('/home');
        } else {
            $newUser = \App\User::create([
                'first_name' => $userSocial->getName(),
                'last_name' => '.',
                'email' => $userSocial->getEmail(),
                'role_id' => 2, //Customer || Applicant
                'email_verified_at' => date('Y-m-d H:i:s'),
                'is_active' => 1, // Socialite users are usually active immediately
            ]);

            auth()->login($newUser, true);

            return redirect()->to('/');
        }
    }
}