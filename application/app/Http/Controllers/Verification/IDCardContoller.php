<?php

namespace App\Http\Controllers\Verification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IDCardContoller extends Controller
{
    public function fillForm()
    {
        return view('verification.tazkira.fill-form');
    }
}
