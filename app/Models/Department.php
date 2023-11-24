<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name'
    ];

    public function doctor(){
        return $this->hasMany(Doctor::class);
    }
    public function patient(){
        return $this->hasMany(Patient::class);
    }

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
