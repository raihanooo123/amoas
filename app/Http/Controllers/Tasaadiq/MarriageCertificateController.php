<?php

namespace App\Http\Controllers\Tasaadiq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tasaadiq\MarriageCertificate;

class MarriageCertificateController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['permission:marraige certificate show'])->only(['index', 'show']);
        // $this->middleware(['permission:marraige certificate create'])->only(['create', 'store']);
        // $this->middleware(['permission:marraige certificate edit'])->only(['edit', 'update']);
        // $this->middleware(['permission:marraige certificate delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasaadiq.marriage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasaadiq.marriage.create');
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
            'husband_family_name' => 'required',
            'husband_given_name' => 'required',
            'husband_dob' => 'required',
            'husband_pob' => 'required_without:husband_pob_outside',
            'husband_pob_outside' => 'required_without:husband_pob',
            'husband_passport_no' => 'required',

            'wife_family_name' => 'required',
            'wife_given_name' => 'required',
            'wife_dob' => 'required',
            'wife_pob' => 'required_without:wife_pob_outside',
            'wife_pob_outside' => 'required_without:wife_pob',
            'wife_passport_no' => 'required',

            'pom' => 'required',
            'dom' => 'required',
        ]);

        \DB::beginTransaction();
        try {
            $serialNo = MarriageCertificate::generateSerialNo();

            $newMC = MarriageCertificate::create([
                'husband_family_name' => strtoupper($request->husband_family_name) ,
                'husband_given_name' => strtoupper($request->husband_given_name) ,
                'husband_previous_name' => strtoupper($request->husband_previous_name) ,
                'husband_dob' => $request->husband_dob ,
                'husband_pob' => $request->filled('husband_pob_outside') ? strtoupper($request->husband_pob_outside) : strtoupper($request->husband_pob) ,
                'husband_passport_no' => strtoupper($request->husband_passport_no) ,

                'wife_family_name' => strtoupper($request->wife_family_name) ,
                'wife_given_name' => strtoupper($request->wife_given_name) ,
                'wife_previous_name' => strtoupper($request->wife_previous_name) ,
                'wife_dob' => $request->wife_dob ,
                'wife_pob' => $request->filled('wife_pob_outside') ? strtoupper($request->wife_pob_outside) : strtoupper($request->wife_pob) ,
                'wife_passport_no' => strtoupper($request->wife_passport_no) ,

                'pom' => strtoupper($request->pom) ,
                'dom' => $request->dom ,

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

        return redirect()->route('marriage.show', [$newMC])->with(['print' => true ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MarriageCertificate $marriage)
    {
        return view('tasaadiq.marriage.show', compact('marriage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MarriageCertificate $marriage)
    {
        return view('tasaadiq.marriage.edit', compact('marriage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarriageCertificate $marriage)
    {
        $this->validate($request, [
            'husband_family_name' => 'required',
            'husband_given_name' => 'required',
            'husband_dob' => 'required',
            'husband_pob' => 'required_without:husband_pob_outside',
            'husband_pob_outside' => 'required_without:husband_pob',
            'husband_passport_no' => 'required',

            'wife_family_name' => 'required',
            'wife_given_name' => 'required',
            'wife_dob' => 'required',
            'wife_pob' => 'required_without:wife_pob_outside',
            'wife_pob_outside' => 'required_without:wife_pob',
            'wife_passport_no' => 'required',

            'pom' => 'required',
            'dom' => 'required',
        ]);

        \DB::beginTransaction();
        try {

            $marriage->update([
                'husband_family_name' => strtoupper($request->husband_family_name) ,
                'husband_given_name' => strtoupper($request->husband_given_name) ,
                'husband_previous_name' => strtoupper($request->husband_previous_name) ,
                'husband_dob' => $request->husband_dob ,
                'husband_pob' => $request->filled('husband_pob_outside') ? strtoupper($request->husband_pob_outside) : strtoupper($request->husband_pob) ,
                'husband_passport_no' => strtoupper($request->husband_passport_no) ,

                'wife_family_name' => strtoupper($request->wife_family_name) ,
                'wife_given_name' => strtoupper($request->wife_given_name) ,
                'wife_previous_name' => strtoupper($request->wife_previous_name) ,
                'wife_dob' => $request->wife_dob ,
                'wife_pob' => $request->filled('wife_pob_outside') ? strtoupper($request->wife_pob_outside) : strtoupper($request->wife_pob) ,
                'wife_passport_no' => strtoupper($request->wife_passport_no) ,

                'pom' => strtoupper($request->pom) ,
                'dom' => $request->dom
            ]);

            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return redirect()->route('marriage.show', [$marriage->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarriageCertificate $marriage)
    {
        $marriage->delete();
        return redirect()->route('marriage.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable()
    {
        $marriages = MarriageCertificate::with(['registrar:id,last_name'])->select('marriage_certificates.*');
        
        if(!request()->order)
            $marriages->latest();
        
        return datatables()::of($marriages)
            ->addColumn('action', function($marriage){
                $action = '<a href="' . route('marriage.show', $marriage->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>&nbsp;';
                // $action .= '<a href="' . route('bookings.edit', $booking->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>';
                return $action;
            })
            ->addIndexColumn()
            ->make(true);
    }

    
    public function print(MarriageCertificate $marriage)
    {
        $tempName = 'templates/marriage_certificate.pdf';

        try{

            $writableData = [
                'issue_date' => $marriage->issue_date,
                'serial_no' => $marriage->serial_no,
                'pom' => $marriage->pom,
                'dom' => $marriage->dom,
                
                'husband_family_name' => $marriage->husband_family_name,
                'husband_given_name' => $marriage->husband_given_name,
                'husband_previous_name' => $marriage->husband_previous_name,
                'husband_dob' => $marriage->husband_dob,
                'husband_pob' => strpos($marriage->husband_pob, '/') ? $marriage->husband_pob : $marriage->husband_pob . '/AFG',
                'husband_passport_no' => $marriage->husband_passport_no,

                'wife_family_name' => $marriage->wife_family_name,
                'wife_given_name' => $marriage->wife_given_name,
                'wife_previous_name' => $marriage->wife_previous_name,
                'wife_dob' => $marriage->wife_dob,
                'wife_pob' => strpos($marriage->wife_pob, '/') ? $marriage->wife_pob : $marriage->wife_pob . '/AFG',
                'wife_passport_no' => $marriage->wife_passport_no,
                
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
