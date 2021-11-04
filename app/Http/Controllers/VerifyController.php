<?php

namespace App\Http\Controllers;

use App\Models\Tasaadiq\BirthCertificate;
use App\Models\Tasaadiq\CelibacyCertificate;
use App\Models\Tasaadiq\MarriageCertificate;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    
    public function check()
    {
        if(request()->has('code') && request()->type == 1)
            return $this->birthCheck();

        if(request()->has('code') && request()->type == 2)
            return $this->celibacyCheck();

        if(request()->has('code') && request()->type == 3)
            return $this->marriageCheck();
        
        return response(view('errors.custom-404'), 404);
    }

    public function birthCheck()
    {
        $decoded = base64_decode(request()->code);

        $births = BirthCertificate::withoutGlobalScopes()->where('serial_no', $decoded)->get();

        if($births->count() <= 0)
            return response(view('errors.custom-404'), 404);
        
        $returnText = '';

        foreach($births as $r)
            $returnText .= '<h4 class="text-dark">' . sprintf("Birth certificate issued on %s with following info:<br> Serial No.: %s<br> Passport No/Tazkira No: %s", $r->issue_date, $r->serial_no, $r->passport_no) . '</h4>';

        return response(view('errors.custom-200', compact('returnText')), 200);
    }

    public function celibacyCheck()
    {
        $decoded = base64_decode(request()->code);

        $celibacy = CelibacyCertificate::withoutGlobalScopes()->where('serial_no', $decoded)->get();

        if($celibacy->count() <= 0)
            return response(view('errors.custom-404'), 404);
        
        $returnText = '';

        foreach($celibacy as $r)
            $returnText .= '<h4 class="text-dark">' . sprintf("Celibacy certificate issued on %s with following info:<br> Serial No.: %s<br> Passport No/Tazkira No: %s", $r->issue_date, $r->serial_no, $r->passport_no) . '</h4>';

        return response(view('errors.custom-200', compact('returnText')), 200);
    }

    public function marriageCheck()
    {
        $decoded = base64_decode(request()->code);

        $marriage = MarriageCertificate::withoutGlobalScopes()->where('serial_no', $decoded)->get();

        if($marriage->count() <= 0)
            return response(view('errors.custom-404'), 404);
        
        $returnText = '';

        foreach($marriage as $r)
            $returnText .= '<h4 class="text-dark">' . sprintf("Marriage certificate issued on %s with following info:<br> Serial No.: %s<br> Husband Passport No/Tazkira No: %s<br> Wife Passport No/Tazkira No: %s", $r->issue_date, $r->serial_no, $r->husband_passport_no, $r->wife_passport_no) . '</h4>';

        return response(view('errors.custom-200', compact('returnText')), 200);
    }
}
