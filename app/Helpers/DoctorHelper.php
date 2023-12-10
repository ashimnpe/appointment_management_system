<?php

namespace App\Helpers;

use App\Models\Doctor;

class DoctorHelper{
    public function list(){
        // $doctor = Doctor::where('status',1);
        $doctor = Doctor::orderBy('id','DESC')->pluck('first_name','id');
        return $doctor;
    }
}
