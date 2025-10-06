<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Otp extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 
        'otp_code', 
        'expires_at',
    ];

    // Ensure expires_at is a Carbon instance
    protected $dates = [
        'expires_at',
    ];

    /**
     * Get the user that owns the OTP.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}