<?php

namespace App\Http\Controllers;

use App\Booking;
use App\CancelRequest;
use App\Invoice;
use App\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    | This controller is responsible for providing dashboard views to
    | admin and customer.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if Auth user role is admin
        if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
        {
            //find all customers
            $role = Role::find(2);
            $customers = $role->users->count();

            //find all bookings
            $bookings = Booking::count();

            //get all cancel requests
            $cancel_requests = DB::table('cancel_requests')->where('status','=', __('backend.pending'))->get();


            //set date range for bookings and earning weekly data
            $days = Input::get('days', 7);
            $range = Carbon::now()->subDays($days);

            // dd($range->format('Y-m-d'));
            //get data for bookings graph
            $stats_booking = Booking::where('booking_date', '>=', $range->format('Y-m-d'))
                ->where('status', '!=', 'cancelled')
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->get([DB::raw('Date(created_at) as date'),
                    DB::raw('COUNT(*) as value')]);

            //get data for cancelled bookings
            $bookings_cancelled = DB::table('bookings')->where('status','=', __('backend.cancelled'))->get();

            return view('dashboard.admin', compact('customers', 'bookings',
                  'stats_booking', 'bookings_cancelled', 'cancel_requests'));
        }

        //if Auth user role is customer
        else if(Auth::user()->isCustomer())
        {
            $user = Auth::user();
            $bookings = $user->bookings()->where('status','!=', __('backend.cancelled'))->count('id');
            $recent_bookings = $user->bookings()->orderBy('created_at', 'ASC')->limit('5')->get();

            //find successful invoices and calculate total
            $successful_invoices = $user->invoices()->where('is_refunded','=', 0)->get();
            $total_paid = 0;
            foreach ($successful_invoices as $successful_invoice)
            {
                $total_paid = $total_paid + $successful_invoice->amount;
            }

            //find refunded invoices and calculate total
            $refunded_invoices = $user->invoices()->where('is_refunded','=', 1)->get();
            $total_refunded = 0;
            foreach ($refunded_invoices as $refunded_invoice)
            {
                $total_refunded = $total_refunded + $refunded_invoice->amount;
            }

            $bookings_cancelled = $user->bookings()->where('status','=', __('backend.cancelled'))->count('id');

            return view('dashboard.customer', compact('bookings', 'total_paid',
                'bookings_cancelled', 'recent_bookings', 'total_refunded'));
        }
    }

}
