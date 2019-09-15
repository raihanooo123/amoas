<?php

namespace App\Http\Controllers\Verification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Verification\Verification;

class TazkiraController extends Controller
{
    public function fillForm()
    {
        return view('verification.tazkira.fill-form');
    }

    public function store()
    {
        dd(request()->all());
        $this->validate(request(), [
            "name" => 'required',
            "last_name" => 'required',
            "father_name" => 'required',
            "grand_father_name" => 'required',
            "occupation" => 'required',
            "birth_place" => 'required',
            "marital_status" => 'required',
            "living_duration" => 'required',
            "living_duration_unit" => 'required',
            "last_trip" => 'required',
            "contact_no" => 'required',
            "email" => 'required',
            "photo" => 'required',
            "service_id" => 'required',
            "original_village" => 'required',
            "original_district" => 'required',
            "current_city" => 'required',
            "zip_code" => 'required',
            "current_country" => 'required',
            "current_state" => 'required',
            "height" => 'required',
            "eyes" => 'required',
            "skin" => 'required',
            "hair" => 'required',
            "d_name" => 'required',
            "d_last_name" => 'required',
            "d_contact" => 'required',
            "sibling_name" => 'required',
            "sibling_last_name" => 'required',
            "sibling_id" => 'required',
            "page_no" => 'required',
            "version_no" => 'required',
            "note_no" => 'required',
            "year" => 'required',
            "month" => 'required',
            "day" => 'required',
        ]);

        $tazkiraVerify = Verification::create([
            "name" => request()->name,
            "last_name" => request()->last_name,
            "father_name" => request()->father_name,
            "grand_father_name" => request()->grand_father_name,
            "occupation" => request()->occupation,
            "birth_place" => request()->birth_place,
            "marital_status" => request()->marital_status,
            "living_duration" => request()->living_duration,
            "living_duration_unit" => request()->living_duration_unit,
            "last_trip" => request()->last_trip,
            "contact_no" => request()->contact_no,
            "email" => request()->email,
            "service_id" => request()->service_id,
            "original_village" => request()->original_village,
            "original_district" => request()->original_district,
            "current_city" => request()->current_city,
            "zip_code" => request()->zip_code,
            "current_country" => request()->current_country,
            "current_state" => request()->current_state,
            "height" => request()->height,
            "eyes" => request()->eyes,
            "skin" => request()->skin,
            "hair" => request()->hair,
            "other" => request()->other,
            "d_name" => request()->d_name,
            "d_last_name" => request()->d_last_name,
            "d_father_name" => request()->d_father_name,
            "d_contact" => request()->d_contact,
            "sibling_name" => request()->sibling_name,
            "sibling_last_name" => request()->sibling_last_name,
            "sibling_father_name" => request()->sibling_father_name,
            "sibling_grand_father_name" => request()->sibling_grand_father_name,
            "sibling_id" => request()->sibling_id,
            "page_no" => request()->page_no,
            "version_no" => request()->version_no,
            "note_no" => request()->note_no,
            "year" => request()->year,
            "month" => request()->month,
            "day" => request()->day,
        ]);

    }
}
