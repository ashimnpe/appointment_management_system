<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use GuzzleHttp\Psr7\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ViewController extends Controller
{
    public function index(){
        return view('index');

    }
}
