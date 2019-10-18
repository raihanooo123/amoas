<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'user_id', 'package_id', 'department_id', 'serial_no', 'booking_date',
        'booking_time', 'google_calendar_event_id' , 'status',
    ];

    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function info()
    {
        return $this->hasOne('App\Models\Booking\BookingInfo','booking_id');
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

    public static function genSerialNo()
    {
        return 'lasjdlf';
    }
}
