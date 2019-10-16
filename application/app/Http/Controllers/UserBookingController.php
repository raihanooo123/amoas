<?php

namespace App\Http\Controllers;

use App\Addon;
use App\Booking;
use App\BookingTime;
use App\Category;
use App\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\GoogleCalendar\Event;

class UserBookingController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | User Booking Controller
    |--------------------------------------------------------------------------
    |
    | This controller loads all frontend booking views and process
    | all requests. Also loads specific user's bookings to view.
    |
    */

    /**
     * get user bookings and load user bookings view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()->orderBy('created_at', 'ASC')->get();
        return view('customer.bookings.index', compact('bookings'));
    }

    /**
     * Initialize a booking
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadBooking()
    {
        $random_pass_string = str_random(10);
        $categories = Category::all();
        return view('welcome', compact('random_pass_string', 'categories'));
    }

    public function ajaxPackageInfo(Request $request)
    {
        echo Package::find($request->id)->description;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPackages()
    {
        $category_id = \request('parent');
        $packages = Category::find($category_id)->packages()->get();
        return view('blocks.packages', compact('packages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTimingSlots()
    {
        //get selected event date
        $event_date = \request('event_date');

        //get selected package_id
        $selected_package_id = Session::get('package_id');

        //get selected category_id
        $selected_category_id = Package::find($selected_package_id)->category->id;

        //get day name to select slot timings
        $timestamp_for_event = strtotime($event_date);
        $today_number = date('N', $timestamp_for_event);
        $booking_time = BookingTime::findOrFail($today_number);

        //decide starting and ending hours for selected date
        $hour_start = $booking_time->opening_time;
        $hour_end = $booking_time->closing_time;

        //decide what will be the duration of each slot
        if(config('settings.slots_with_package_duration'))
        {
            //use package duration as slot duration
            $package = Package::find($selected_package_id);
            $slot_duration = $package->duration * 60;
        }
        else
        {
            //use regular slot duration
            $slot_duration = config('settings.slot_duration') * 60;
        }

        //decide how many slots will be generated
        if(strtotime($hour_start)>strtotime($hour_end))
        {
            $hours = round((strtotime($hour_start) - strtotime($hour_end))/$slot_duration, 1);
        }
        else if(strtotime($hour_end)>strtotime($hour_start))
        {
            $hours = round((strtotime($hour_end) - strtotime($hour_start))/$slot_duration, 1);
        }
        else if(strtotime($hour_start)==strtotime($hour_end))
        {
            $hours = 24;
        }

        //get all bookings to block some already booked slots
        $bookings = Booking::all()->where('status', '!=',__('backend.cancelled'));

        //reset the counter to disable slots
        $count_next_disabled = 0;

        //start loop for slot generation
        for($i = 0; $i < $hours; $i++)
        {
            // minutes to add in lap of each slot
            $minutes_to_add = $slot_duration * $i;

            // increment each slot by minutes_to_add
            $timeslot = date('H:i:s', strtotime($hour_start)+$minutes_to_add);

            //clock format choice
            if(config('settings.clock_format')==12)
            {
                $list_slot[$i]['slot'] = date('h:i A', strtotime($timeslot));
            }
            else
            {
                $list_slot[$i]['slot'] = date('H:i', strtotime($timeslot));
            }

            //if counter for disabling slots is not zero, block the slot as already booked
            if($count_next_disabled!=0)
            {
                $list_slot[$i]['is_available'] = false;
                $count_next_disabled--;
            }
            else
            {
                $list_slot[$i]['is_available'] = true;
            }

            //checking slot availability
            foreach ($bookings as $booking)
            {
                if(strtotime($booking->booking_date)==strtotime($event_date) && strtotime($booking->booking_time)==strtotime($timeslot))
                {
                    //put multiple booking logic

                    //one booking at one slot

                    if(config('settings.slots_method') == 1)
                    {
                        //prevent multiple bookings at same time
                        $list_slot[$i]['is_available'] = false;
                        $package_booking = Package::find($booking->package_id);
                        $package = Package::find($selected_package_id);
                        if(config('settings.slots_with_package_duration'))
                        {
                            $count_next_disabled = ($package_booking->duration / $package->duration) - 1;
                        }
                        else
                        {
                            $count_next_disabled = ($package_booking->duration / config('settings.slot_duration')) - 1;

                        }
                    }

                    //multiple with different package

                    if(config('settings.slots_method') == 3)
                    {
                        if($selected_package_id == $booking->package->id)
                        {
                            //prevent multiple bookings at same time
                            $list_slot[$i]['is_available'] = false;
                            $package_booking = Package::find($booking->package_id);
                            $package = Package::find($selected_package_id);
                            if(config('settings.slots_with_package_duration'))
                            {
                                $count_next_disabled = ($package_booking->duration / $package->duration) - 1;
                            }
                            else
                            {
                                $count_next_disabled = ($package_booking->duration / config('settings.slot_duration')) - 1;

                            }
                        }
                    }

                    //multiple with different category

                    if(config('settings.slots_method') == 4)
                    {
                        if($selected_category_id == $booking->package->category->id)
                        {
                            //prevent multiple bookings at same time
                            $list_slot[$i]['is_available'] = false;
                            $package_booking = Package::find($booking->package_id);
                            $package = Package::find($selected_package_id);
                            if(config('settings.slots_with_package_duration'))
                            {
                                $count_next_disabled = ($package_booking->duration / $package->duration) - 1;
                            }
                            else
                            {
                                $count_next_disabled = ($package_booking->duration / config('settings.slot_duration')) - 1;

                            }
                            break;
                        }
                    }
                }
            }

        }

        return view('blocks.slots', compact('list_slot', 'hours'));

    }

    public function getUpdateSlots()
    {
        $event_date = \request('event_date');
        $booking_id = \request('booking');
        $booking = Booking::find($booking_id);
        $selected_package_id = $booking->package_id;
        $selected_category_id = Package::find($selected_package_id)->category->id;

        $timestamp_for_event = strtotime($event_date);
        $today_number = date('N', $timestamp_for_event);

        //get related booking time for day number
        $booking_time = BookingTime::findOrFail($today_number);

        $hour_start = $booking_time->opening_time;
        $hour_end = $booking_time->closing_time;

        //decide what will be the duration of each slot
        if(config('settings.slots_with_package_duration'))
        {
            //use package duration as slot duration
            $package = Package::find($selected_package_id);
            $slot_duration = $package->duration * 60;
        }
        else
        {
            //use regular slot duration
            $slot_duration = config('settings.slot_duration') * 60;
        }

        if(strtotime($hour_start)>strtotime($hour_end))
        {
            $hours = round((strtotime($hour_start) - strtotime($hour_end))/$slot_duration, 1);
        }
        else if(strtotime($hour_end)>strtotime($hour_start))
        {
            $hours = round((strtotime($hour_end) - strtotime($hour_start))/$slot_duration, 1);
        }
        else if(strtotime($hour_start)==strtotime($hour_end))
        {
            $hours = 24;
        }

        $bookings = Booking::all()->where('status', '!=',__('backend.cancelled'));

        $count_next_disabled = 0;

        for($i = 0; $i < $hours; $i++)
        {
            // increment by 1 hour
            $minutes_to_add = $slot_duration * $i;

            // add 1 hour to each next slot
            $timeslot = date('H:i:s', strtotime($hour_start)+$minutes_to_add);

            //clock format choice
            if(config('settings.clock_format')==12)
            {
                $list_slot[$i]['slot'] = date('h:i A', strtotime($timeslot));
            }
            else
            {
                $list_slot[$i]['slot'] = date('H:i', strtotime($timeslot));
            }

            if($count_next_disabled!=0)
            {
                $list_slot[$i]['is_available'] = false;
                $count_next_disabled--;
            }
            else
            {
                $list_slot[$i]['is_available'] = true;
            }

            //checking slot availability
            //checking slot availability
            foreach ($bookings as $booking)
            {
                if(strtotime($booking->booking_date)==strtotime($event_date) && strtotime($booking->booking_time)==strtotime($timeslot))
                {
                    //put multiple booking logic

                    //one booking at one slot

                    if(config('settings.slots_method') == 1)
                    {
                        //prevent multiple bookings at same time
                        $list_slot[$i]['is_available'] = false;
                        $package_booking = Package::find($booking->package_id);
                        $package = Package::find($selected_package_id);
                        if(config('settings.slots_with_package_duration'))
                        {
                            $count_next_disabled = ($package_booking->duration / $package->duration) - 1;
                        }
                        else
                        {
                            $count_next_disabled = ($package_booking->duration / config('settings.slot_duration')) - 1;

                        }
                    }

                    //multiple with different package

                    if(config('settings.slots_method') == 3)
                    {
                        if($selected_package_id == $booking->package->id)
                        {
                            //prevent multiple bookings at same time
                            $list_slot[$i]['is_available'] = false;
                            $package_booking = Package::find($booking->package_id);
                            $package = Package::find($selected_package_id);
                            if(config('settings.slots_with_package_duration'))
                            {
                                $count_next_disabled = ($package_booking->duration / $package->duration) - 1;
                            }
                            else
                            {
                                $count_next_disabled = ($package_booking->duration / config('settings.slot_duration')) - 1;

                            }
                        }
                    }

                    //multiple with different category

                    if(config('settings.slots_method') == 4)
                    {
                        if($selected_category_id == $booking->package->category->id)
                        {
                            //prevent multiple bookings at same time
                            $list_slot[$i]['is_available'] = false;
                            $package_booking = Package::find($booking->package_id);
                            $package = Package::find($selected_package_id);
                            if(config('settings.slots_with_package_duration'))
                            {
                                $count_next_disabled = ($package_booking->duration / $package->duration) - 1;
                            }
                            else
                            {
                                $count_next_disabled = ($package_booking->duration / config('settings.slot_duration')) - 1;

                            }
                            break;
                        }
                    }
                }
            }

        }

        return view('blocks.backendSlots', compact('list_slot', 'hours'));

    }

    public function update_booking(Request $request, $id)
    {
        $booking = Booking::find($id);
        if($booking->user->id == Auth::user()->id)
        {
            $input = $request->all();

            //update booking

            $booking->update([
                'booking_date' => $input['event_date_bk'],
                'booking_time' => $input['booking_slot']
            ]);

            //if sync is enabled and booking have calender event_id

            if(config('settings.sync_events_to_calendar') && config('settings.google_calendar_id') && $booking->google_calendar_event_id != NULL) {

                //create new timestamp
                $time_string = $input['event_date_bk'] . " " . $input['booking_slot'];
                $start_instance = Carbon::createFromTimestamp(strtotime($time_string), env('LOCAL_TIMEZONE'));
                $end_instance = Carbon::createFromTimestamp(strtotime($time_string), env('LOCAL_TIMEZONE'))->addMinutes($booking->package->duration);

                try{
                    //update google calendar event
                    $event = Event::find($booking->google_calendar_event_id);
                    $event->startDateTime = $start_instance;
                    $event->endDateTime = $end_instance;
                    $event->save();
                } catch(\Exception $ex) {
                    //do nothing
                }

            }

        }

        return redirect()->route('customerBookings');

    }

    /**
     * @param BookingStep1 $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postStep1(Request $request)
    {
        
        $request->session()->put('package_id', $request->package_id);
        return redirect()->route('loadStep2');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadStep2()
    {
        
        //load step 2
        return view('select-booking-time', compact('disable_days_string'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postStep2(Request $request)
    {
        // $this->validate(request(), [
        //     'email' => 'email|required',
        //     'postal' => 'required',
        //     'phone' => 'required',
        //     'full_name' => 'required',
        //     'participant' => '',
        //     'idcard' => 'required',
        //     'address' => 'required',
        // ]);

        $input = $request->all();
        // dd($input);
        //store form input into session and load next step
        $request->session()->put('email', $input['email']);
        $request->session()->put('postal', $input['postal']);
        $request->session()->put('phone', $input['phone']);
        $request->session()->put('full_name', $input['full_name']);
        $request->session()->put('idcard', $input['idcard']);
        $request->session()->put('participant', $input['participant']);
        $request->session()->put('address', $input['address']);

        // $request->session()->put('event_date', $input['event_date']);
        // $request->session()->put('instructions', $input['instructions']);
        // $request->session()->put('booking_slot', $input['booking_slot']);

        return redirect('/select-extra-services');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postStep3(Request $request)
    {
        
        return redirect('/finalize-booking');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadStep3()
    {
        $package_id = Session::get('package_id');
        $package = Package::find($package_id);
        $category_id = $package->category_id;

        //generating a string for off days

        $off_days = DB::table('booking_times')
            ->where('is_off_day', '=', '1')
            ->get();

        $daynum = array();

        foreach ($off_days as $off_day)
        {
            if($off_day->id != 7)
            {
                $daynum[] = $off_day->id;
            }
            else
            {
                $daynum[] = $off_day->id - 7;
            }
        }

        $disable_days_string = implode(",", $daynum);


        return view('select-extra-services', compact('disable_days_string', 'package'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadFinalStep()
    {
        $event_address = str_replace(' ', '+', Session::get('address'));
        $category = Package::find(Session::get('package_id'))->category->title;
        $package = Package::find(Session::get('package_id'));
        $session_addons = DB::table('session_addons')->where('session_email','=',Auth::user()->email)->get();

        //calculate total
        $total = $package->price;
        //add addons price if any
        foreach($session_addons as $session_addon)
        {
            $total = $total + Addon::find($session_addon->addon_id)->price;
        }

        //check if GST is enabled and add it to total invoice
        if(config('settings.enable_gst'))
        {
            $gst_amount = ( config('settings.gst_percentage') / 100 ) * $total;
            $gst_amount = round($gst_amount,2);
            $total_with_gst = $total + $gst_amount;
            $total_with_gst = round($total_with_gst,2);
        }


        return view('finalize-booking', compact('event_address', 'category',
            'package', 'session_addons', 'total', 'total_with_gst', 'gst_amount'));
    }

    /**
     *
     * Thank you - payment completed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function thankYou()
    {
        return view('thank-you');
    }

    /**
     * Payment failed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentFailed()
    {
        return view('payment-failed');
    }

    /**
     *
     * Show booking to customer
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        //checking booking date to allow update or cancel
        $days_limit_to_update = config('settings.days_limit_to_update') * 86400;
        $days_limit_to_cancel = config('settings.days_limit_to_cancel') * 86400;
        $today = date('Y-m-d');

        if(strtotime($booking->booking_date) - strtotime($today) >= $days_limit_to_update)
        {
            $allow_to_update = true;
        }
        else
        {
            $allow_to_update = false;
        }

        if(strtotime($booking->booking_date) - strtotime($today) >= $days_limit_to_cancel)
        {
            $allow_to_cancel = true;
        }
        else
        {
            $allow_to_cancel = false;
        }

        return view('customer.bookings.view' , compact('booking','allow_to_update', 'allow_to_cancel'));
    }

    /**
     *
     * Remove addon from list of booking services
     */
    public function removeFromList()
    {
        $addon_id = \request('addon_id');
        $session_email = \request('session_email');

        DB::table('session_addons')->where('addon_id', '=', $addon_id)->where('session_email','=',$session_email)->delete();

    }

    /**
     *
     * check if addon is added in list of booking services
     */
    public function checkIfAdded($addon_id,$session_email)
    {
        $row = DB::table('session_addons')->where('addon_id', '=', $addon_id)->where('session_email','=',$session_email)->get();
        if(count($row)==0)
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }

    /**
     *
     * load booking update view for user
     */

    public function update($id)
    {
        $booking = Booking::find($id);

        $cancel_request = $booking->cancel_request()->first();

        //generating a string for off days

        $off_days = DB::table('booking_times')
            ->where('is_off_day', '=', '1')
            ->get();



        $daynum = array();

        foreach ($off_days as $off_day)
        {
            if($off_day->id != 7)
            {
                $daynum[] = $off_day->id;
            }
            else
            {
                $daynum[] = $off_day->id - 7;
            }
        }

        $disable_days_string = implode(",", $daynum);

        if($booking->user->id == Auth::user()->id
            && $booking->status != __('backend.cancelled')
            && count($cancel_request)==0)
        {
            return view('customer.bookings.update', compact('booking', 'disable_days_string'));
        }
        else
        {
            return view('errors.404');
        }
    }
}