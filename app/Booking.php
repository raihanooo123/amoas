<?php

namespace App;

use App\Scopes\DepartmentScope;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'user_id', 'package_id', 'department_id', 'serial_no', 'booking_date',
        'booking_time', 'google_calendar_event_id' , 'email','booking_type','status',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new DepartmentScope);
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

    public static function genSerialNo($departmentId)
    {
        $counts = self::whereDate('created_at', '=', date('Y-m-d'))->count();

        $department = \App\Department::find($departmentId) ? \App\Department::find($departmentId)->code : 'AFG' ;

        $serialNo = $department . '-' . date('ynj') . '-'. sprintf('%03d', ++$counts);

        return $serialNo;
    }
}
