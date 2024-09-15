<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Experience extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [
        'doctor_id',
        'organization_name',
        'position',
        'job_description',
        'start_date',
        'start_date_ad',
        'end_date',
        'end_date_ad',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
