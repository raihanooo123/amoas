<?php

namespace App\Models\Tasaadiq;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class BirthCertificate extends Model
{
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'birth_certificates';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'serial_no',
        'issue_date',
        'family_name',
        'given_name',
        'previous_name',
        'sex',
        'dob',
        'pob',
        'passport_no',
        'father_name',
        'mother_name',
        'department_id',
        'registrar_id',
    ];

    protected static $logFillable = true;
    protected static $logName = 'Birth Certificate';
    protected static $ignoreChangedAttributes = ['updated_at'];
    protected static $logOnlyDirty = true;

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function registrar()
    {
        return $this->belongsTo('App\User', 'registrar_id');
    }

    public static function generateSerialNo()
    {
        
        $counts = self::withoutGlobalScopes()->count();
        $dayCounts = self::whereDate('created_at', '=', date('Y-m-d'))->count();

        return 'BC' . date('ymd') . sprintf('%02d', $dayCounts + 1) . sprintf('%03d', $counts + 1);
    }
}
