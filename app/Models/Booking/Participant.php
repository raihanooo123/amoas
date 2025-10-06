<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';

    protected $fillable = [
        'info_id',
        'full_name',
        'id_card',
        'relation',
    ];

    protected $casts = [
        // 'under_18' => 'boolean',
    ];

    public function info()
    {
        // FIX: Relationship should point to BookingInfo, not back to Participant
        return $this->belongsTo('App\Models\Booking\BookingInfo', 'info_id');
    }
}
