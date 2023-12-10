<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;


class Booking extends Model implements Auditable
{
    use HasFactory,SoftDeletes, Notifiable;
    use \OwenIt\Auditing\Auditable;

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
}
