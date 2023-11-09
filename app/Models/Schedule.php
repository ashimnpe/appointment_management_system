<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_bs',
        'date_ad',
        'start_time',
        'end_time',
        'limit',
        'doctor_id',
        'user_id',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

}
