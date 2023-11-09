<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'book_date_bs',
        'book_date_ad',
        'start_time',
        'end_time',
        'remarks',
        'status'
    ];

    public function patient(){
        return $this->hasMany(Patient::class);
    }
}
