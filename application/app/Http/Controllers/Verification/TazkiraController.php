<?php

namespace App\Http\Controllers\Verification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Verification\Verification;
use Illuminate\Http\File;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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
            "new_absence_tazkira_case" => request()->new_absence_tazkira_case,
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

    public function printExcel(Verification $verification)
    {

        $spreadsheet = $this->excelWriter($verification);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save('temp/verification_form.xlsx');
        return response()->download('temp/verification_form.xlsx');
    }

    public function printPdf(Verification $verification)
    {

        $spreadsheet = $this->excelWriter($verification);

        $xmlWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Tcpdf');
        $xmlWriter->save('temp/verification_form.pdf');
        return response()->download('temp/verification_form.pdf');
    }

    private function excelWriter(Verification $verification)
    {

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('templates/verification_form_template.xlsx');
        $sheet = $spreadsheet->getActiveSheet();
        // dd($spreadsheet);
        $sheet->setCellValue('D5', $verification->name . ' ' . $verification->last_name);
        $sheet->setCellValue('D6', $verification->father_name);
        $sheet->setCellValue('D7', $verification->grand_father_name);
        $sheet->setCellValue('D8', $verification->birth_place);
        $sheet->setCellValue('D9', __('tazkira.' . $verification->marital_status));
        $sheet->setCellValue('D10', $verification->occupation);
        $sheet->setCellValue('D11', $verification->living_duration . ' ' .  __('tazkira.' . $verification->living_duration_unit));

        $sheet->setCellValue('D12', $verification->last_trip);
        $sheet->setCellValue('D13', $verification->contact_no);
        $sheet->setCellValue('D14', $verification->email);
        $sheet->setCellValue('D15', app()->isLocale('dr') || app()->isLocale('ps') ? $verification->service->label_dr : $verification->service->label_en);
        $sheet->setCellValue('D16', $verification->new_absence_tazkira_case);

        // Addresses
        $sheet->setCellValue('I5', app()->isLocale('dr') || app()->isLocale('ps') ? $verification->village->label_dr : $verification->village->label_en);
        $sheet->setCellValue('J5', app()->isLocale('dr') || app()->isLocale('ps') ? $verification->district->label_dr : $verification->district->label_en);
        $sheet->setCellValue('K5', app()->isLocale('dr') || app()->isLocale('ps') ? $verification->province->label_dr : $verification->province->label_en);
        $sheet->setCellValue('I6', $verification->current_city);
        $sheet->setCellValue('J6', $verification->zip_code);
        $sheet->setCellValue('K6', app()->isLocale('dr') || app()->isLocale('ps') ? $verification->country->name_dr : $verification->country->name_en);
        $sheet->setCellValue('I9', $verification->height);
        $sheet->setCellValue('I10', $verification->eyes);
        $sheet->setCellValue('I11', $verification->skin);
        $sheet->setCellValue('I12', $verification->hair);
        $sheet->setCellValue('I13', $verification->other);
        $sheet->setCellValue('J14', $verification->d_name . ' ' . $verification->d_last_name);
        $sheet->setCellValue('K14', $verification->d_contact);

        $sheet->setCellValue('D18', $verification->sibling_name . ' ' . $verification->sibling_last_name);
        // $sheet->setCellValue('D5', );

        $sheet->setCellValue('I18', $verification->sibling_father_name);
        $sheet->setCellValue('D19', $verification->sibling_grand_father_name);
        $sheet->setCellValue('I19', app()->isLocale('dr') || app()->isLocale('ps') ? $verification->sibling->label_dr : $verification->sibling->label_en);
        $sheet->setCellValue('D20', $verification->page_no);
        $sheet->setCellValue('E20', $verification->version_no);
        $sheet->setCellValue('F20', $verification->note_no);
        $sheet->setCellValue('I20', $verification->year);
        $sheet->setCellValue('J20', $verification->month);
        $sheet->setCellValue('K20', $verification->day);

        // insert image
        // $sheeti = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        // $sheeti->setName('name');
        // $sheeti->setDescription('description');
        // $sheeti->setPath('img.png');
        // $sheeti->setHeight(90);
        // $sheeti->setCoordinates("J9");
        // $sheeti->setOffsetX(20);
        // $sheeti->setOffsetY(5);
        // $sheeti->setWorksheet($sheet);

        return $spreadsheet;

    }
}
