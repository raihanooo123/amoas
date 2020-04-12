<?php

namespace App\Models\Tracing;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'traceable_docs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id',
        'uid',
        'traceable_id',
        'traceable_type',
        'status',
        'is_public',
        'email',
        'applicant',
        'note',
        'registrar_id',
    ];

    public function traceable()
    {
        return $this->morphTo();
    }
}
