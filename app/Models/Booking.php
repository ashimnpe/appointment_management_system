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
        'schedule_id',
        'book_date_bs',
        'book_date_ad',
        'remarks',
        'status'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);

    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);

    }

    public function toggleStatus()
    {
        $this->status = $this->status === 'booked' ? 'approved' : 'canceled';
        $this->save();
    }

}
