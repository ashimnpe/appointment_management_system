<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'date_bs',
        'date_ad',
        'start_time',
        'end_time',
        'limit',
        'available_limit',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
