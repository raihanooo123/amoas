<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            $user = Auth::user();

      
            $user->load('roles.permissions'); 

            if ($user->isAdmin() || $user->isSuperAdmin()) {
                if ($user->is_active) {
                    return $next($request);
                } else {
                    return redirect('/account-disabled');
                }
            } else {
                return redirect('/home');
            }
        } else {
            return redirect('/login');
        }
    }
}