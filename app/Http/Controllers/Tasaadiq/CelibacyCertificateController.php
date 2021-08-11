<?php

namespace App\Http\Controllers\Tasaadiq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tasaadiq\CelibacyCertificate;

class CelibacyCertificateController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['permission:celibacy certificate show'])->only(['index', 'show']);
        // $this->middleware(['permission:celibacy certificate create'])->only(['create', 'store']);
        // $this->middleware(['permission:celibacy certificate edit'])->only(['edit', 'update']);
        // $this->middleware(['permission:celibacy certificate delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasaadiq.celibacy.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasaadiq.celibacy.create');
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
            'pob' => 'required',
            'passport_no' => 'required',
        ]);

        \DB::beginTransaction();
        try {
            $serialNo = CelibacyCertificate::generateSerialNo();

            $newCC = CelibacyCertificate::create([
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
                'sex' => $request->sex,
                'dob' => $request->dob,
                'pob' => $request->pob,
                'passport_no' => $request->passport_no,
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

        return redirect()->route('celibacy.show', [$newCC])->with(['print' => true ]);
        // return redirect()->route('celibacy.print', [$newCC]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CelibacyCertificate $celibacy)
    {
        return view('tasaadiq.celibacy.show', compact('celibacy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CelibacyCertificate $celibacy)
    {
        return view('tasaadiq.celibacy.edit', compact('celibacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CelibacyCertificate $celibacy)
    {
        $this->validate($request, [
            'family_name' => 'required',
            'given_name' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'passport_no' => 'required',
        ]);

        \DB::beginTransaction();
        try {
            $celibacy->update([
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
                'sex' => $request->sex,
                'dob' => $request->dob,
                'pob' => $request->pob,
                'passport_no' => $request->passport_no,
            ]);

            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return redirect()->route('celibacy.show', [$celibacy]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CelibacyCertificate $celibacy)
    {
        $celibacy->delete();
        return redirect()->route('celibacy.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable()
    {
        $celibacies = CelibacyCertificate::with(['registrar:id,last_name'])->select('celibacy_certificates.*');
        
        if(!request()->order)
            $celibacies->latest();
        
        return datatables()::of($celibacies)
            ->addColumn('action', function($celibacy){
                $action = '<a href="' . route('celibacy.show', $celibacy->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>&nbsp;';
                // $action .= '<a href="' . route('bookings.edit', $booking->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>';
                return $action;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print(CelibacyCertificate $celibacy)
    {
        $tempName = 'templates/celibacy_certificate.pdf';

        try{

            $writableData = [
                'family_name' => $celibacy->family_name,
                'given_name' => $celibacy->given_name,
                'sex' => $celibacy->sex,
                'dob' => $celibacy->dob,
                'pob' => $celibacy->pob . '/AFG',
                'passport_no' => $celibacy->passport_no,
                'issue_date' => $celibacy->issue_date,
                'serial_no' => $celibacy->serial_no,
                'status' => 'LEDIG/SINGLE',
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
