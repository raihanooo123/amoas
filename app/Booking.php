<?php

namespace App;

use App\Scopes\DepartmentScope;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'package_id', 'department_id', 'serial_no', 'booking_date',
        'booking_time', 'google_calendar_event_id', 'email', 'booking_type', 'status',
    ];

   /**
     * Calculates the total number of people (main users + participants)
     * already booked for a specific package on a given date.
     *
     * @param int $packageId
     * @param string $date
     * @return int
     */
    public static function countParticipantsForPackageAndDate(int $packageId, string $date): int
    {
        $countingStatuses = ['Processing', 'Waiting', 'Confirmed'];

        $participantsCount = \DB::table('participants')
            ->join('booking_info', 'participants.info_id', '=', 'booking_info.id')
            ->groupBy('booking_info.booking_id')
            
            ->select('booking_info.booking_id', \DB::raw('count(*) as count')); 

        $totalBookedParticipants = self::query()
            ->selectRaw('SUM(COALESCE(T1.count, 0) + 1) as total_participants')
            
            ->leftJoinSub($participantsCount, 'T1', function ($join) {
                $join->on('bookings.id', '=', 'T1.booking_id');
            })
            ->where('bookings.package_id', $packageId)
            ->whereDate('bookings.booking_date', $date)
            ->whereIn('bookings.status', $countingStatuses)
            ->value('total_participants');

        return (int) $totalBookedParticipants;
    }


    
    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function info()
    {
        return $this->hasOne('App\Models\Booking\BookingInfo', 'booking_id');
    }

    public function package()
    {
        return $this->belongsTo('App\Package');
    }

    public function addons()
    {
        return $this->belongsToMany('App\Addon')->withTimestamps();
    }

    public function cancel_request()
    {
        return $this->hasOne('App\CancelRequest');
    }

    public function miscs()
    {
        return $this->hasMany('App\Models\Tracing\Miscellaneous');
    }

    public function postalPackage()
    {
        return $this->hasMany('App\Models\Post\PostalPackage');
    }

    public static function genSerialNo($departmentId, $packageId)
    {
        $counts = self::whereDate('created_at', '=', date('Y-m-d'))->count();

        $department = Department::find($departmentId);

        // $serialNo = $department.'-'.date('ynj').'-'.sprintf('%03d', ++$counts);
        $serialNo = "{$department->code}{$packageId}" . date('ynj') . sprintf('%03d', ++$counts);

        return $serialNo;
    }


    public function participants()
    {
        return $this->hasManyThrough(
            'App\Models\Booking\Participant',  
            'App\Models\Booking\BookingInfo', 
            'booking_id',                      
            'info_id',                         
            'id',                              
            'id'                              
        );
    }
}
