<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;

class Schedule extends Model implements Auditable
{
    use HasFactory,SoftDeletes,Notifiable;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [
        'user_id',
        'doctor_id',
        'book_date_bs',
        'book_date_ad',
        'start_time',
        'end_time',
        'limit',
        'available_limit',
        'status'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }





}
