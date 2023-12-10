<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Education extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;


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
