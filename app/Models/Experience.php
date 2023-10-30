<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'organization_name',
        'position',
        'job_description',
        'start_date',
        'end_date',
    ];
}
