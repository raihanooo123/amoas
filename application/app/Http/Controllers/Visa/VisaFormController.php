<?php

namespace App\Http\Controllers\Visa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Visa\VisaForm;
use Illuminate\Http\File;

class VisaFormController extends Controller
{
     
    public function index()
    {
        // get the limits for pagination
        $limit = request()->has('limit') && request()->input('limit') <= 200 ? request()->input('limit') : 50;

        $visaForms = VisaForm::with(['department', 'country','type', 'registrar'])
            ->latest()
            ->paginate($limit);
        // dd($visaForms);
        return view('visa.index', compact('visaForms'));
    }

    public function show(VisaForm $visa_form)
    {
        $visa_form->load(['department', 'country', 'type', 'image', 'registrar']);
        

        $off_days = \DB::table('booking_times')
            ->where('is_off_day', '=', '1')
            ->get();

        $dayNumber = array();

        foreach ($off_days as $off_day)
        {
            if($off_day->id != 7)
            {
                $dayNumber[] = $off_day->id;
            }
            else
            {
                $dayNumber[] = $off_day->id - 7;
            }
        }

        $disable_days_string = implode(",", $dayNumber);


        return view('visa.show', compact('visa_form', 'disable_days_string'));
    }

    public function fillForm()
    {
        return view('visa.form.fill-form');
    }

    public function store()
    {
        
        $this->validate(request(), [
            'department_id' => 'required',
            'title' => 'required',
            'family_name' => 'required',
            'given_name' => 'required',
            'father_name' => 'required',
            'dob' => 'required',
            'birth_country' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'residence_country' => 'required',
            'nationality' => 'required',
            'under_18' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'occupation' => 'required',
            'visa_type' => 'required',
            'purpose' => 'required',
            'entry_date' => 'required',
            'intend_duration' => 'required',
            'entry_point' => 'required',
            'children_no' => 'required',
            'visit_places' => 'required',
            'af_address' => 'required',
            'passport_type' => 'required',
            'passport_no' => 'required',
            'issue_place' => 'required',
            'issue_date' => 'required',
            'expire_date' => 'required',
            'photo' => 'required',
        ]);

        $visaForm = VisaForm::create([
            'department_id' => request()->department_id,
            'serial_no' => VisaForm::generateSerialNo(request()->department_id),
            'title' => request()->title,
            'family_name' => request()->family_name,
            'given_name' => request()->given_name,
            'father_name' => request()->father_name,
            'dob' => request()->dob,
            'birth_country' => request()->birth_country,
            'marital_status' => request()->marital_status,
            'gender' => request()->gender,
            'residence_country' => request()->residence_country,
            'nationality' => request()->nationality,
            'other_nationality' => request()->other_nationality,
            'under_18' => request()->under_18,
            'address' => request()->address,
            'email' => request()->email,
            'mobile' => request()->mobile,
            'occupation' => request()->occupation,
            'employer_name' => request()->employer_name,
            'employer_address' => request()->employer_address,
            'pre_employer_name' => request()->pre_employer_name,
            'status' => 'On Process',
            'pre_employer_address' => request()->pre_employer_address,
            'visa_type' => request()->visa_type,
            'purpose' => implode(', ', request()->purpose),
            'entry_date' => request()->entry_date,
            'intend_duration' => request()->intend_duration,
            'entry_point' => request()->entry_point,
            'children_no' => request()->children_no,
            'visit_places' => request()->visit_places,
            'af_address' => request()->af_address,
            'visited_before' => request()->visited_before,
            'applied_visa' => request()->applied_visa,
            'criminal_record' => request()->criminal_record,
            'passport_type' => request()->passport_type,
            'passport_no' => request()->passport_no,
            'issue_place' => request()->issue_place,
            'issue_date' => request()->issue_date,
            'expire_date' => request()->expire_date,
            'registrar_id' => auth()->check() ? auth()->id() : 0,
        ]);

        if (request()->hasFile('photo')) {

            $extension = request()->photo->getClientOriginalExtension();

            $fullPath = \Storage::disk('visa')->putFile($visaForm->serial_no, new File(request()->photo));

            $visaForm->image()->create([
                'label' => request()->photo->getClientOriginalName(),
                'path' => $fullPath,
                'mime_type' => $extension,
            ]);
        }

        return redirect(route('verification.index'));
    }

    public function checkStatus()
    {
        $visa = null;
        $message = null;
        return view('visa.form.check-visa', compact('visa', 'message'));
    }

    public function doCheckStatus()
    {
        $visa = VisaForm::with('department:id,name_en')->where('serial_no', request()->serial_no)->first();

        $message = $visa ? null : 'The serial number you are looking for was not found.';

        return view('visa.form.check-visa', compact('visa', 'message'));
    }
}
