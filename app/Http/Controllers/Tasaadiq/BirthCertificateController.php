<?php

namespace App\Http\Controllers\Tasaadiq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tasaadiq\BirthCertificate;

class BirthCertificateController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['permission:birth certificate show'])->only(['index', 'show']);
        // $this->middleware(['permission:birth certificate create'])->only(['create', 'store']);
        // $this->middleware(['permission:birth certificate edit'])->only(['edit', 'update']);
        // $this->middleware(['permission:birth certificate delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasaadiq.birth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasaadiq.birth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'family_name' => 'required',
            'given_name' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'pob' => 'required_without:pob_outside',
            'pob_outside' => 'required_without:pob',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        \DB::beginTransaction();
        try {
            $serialNo = BirthCertificate::generateSerialNo();

            $newBC = BirthCertificate::create([
                'family_name' => strtoupper($request->family_name),
                'given_name' => strtoupper($request->given_name),
                'previous_name' => strtoupper($request->previous_name),
                'sex' => strtoupper($request->sex),
                'dob' => $request->dob,
                'pob' => $request->filled('pob_outside') ?  strtoupper($request->pob_outside) : strtoupper($request->pob),
                'passport_no' => strtoupper($request->passport_no),
                'father_name' => strtoupper($request->father_name),
                'mother_name' => strtoupper($request->mother_name),
                'serial_no' => $serialNo,
                'issue_date' => date('Y-m-d'),
                'department_id' => auth()->user()->department_id,
                'registrar_id' => auth()->id(),
            ]);

            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return redirect()->route('birth.show', [$newBC])->with(['print' => true ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BirthCertificate $birth)
    {
        return view('tasaadiq.birth.show', compact('birth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BirthCertificate $birth)
    {
        return view('tasaadiq.birth.edit', compact('birth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BirthCertificate $birth)
    {
        $this->validate($request, [
            'family_name' => 'required',
            'given_name' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'pob' => 'required_without:pob_outside',
            'pob_outside' => 'required_without:pob',
            'passport_no' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        \DB::beginTransaction();
        try {
            $birth->update([
                'family_name' => strtoupper($request->family_name),
                'given_name' => strtoupper($request->given_name),
                'previous_name' => strtoupper($request->previous_name),
                'sex' => strtoupper($request->sex),
                'dob' => $request->dob,
                'pob' => $request->filled('pob_outside') ?  strtoupper($request->pob_outside) : strtoupper($request->pob),
                'passport_no' => strtoupper($request->passport_no),
                'father_name' => strtoupper($request->father_name),
                'mother_name' => strtoupper($request->mother_name),
            ]);

            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return redirect()->route('birth.show', [$birth]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BirthCertificate $birth)
    {
        $birth->delete();
        return redirect()->route('birth.index');
    }

    public function dataTable()
    {
        $births = BirthCertificate::with(['registrar:id,last_name'])->select('birth_certificates.*');
        
        if(!request()->order)
            $births->latest();
        
        return datatables()::of($births)
            ->addColumn('action', function($birth){
                $action = '<a href="' . route('birth.show', $birth->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>&nbsp;';
                // $action .= '<a href="' . route('bookings.edit', $booking->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>';
                return $action;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print(BirthCertificate $birth)
    {
        $tempName = 'templates/birth_certificate.pdf';

        try{

            $pob = strpos($birth->pob, '/') ? $birth->pob : $birth->pob . '/AFG';
            $writableData = [
                'family_name' => $birth->family_name,
                'given_name' => $birth->given_name,
                'previous_name' => $birth->previous_name,
                'sex' => $birth->sex,
                'dob' => $birth->dob,
                'pob' => $pob,
                'passport_no' => $birth->passport_no,
                'issue_date' => $birth->issue_date,
                'serial_no' => $birth->serial_no,
                'mother_name' => $birth->mother_name,
                'father_name' => $birth->father_name,
            ];
            $pdf = new \FPDM($tempName);
            $pdf->Load($writableData, true); // second parameter: false if field values are in ISO-8859-1, true if UTF-8
            // $pdf->Image(route('image.show',['employee', $photo->path]),20,100);
            $pdf->Merge();
            $pdf->Output();

        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }
    }
}
