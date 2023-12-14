<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','order','type','module_id','page_id','external_link','status'
    ];

    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function module(){
        return $this->belongsTo(Module::class);
    }
}
