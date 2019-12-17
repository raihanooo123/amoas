<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    protected $appends = ['date'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 
        'month', 
        'year', 
        'repeated', 
        'description',
    ];

    public function departments(){
        return $this->belongsToMany('App\Department', 'department_holidays');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getDateAttribute()
    {
        $dates = [];
        if($this->repeated == 1) 
            for($i=0; $i<3; $i++){
                $dateRaw = strtotime('2019-5-6');
                $date = strtotime($i . ' years', $dateRaw);
                $dates[] =  date('Y-m-d', $date);
            }
        else
            $dates[] = date('Y-m-d', strtotime("{$this->year}-{$this->month}-{$this->day}"));

        return $dates;
    }

}
