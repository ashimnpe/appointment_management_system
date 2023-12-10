<?php

namespace App\Http\Controllers;

use App\Models\Department;

class ViewController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('index',compact('departments'));
    }
}
