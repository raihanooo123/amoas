<?php

namespace App\Models\Verification;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $table = 'verifications';
    protected $fillable = [
        "name",
        "last_name",
        "father_name",
        "grand_father_name",
        "occupation",
        "birth_place",
        "marital_status",
        "living_duration",
        "living_duration_unit",
        "last_trip",
        "contact_no",
        "email",
        "service_id",
        "original-village",
        "original-district",
        "current-city",
        "zip-code",
        "current-country",
        "current-state",
        "sibling_name",
        "sibling_last_name",
        "sibling_father_name",
        "sibling_grand_father_name",
        "sibling_id",
        "page_no",
        "version_no",
        "note_no",
        "year",
        "month",
        "day",
    ];
}
