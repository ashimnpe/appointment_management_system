<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'doctor_id',
        'institution',
        'level',
        'board',
        'marks',
        'completion_date',
        'adcompletion_date',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor->id');
    }
}
