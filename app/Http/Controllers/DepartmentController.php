<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('doctor')->get();
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
        Alert::success('Success!','Department Created Successfully');
        return redirect()->route('department.index');
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
        Alert::success('Update!','Department Updated Successfully');

        return redirect()->route('department.index');
    }

    public function destroy($id){
        $dept  = Department::findOrFail($id);
        $dept->delete();
        Alert::success('Delete!','Department Deleted Successfully');
        return redirect()->route('department.index');
    }
}
