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
        $rules = array();
        // foreach(range(1, 8) as $c1){
        //     $rules['doc_type' .$c1] = 'required_with:name'.$c1.',uid'.$c1;
        //     $rules['name' .$c1] = 'required_with:doc_type'.$c1.',uid'.$c1;
        //     $rules['uid' .$c1] = 'required_with:doc_type'.$c1.',name'.$c1;
        // }

        $this->validate($request, array_merge([
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone_no' => 'required',
            
        ], $rules));

        \DB::beginTransaction();

        
        $counts = PostalPackage::whereDate('created_at', '=', date('Y-m-d'))->count();
        $uid = date('ynj') . ++$counts;

        $misc = PostalPackage::create([
                'uid' => $uid,
                'department_id' => auth()->id(),
                'name' => $request->name,
                'status' => $request->status,
                'post' => $request->post,
                'date' => $request->date,
                'place' => $request->place,
                'address' => $request->address,
                'phone' => $request->phone_no,
                'description' => $request->description,
                'registrar_id' => auth()->id(),
            ]);

        foreach(range(1, 8) as $c)
            if(request()->filled('name' .$c))
                $misc->deliverables()->create([
                    'doc_type' => $request->input('doc_type' . $c),
                    'name' => $request->input('name' . $c),
                    'uid' => $request->input('uid' . $c),
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
        $rules = array();
        foreach(range(1, 8) as $c1){
            // $rules['name' .$c1] = 'required';
            // $rules['doc_type' .$c1] = 'required_with:name'.$c1.',uid'.$c1;
            // $rules['name' .$c1] = 'required_with:doc_type'.$c1.',uid'.$c1;
            // $rules['uid' .$c1] = 'required_with:doc_type'.$c1.',name'.$c1;
        }

        $this->validate($request, array_merge([
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone_no' => 'required',
            
        ], $rules));

        \DB::beginTransaction();

        $postal->update([
                'name' => $request->name,
                'status' => $request->status,
                'post' => $request->post,
                'date' => $request->date,
                'place' => $request->place,
                'address' => $request->address,
                'phone' => $request->phone_no,
                'description' => $request->description,
            ]);

        foreach(range(1, 8) as $c)
            if(request()->filled('id' .$c))
                $postal->deliverables()->find($request->input('id' . $c))->update([
                    'doc_type' => $request->input('doc_type' . $c),
                    'name' => $request->input('name' . $c),
                    'uid' => $request->input('uid' . $c),
                ]);
            else
                if(request()->filled('name' .$c))
                    $postal->deliverables()->create([
                        'doc_type' => $request->input('doc_type' . $c),
                        'name' => $request->input('name' . $c),
                        'uid' => $request->input('uid' . $c),
                    ]);

        \DB::commit();

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
        $postal = PostalPackage::with('deliverables')->select('postal_packages.*');
        return Datatables::of($postal)
            ->addColumn('action', function($postal){
                $action = '<a href="' . route('postal.edit', $postal->id) .'" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>&nbsp;';
                // $action .= '<a href="' . route('users.reset', $postal->id) .'" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure want to reset user password?\')"><i class="fa fa-recycle"></i></a>&nbsp;';
                // $action .= '<a href="' . route('users.edit', $postal->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>';
                return $action;
            })
            ->addColumn('documents', function(PostalPackage $postal) {
                $deliverables = optional($postal->deliverables)->all();

                $deliverables = array_map(function($value){
                    return str_replace(' ', '-', $value->name) ."\n";  
                    // return $value->doc_type . "|" . str_replace(' ', '.', $value->name) . "|" . $value->uid . "\n";  
                }, $deliverables);

                return nl2br(implode('', $deliverables));
            })
            // ->filterColumn('documents', function($query, $keyword) {
            //     $sql = "select * from deliverable_docs where deliverable_docs.doc_type like ? or deliverable_docs.name like ? or deliverable_docs.uid like ?";
            //     $query->whereRaw($sql, ["%{$keyword}%", "%{$keyword}%", "%{$keyword}%"]);
            // })
            ->rawColumns(['documents', 'action'])
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
