<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Patient extends Model implements Auditable
{
    use HasFactory,SoftDeletes;
    use \OwenIt\Auditing\Auditable;

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
