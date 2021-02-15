<?php

namespace App\Http\Controllers\Post;

use App\Booking;
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

        $this->validate($request, array_merge([
            'name' => 'required|min:3',
            'address' => 'required',
            'phone_no' => 'required',
            'doc_price' => 'nullable|numeric',
            'post_price' => 'nullable|numeric',
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
                'email' => $request->email,
                
                'street' => $request->street,
                'house_no' => $request->house_no,
                'doc_price' => $request->doc_price,
                'post_price' => $request->post_price,

                'phone' => $request->phone_no,
                'booking_id' => $request->booking_id ?? null,
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
            'address' => 'required',
            'phone_no' => 'required',
            'doc_price' => 'nullable|numeric',
            'post_price' => 'nullable|numeric',
            
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
                'street' => $request->street,
                'house_no' => $request->house_no,
                'doc_price' => $request->doc_price,
                'post_price' => $request->post_price,
                'email' => $request->email,
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
        $postal = PostalPackage::with(['deliverables', 'booking:id,serial_no'])->select('postal_packages.*');
        
        if(!request()->order)
            $postal->latest();
            
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
            ->editColumn('booking.serial_no', function($postal){
                if ($postal->booking)
                    $action = '<a href="' . route('bookings.show', optional($postal->booking)->id) .'" >' . optional($postal->booking)->serial_no . '</a>';
                return $action ?? null;
            })
            ->rawColumns(['documents', 'action', 'booking.serial_no'])
            ->addIndexColumn()
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

    /**
     * import from bookings data
     *
     * @param Booking $booking Description
     * @return type
     **/
    public function import(Booking $booking)
    {
        $booking->load(['user', 'info']);
        return view('postal.import', compact('booking'));
    }

    /**
     * reject the postal package
     *
     * @param Booking $booking Description
     * @return type
     **/
    public function reject(PostalPackage $postal)
    {
        $desc = $postal->description;

        $desc .= "\n___________________________________\n";
        $desc .= "Rejected by: ". auth()->user()->email . "\n";
        $desc .= request()->reason;

        $postal->description = $desc;
        $postal->status = 'Rejected';
        $postal->save();

        \App\Jobs\PostalPackageRejected::dispatch($postal, request()->reason);
        
        return redirect(route('postal.edit', $postal->id))
                    ->with(['alert'=>'Action performed successfully']);
    }

}
