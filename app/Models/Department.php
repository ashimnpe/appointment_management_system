<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Department extends Model implements Auditable
{
    use HasFactory,SoftDeletes;
    use \OwenIt\Auditing\Auditable;

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
