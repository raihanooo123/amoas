<?php

namespace App\Models\Visa;

use Illuminate\Database\Eloquent\Model;

class VisaForm extends Model
{
    protected $table = 'visa_form';
    protected $fillable = [
        'department_id',
        'title',
        'family_name',
        'given_name',
        'father_name',
        'dob',
        'birth_country',
        'marital_status',
        'gender',
        'residence_country',
        'nationality',
        'other_nationality',
        'under_18',
        'address',
        'email',
        'mobile',
        'occupation',
        'employer_name',
        'employer_address',
        'pre_employer_name',
        'status',
        'pre_employer_address',
        'visa_type',
        'purpose',
        'entry_date',
        'intend_duration',
        'entry_point',
        'children_no',
        'visit_places',
        'af_address',
        'visited_before',
        'applied_visa',
        'criminal_record',
        'passport_type',
        'passport_no',
        'issue_place',
        'issue_date',
        'expire_date',
        'photo',
        'registrar_id',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'current_country');
    }

    public function image()
    {
        return $this->morphOne('App\Attachment', 'attachable');
    }

    public function registrar()
    {
        return $this->belongsTo('App\User', 'registrar_id');
    }
}
