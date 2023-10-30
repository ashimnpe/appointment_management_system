<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'level',
        'institution',
        'start_date',
        'end_date',
        'board',
        'marks'
    ];
}
