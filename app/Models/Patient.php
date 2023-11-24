<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'contact',
        'address',
        'dob_bs',
        'dob_ad',
        'gender'
    ];

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }


    public function department(){
        return $this->belongsTo(Department::class);
    }
}
