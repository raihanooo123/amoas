<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'phone_number', 
        'email', 
        'password', 
        'role_id', 
        'is_active', 
        'photo_id', 
        'department_id',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function department()
    {
        if(!$this->department_id)
            throw new \App\Exceptions\CustomException('User does not assigned to a department.');
        return $this->belongsTo('App\Department');
    }

    public function isAdmin()
    {
        if($this->role->id == 1)
        {
            return true;
        }
        return false;
    }

    public function isCustomer()
    {
        if($this->role->id == 2)
        {
            return true;
        }
        return false;
    }

    public function isSuperAdmin()
    {
        preg_match('/super-admin|super_admin|super admin|super administrator/i', $this->role->name, $matches);

        return $matches ? true : false;
    }
}
