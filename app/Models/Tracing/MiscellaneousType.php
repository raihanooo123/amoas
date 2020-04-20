<?php

namespace App\Models\Tracing;

use Illuminate\Database\Eloquent\Model;

class MiscellaneousType extends Model
{
    protected $table = 'miscellaneous_type';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
    ];
}
