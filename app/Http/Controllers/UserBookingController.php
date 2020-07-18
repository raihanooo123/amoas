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
use Endroid\QrCode\QrCode;

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
        $bookings = Auth::user()->bookings()->latest()->get();
        return view('customer.bookings.index', compact('bookings'));
    }

    /**
     * Initialize a booking
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadBooking()
    {
        // dd(request()->all());
        if(request()->has('mission')){
            $department = \App\Department::where('code', strtoupper(request()->mission))->where('status', 1)->first();
            if($department)
                request()->session()->put('department',$department);
        }

        $categories = Category::with('packages')->get();

        return view('welcome', compact('categories'));
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
        return $this->getNewTimingSlots();
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
        if(strtotime($hour_start) > strtotime($hour_end))
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
        dd($hours); 

        return view('blocks.slots', compact('list_slot', 'hours'));

    }

    public function getNewTimingSlots()
    {
        //get selected event date
        $event_date = request('event_date');

        //get selected package_id
        $package =  Package::find(Session::get('package_id', request('package_id')));

        //get day name to select slot timings
        $timestamp_for_event = strtotime($event_date);
        $today_number = date('N', $timestamp_for_event);
        // return $today_number;
        $booking_time = BookingTime::findOrFail($today_number);


        //decide starting and ending hours for selected date
        $hour_start = $booking_time->opening_time;
        $hour_end = $booking_time->closing_time;
        $startSeconds = strtotime($hour_start);
        $endSeconds = strtotime($hour_end);

        //get the booking count
        
        $bookedByHours = Booking::select('booking_time', \DB::raw('count(*) as total'))
            ->where('package_id', $package->id)
            ->where('booking_type', '!=', 'emergency')
            ->where('status','!=' ,'Cancelled')
            ->whereDate('booking_date', $event_date)
            ->groupBy('booking_time')
            // ->having('total', '>=', $participants)
            // ->having('booking_time', '=', $event_date)
            ->get()
            ->pluck('total','booking_time')
            ->toArray();

        $ungentBooking = 0;
        if(auth()->check() && auth()->user()->role && (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin()))
            $ungentBooking = Booking::where('package_id', $package->id)
                ->where('booking_type', '=', 'emergency')
                ->whereDate('booking_date', $event_date)
                ->count();
        
        $hours = array();
        while($startSeconds < $endSeconds){
            
            $time = date('g:i A', $startSeconds);

            $hours[] = $time;

            $startSeconds += 60*60;
            
        }

        $eachSlotAvailablity = round($package->daily_acceptance/count($hours), 0, PHP_ROUND_HALF_DOWN);

        return view('blocks.new-slots', compact('bookedByHours', 'hours', 'eachSlotAvailablity', 'ungentBooking'));
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
//        dd($request->all());
        if($booking->user->id != Auth::user()->id)
            abort(403);

        $oldBooking = $booking; // for sending email
        $booking->update([
            'booking_date' => $request->event_date_bk,
            'booking_time' => $request->booking_slot,
        ]);
        $user = auth()->user()->email;

        // send mail to user.
        \App\Jobs\BookingDateChangedEmail::dispatch($booking, $oldBooking, $user);

        return redirect()->route('customerBookings');

    }

    /**
     * @param BookingStep1 $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postStep1(Request $request)
    {
        $request->session()->put('package_id', $request->package_id);
        $package = Package::findOrFail(Session::get('package_id'));

        // Check if the online visa form is selected
        // if($package){
        //    $visa = preg_match('/visa/i', $package->title, $output_array);
        //    if($visa)
        //        return redirect()->route('visa-form.fill');
        // }

        return redirect()->route('loadStep2');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadStep2()
    {
        if(!session()->has('package_id')) return redirect('/');
        //load step 2
        return view('select-booking-time');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postStep2(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'email|required',
            'postal' => 'required',
            'phone' => 'required',
            'full_name' => 'required',
            'participant' => '',
            'idcard' => 'required',
            'address' => 'required',
            'department_id' => 'required',
        ],[
            'postal.regex'=> __('app.postalError')
        ]);

        // search for specific pattern
        // 4[0-9]\d+|5[0-9]\d+|6[0-9]\d+|3[2-6]\d+|97\d+ bonn
        // 'regex:/^(01[0-9]\d+|04[0-9]\d+|12[0-9]\d+|13[0-9]\d+|141[0-9]\d+|20[0-9]\d+)/' berlin

        $validator->sometimes('postal', ['regex:/^(4[0-9]\d+|5[0-9]\d+|6[0-9]\d+|3[2-6]\d+|97\d+)/'], function ($input) use ($request, $validator) {

            $department = \App\Department::findOrFail($request->department_id) ?? session('department');

            if ($department && $department->code == 'CBONN')
                // $validator->errors()->add('postal.regex', __('app.postalError', ['department'=> \Lang::has('app.' . $department->name_en, app()->getLocale()) ? __('app.' . $department->name_en) : $department->name_en]));
                return true;
            
        });
        
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();
        
        //store form input into session and load next step
        $request->session()->put('email', $input['email']);
        $request->session()->put('postal', $input['postal']);
        $request->session()->put('phone', $input['phone']);
        $request->session()->put('full_name', $input['full_name']);
        $request->session()->put('idcard', $input['idcard']);
        $request->session()->put('participant', $input['participant']);
        $request->session()->put('address', $input['address']);
        $request->session()->put('department_id', $input['department_id']);

        return redirect('/select-extra-services');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postStep3(Request $request)
    {
        $holidays = session()->has('holidays') ? implode(',', session('holidays')) : null;

        $this->validate($request, [
            'event_date' => 'date|required|not_in:'. $holidays,
            'booking_slot' => 'required',
            "participant.*.name"  => "required",
            "participant.*.id_card"  => "required",
            "participant.*.relation"  => "required",
        ],[
            'event_date.not_in' => __('app.holidays_blocked', ['date' => $request->event_date])
        ]);

        $request->session()->put('event_date', $request->event_date);
        $request->session()->put('booking_slot', $request->booking_slot);
        $request->session()->put('participantInfo', $request->participant);

        // dd(now()->addWeeks()->endOfDay()->format('Y-m-d H:i:s'));
        // dd(now()->startOfDay()->format('Y-m-d H:i:s'));
        $bookingCountInWeek = auth()
                                ->user()
                                ->bookings()
                                ->where('created_at', '>=', now()->startOfDay()->format('Y-m-d H:i:s'))
                                ->where('created_at', '<=', now()->addWeeks()->endOfDay()->format('Y-m-d H:i:s'))
                                ->get()
                                ->count();

        if($bookingCountInWeek > 0 && auth()->user()->role_id == 2){

            $lastBooking = auth()->user()->bookings()->latest()->first();

            $tillDate = optional($lastBooking->created_at)->addWeeks()->addDays()->startOfDay()->format('Y-m-d H:i:s');
            // dd($tillDate);
            abort(403, __('app.max_limit', ['tillDate' => $tillDate]));
        }
        
        \DB::beginTransaction();
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'package_id' => session('package_id'),
            'department_id' => session('department_id'),
            'serial_no' => Booking::genSerialNo(session('department_id')),
            'booking_date' => $request->event_date,
            'booking_type' => ucfirst($request->booking_type) ?? 'Ordinary',
            'booking_time' => $request->booking_slot,
            'email' => session('email'),
            'status' => 'Waiting',
        ]);
        
        $info = $booking->info()->create([
            'full_name' => session('full_name'),
            'email' => session('email'),
            'phone' => session('phone'),
            'id_card' => session('idcard'),
            'postal' => session('postal'),
            'address' => session('address'),
        ]);
        
        if($request->has('participant'))
            foreach($request->participant as $key => $participant){
                $info->participants()->create([
                    'full_name' => $participant['name'],
                    'id_card' => $participant['id_card'],
                    'relation' => $participant['relation'],
                ]);

                ${"var{$key}"} = Booking::create([
                    'user_id' => $booking->user_id,
                    'package_id' => $booking->package_id,
                    'department_id' => $booking->department_id,
                    'serial_no' => '#' . ($key + 1) .'-'.$booking->serial_no,
                    'booking_date' => $booking->booking_date,
                    'booking_type' => $booking->booking_type,
                    'booking_time' => $booking->booking_time,
                    'email' => $booking->email,
                    'status' => $booking->status,
                ]);

                ${"var{$key}"}->info()->create([
                    'full_name' => $info->full_name ."| {$participant['relation']}",
                    'email' => $info->email,
                    'phone' => $info->phone,
                    'id_card' => $participant['id_card'],
                    'postal' => $info->postal,
                    'address' => $info->address,
                ]);
            }

        \DB::commit();

        $booking->load(['user', 'info', 'package', 'department']);
        \App\Jobs\FinalizeNewBooking::dispatch($booking);

        $request->session()->put('bookingId', $booking->id);

        return redirect('/finalize-booking');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadStep3()
    {
        if(!session()->has('package_id')) return redirect('/');

        $package = Package::find(Session::get('package_id'));
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

        // $holydays = DB::table('holydays')
        //     ->whereDate('date', '>=', date('Y-m-d'))
        //     ->get()
        //     ->pluck('date')
        //     ->toArray();

        $dep_id = session('department_id');
        $holydays = \App\Holidays::whereHas('departments', function ($query) use($dep_id) {
            $query->where('id', $dep_id);
        })->get()
            ->pluck('date')
            ->toArray();

        if($holydays)
            $holydays = array_merge(...$holydays);

        request()->session()->put('holidays', $holydays);

        $participants = --$package->daily_acceptance;
        if(session()->has('participant')) $participants -= session('participant');
        // dd($participants);


        //should work on it
        $bookedDates = \App\Booking::select('booking_date', \DB::raw('count(*) as total'))
            ->where('package_id', $package->id)
            ->where('status','!=' ,'Cancelled')
            ->groupBy('booking_date')
            ->having('total', '>=', $participants)
            ->having('booking_date', '>=', date('Y-m-d'))
            ->get()
            ->pluck('booking_date')
            ->toArray();

//        dd($bookedDates);

        $disabledDates = json_encode(array_merge($holydays, $bookedDates));

        // dd($disabledDates);
        $daynum = array();

        return view('select-extra-services', compact('disable_days_string', 'package', 'disabledDates'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadFinalStep()
    {
        if(!session()->has('package_id') || !session()->has('bookingId')) return redirect('/');
        $category = Package::find(Session::get('package_id'))->category->title;
        $package = Package::find(Session::get('package_id'));
        $booking = Booking::with('department','package','info','info.participants')->find(session('bookingId'));
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

        $userId = auth()->id();
        $department = session()->get('department');

        request()->session()->flush();

        auth()->loginUsingId($userId);

        if($department) request()->session()->put('department', $department);

        return view('finalize-booking', compact('category',
            'package', 'session_addons', 'total', 'booking'));
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

        // load other details
        $booking->load('info', 'info.participants');

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

        $package = $booking->package;

        $dep_id = $booking->department->id;
        $holydays = \App\Holidays::whereHas('departments', function ($query) use($dep_id) {
            $query->where('id', $dep_id);
        })->get()->pluck('date');

        $holydays = array_merge(...$holydays);
        //should work on it
        $bookedDates = \App\Booking::select('booking_date', \DB::raw('count(*) as total'))
            ->where('package_id', $booking->package->id)
            ->where('status','!=' ,'Cancelled')
            ->groupBy('booking_date')
            ->having('total', '>=', --$package->daily_acceptance)
            ->having('booking_date', '>=', date('Y-m-d'))
            ->get()
            ->pluck('booking_date')
            ->toArray();

        $disabledDates = json_encode(array_merge($holydays, $bookedDates));

        if($booking->user->id == Auth::user()->id
            && $booking->status != 'cancelled')
        {
            return view('customer.bookings.update', compact('booking', 'disable_days_string', 'disabledDates'));
        }
        else
        {
            return view('errors.404');
        }
    }

    public function print($id)
    {

        $booking = Booking::with('department','package')->find($id);

        // $afgLogo = (string) \Image::make('images/afg-logo.png')->encode('data-url');
        // $qrCode = (string) $this->writeQrCode($booking->serial_no);
        // return view('print-booking-success-new', compact('booking', 'afgLogo', 'qrCode'));
        return view('print-booking-success-new', compact('booking'));
    }

    public function writeQrCode($text)
    {
        $qrCode = new QrCode($text);
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(10);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setSize(200);
        // Save it to a file
        $qrCode->writeFile('temp/qrcode.png');
        return \Image::make('temp/qrcode.png')->encode('data-url');
    }

    public function printPdf($id)
    {
        $booking = Booking::with('department','package')->find($id);

        // $afgLogo = (string) \Image::make('images/afg-logo.png')->encode('data-url');
        // $qrCode = (string) $this->writeQrCode($booking->serial_no);
        
        $pdf = \PDF::loadView('print-booking-success', compact('booking'))->setPaper('A4');
        return $pdf->download('booking_result.pdf');
    }
}