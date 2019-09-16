<?php

namespace App\Models\Verification;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $table = 'verifications';
    protected $fillable = [
        'department_id',
        'name',
        'last_name',
        'father_name',
        'grand_father_name',
        'birth_place',
        'marital_status',
        'living_duration',
        'living_duration_unit',
        'last_trip',
        'service_id',
        'original_village',
        'original_district',
        'original_province',
        'current_city',
        'zip_code',
        'current_country',
        'height',
        'eyes',
        'skin',
        'hair',
        'other',
        'd_name',
        'd_last_name',
        'd_father_name',
        'd_contact',
        'sibling_name',
        'sibling_last_name',
        'sibling_father_name',
        'sibling_grand_father_name',
        'sibling_id',
        'page_no',
        'version_no',
        'note_no',
        'year',
        'month',
        'day'
    ];
}
