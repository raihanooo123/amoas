<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'photo_id', 'type',
    ];

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function packages()
    {
        return $this->hasMany('App\Package');
    }

    public function addons()
    {
        return $this->hasMany('App\Addon');
    }
}
