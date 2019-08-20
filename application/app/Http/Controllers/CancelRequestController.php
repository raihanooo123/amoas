<?php

namespace App\Http\Controllers;

use App\Booking;
use App\CancelRequest;
use App\Mail\AdminCancellationNotification;
use App\Mail\CancellationReceived;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CancelRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cancel_requests = CancelRequest::all();
        return view('cancel_requests.index', compact('cancel_requests'));
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
        $input = $request->all();
        $input['status'] = __('backend.pending');
        CancelRequest::create($input);

        Session::flash('cancel_request_received', __('backend.cancel_request_received'));

        $booking = Booking::find($input['booking_id']);
        $admin = Role::find(1)->users()->get();

        try {
            Mail::to($request->user())->send(new CancellationReceived($booking));
            foreach($admin as $recipient)
            {
                Mail::to($recipient)->send(new AdminCancellationNotification($booking , $recipient));
            }
        } catch(\Exception $ex) {
            //do nothing
        }

        return redirect()->route('showBooking', $input['booking_id']);
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
        $input = $request->all();
        $cancel_request  = CancelRequest::find($id);

        $cancel_request->update($input);

        Session::flash('cancel_request_updated', __('backend.cancel_request_updated'));

        return redirect()->route('cancel-requests.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cancel_request = CancelRequest::find($id);
        $cancel_request->delete();

        Session::flash('cancel_request_deleted', __('backend.cancel_request_deleted'));

        return redirect()->route('cancel-requests.index');
    }

}
