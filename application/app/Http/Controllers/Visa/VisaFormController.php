<?php

namespace App\Http\Controllers\Visa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisaFormController extends Controller
{
    public function fillForm()
    {
        return view('visa.form.fill-form');
    }

}
