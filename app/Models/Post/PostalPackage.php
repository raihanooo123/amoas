<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class PostalPackage extends Model
{
    protected $table = 'postal_packages';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'uid',
        'status',
        'post',
        'registrar_id',
        'department_id',
        'description',
    ];

    protected $appends = ['total'];

    public function passports()
    {
        return $this->morphedByMany('App\Models\Tracing\Passport', 'postable', 'post', 'postal_id');
    }

    public function miscs()
    {
        return $this->morphedByMany('App\Models\Tracing\Miscellaneous', 'postable', 'post', 'postal_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function registrar()
    {
        return $this->belongsTo('App\User', 'registrar_id');
    }

    public function getTotalAttribute()
    {
        return optional($this->passports())->count() + optional($this->miscs())->count();
    }

}
