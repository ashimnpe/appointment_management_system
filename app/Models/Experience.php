<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'doctor_id',
        'organization_name',
        'position',
        'job_description',
        'start_date',
        'end_date',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
