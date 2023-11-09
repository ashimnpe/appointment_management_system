<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Experience;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('system.department.index', compact('departments'));
    }

    public function create()
    {
        return view('system.department.create');
    }

    public function store(DepartmentRequest $request)
    {
        Department::create([
            'department_name'  => $request['department_name']
        ]);
        return redirect()->route('department.index')->with('create', 'Department Created Successfully');
    }

    public function edit($id){
        $dept = Department::findOrFail($id);
        return view('system.department.edit',compact('dept'));

    }

    public function update(Request $request, $id){
        $dept = Department::findOrFail($id);
        $dept->update([
            'department_name' => $request->department_name,
        ]);

        return redirect()->route('department.index')->with('success','Department Created Successfully');
    }

    public function destroy($id){
        $dept  = Department::findOrFail($id);
        $dept->delete();
        return redirect()->route('department.index')->with('delete','Department Deleted Successfully');
    }
}
