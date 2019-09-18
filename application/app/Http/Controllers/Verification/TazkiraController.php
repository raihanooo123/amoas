<?php

namespace App\Http\Controllers\Verification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Verification\Verification;
use Illuminate\Http\File;

class TazkiraController extends Controller
{

    public function index()
    {
        // get the limits for pagination
        $limit = request()->has('limit') && request()->input('limit') <= 200 ? request()->input('limit') : 50;

        $verifications = Verification::with(['country', 'sibling', 'service'])
            ->latest()
            ->paginate($limit);

        // dd($verifications);
        return view('tazkira.verification.index', compact('verifications'));
    }
    
    public function show(Verification $verification)
    {

        $verification->load(['country', 'sibling', 'service', 'province', 'district', 'village', 'image']);

        // $image = base64_encode(\Storage::disk('verification')->get($verification->image->path));
        // $image_data = 'data:'.mime_content_type(\Storage::disk('verification')->get($verification->image->path)) . ';base64,' . base64_encode(\Storage::disk('verification')->get($verification->image->path));
        // dd(\Storage::disk('verification')->get($verification->image->path));
        return view('tazkira.verification.show', compact('verification'));
    }

    public function fillForm()
    {
        return view('verification.tazkira.fill-form');
    }

    public function store()
    {
        // dd(request()->all());
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
            "original_province" => 'required',
            "current_city" => 'required',
            "zip_code" => 'required',
            "current_country" => 'required',
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

        // dd(request()->photo->getClientOriginalName());

        $tazkiraVerify = Verification::create([
            "department_id" => 1,
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
            "original_village" => $this->setAttr(request()->original_village, 'App\Village'),
            "original_province" => request()->original_province,
            "original_district" => $this->setAttr(request()->original_district, 'App\District'),
            "current_city" => request()->current_city,
            "zip_code" => request()->zip_code,
            "current_country" => request()->current_country,
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

        if (request()->hasFile('photo')) {

            $extension = request()->photo->getClientOriginalExtension();

            $name = str_replace(' ', '_', $tazkiraVerify->name) . '-' . str_replace(' ', '_', $tazkiraVerify->last_name) . '-' . str_replace(' ', '_', $tazkiraVerify->father_name) . '-' . time();

            $fullPath = \Storage::disk('verification')->putFile($name, new File(request()->photo));

            $tazkiraVerify->image()->create([
                'label' => request()->photo->getClientOriginalName(),
                'path' => $fullPath,
                'mime_type' => $extension,
            ]);
        }
    }

    private function setAttr($attr, $model)
    {
        if (is_numeric($attr)) return $attr;

        $instance = new $model;
        $instance->name = $attr;
        $instance->label_en = $attr;
        $instance->label_dr = $attr;
        $instance->save();

        return $instance->id;
    }
}
