<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class BookingInfo extends Model
{
    protected $table = 'booking_info';

    protected $fillable = [
        'booking_id',
        'full_name',
        'email',
        'phone',
        'id_card',
        'postal',
        'address',
    ];

    protected $casts = [
        // 'under_18' => 'boolean',
    ];

    public function booking()
    {
        return $this->hasOne('App\Booking', 'booking_id');
    }

    public function participants()
    {
        return $this->hasMany('App\Models\Booking\Participant', 'info_id');
    }
}
