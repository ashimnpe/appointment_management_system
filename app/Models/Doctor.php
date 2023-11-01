<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'image',
        'first_name',
        'middle_name',
        'last_name',
        'license_no',
        'email',
        'password',
        'role',
        'nepali_dob',
        'english_dob',
        'gender',
        'specialization',
        'qualification',
        'province',
        'district',
        'municipality',
        'ward',
        'city',
        'tole',
        'contact',
        'status'
    ];

    // protected $hidden = [
    //     'password',
    // ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function education(){
        return $this->hasMany(Education::class);
    }

    public function experience(){
        return $this->hasMany(Experience::class);
    }
}
