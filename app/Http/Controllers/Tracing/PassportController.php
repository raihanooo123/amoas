<?php

namespace App\Http\Controllers\Tracing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tracing\Passport;
use Yajra\Datatables\Datatables;
use App\Imports\ImpPassportTracing;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tracing.passport.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->exists('import'))
            return $this->storeImports($request);
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImports(Request $request)
    {
        sleep(50);
        $this->validate($request, [
            'department_id' => 'required',
            'note' => 'nullable|max:254',
            'excel_file' => 'required',
        ]);
            
        // Import to Array
        $passportsArr = \Excel::toArray(new ImpPassportTracing, request()->file('excel_file'));

        if(array_key_exists(0, $passportsArr)){
            
            session(['totalCount' => count($passportsArr[0])]);
            // $this->impProgressTotalCount = count($passportsArr[0]);
            //Get the uids that already exist
            $alreadyExist = Passport::whereIn('uid', array_column($passportsArr[0], 'id'))->get();
            $alreadyExist = optional($alreadyExist)->pluck('uid')->toArray();

            foreach($passportsArr[0] as $passport){
                if(!in_array($passport['id'], $alreadyExist))
                    if($passport['id'] != null){
                        $pass = Passport::create([
                                'uid' => $passport['id'],
                                'family_name' => $passport['family_name'],
                                'given_name' => $passport['given_names'],
                                'passport_no' => $passport['passport_no'],
                                'department_id' => $request->department_id,
                                'status' => $passport['status'],
                                'date' => !$passport['date'] ?: \Carbon\Carbon::createFromFormat('d-M-Y',$passport['date'])->format('Y-m-d'),
                            ]);
                                
                        $pass->trace()->create([
                                'department_id' => $request->department_id,
                                'uid' => $passport['id'],
                                'status' => $passport['status'],
                                'is_public' => $request->is_public,
                                'note' => $request->note,
                                'registrar_id' => auth()->id(),
                                'applicant' => $passport['given_names'] . ' ' . $passport['family_name'],
                            ]);
                    }
                session(['progressCount' => session('progressCount', -1) + 1]);
            }
        }
        
        return redirect(route('passport.index'))
            ->with(['alert'=>'Excel imported successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Import the specified resource from excel file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        return view('tracing.passport.import');
    }
    
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable()
    {
        return Datatables::of(Passport::query())
            ->addColumn('action', function($doc){
                $action = '<a href="' . route('passport.show', $doc->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>&nbsp;';
                // $action .= '<a href="' . route('bookings.edit', $booking->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>';
                return $action;
            })
            ->make(true);
    }

    public function impProgressStatus()
    {
        return response()->json([
            'status' => session('progressCount') > 0 ? 'Importing Excel' : 'Uploading File' ,
            'importedCount' => session('progressCount'),
            'importedTotalCount' => session('totalCount'),
        ]);
    }
}
