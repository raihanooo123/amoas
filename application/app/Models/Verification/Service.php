<?php

namespace App\Models\Verification;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'label_en', 'label_dr',
    ];
}
