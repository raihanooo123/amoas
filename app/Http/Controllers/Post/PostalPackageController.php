<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post\PostalPackage;
use Yajra\Datatables\Datatables;
use App\Models\Tracing\Passport;

class PostalPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:postal show'])->only(['index', 'show']);
        $this->middleware(['permission:postal create'])->only(['create', 'store']);
        $this->middleware(['permission:postal edit'])->only(['edit', 'update']);
        $this->middleware(['permission:postal delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('postal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postal.create');
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
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone_no' => 'required',
        ]);

        \DB::beginTransaction();

        
        $counts = PostalPackage::whereDate('created_at', '=', date('Y-m-d'))->count();
        $uid = date('ynj') . ++$counts;

        $misc = PostalPackage::create([
                'uid' => $uid,
                'department_id' => auth()->id(),
                'name' => $request->name,
                'status' => $request->status,
                'post' => $request->post,
                'address' => $request->address,
                'phone' => $request->phone_no,
                'description' => $request->description,
                'registrar_id' => auth()->id(),
            ]);

        \DB::commit();

        return redirect(route('postal.index'))
            ->with(['alert'=>'Action performed successfully']);
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
    public function edit(PostalPackage $postal)
    {
        return view('postal.edit', compact('postal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostalPackage $postal)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone_no' => 'required',
        ]);

        \DB::beginTransaction();

        $postal->update([
                'name' => $request->name,
                'status' => $request->status,
                'post' => $request->post,
                'address' => $request->address,
                'phone' => $request->phone_no,
                'description' => $request->description,
            ]);

        \DB::commit();

        return redirect(route('postal.index'))
            ->with(['alert'=>'Action performed successfully']);
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

    public function dataTable()
    {
        $postal = PostalPackage::query();
        return Datatables::of($postal)
            ->addColumn('action', function($postal){
                $action = '<a href="' . route('postal.edit', $postal->id) .'" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>&nbsp;';
                // $action .= '<a href="' . route('users.reset', $postal->id) .'" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure want to reset user password?\')"><i class="fa fa-recycle"></i></a>&nbsp;';
                // $action .= '<a href="' . route('users.edit', $postal->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>';
                return $action;
            })
            ->make(true);
    }

    public function new($type, $modelId)
    {
        $details = null;

        if($type == 'passport'){
            $passport = Passport::findOrFail($modelId);
            $doc = $passport->trace;

            $details = [
                'name' => $doc->applicant,

            ];
        }
        elseif($type == 'misc'){

        }
        else{

        }
    }
}
