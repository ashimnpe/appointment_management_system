<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = User::count();
        $departments = Department::count();
        $doctors = Doctor::count();
        $patients = Patient::count();
        $data = [
            'userCount' => $users,
            'deptCount' => $departments,
            'doctorCount' => $doctors,
            'patientCount' => $patients
        ];
        return view('dashboard',compact('data'));
    }
}
