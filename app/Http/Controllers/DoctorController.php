<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    // Doctor
    public function index()
    {
        $doctors = Doctor::all();
        return view('system.doctor.index', compact('doctors'));
    }


    public function create()
    {
        $departments = Department::all();
        return view('system.doctor.create', compact('departments'));
    }

    public function store(DoctorRequest $request)
    {
        $validate = $request->validated();
        $validate['department_id'] = $request->department_id;

        $user = User::create([
            'name' => $validate['first_name'] . ' ' . $validate['middle_name'] . ' ' . $validate['last_name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'role' => $validate['role'],
            'status' => $validate['status'],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $fileName = $imagePath->getClientOriginalName();
            $validate['image'] = 'storage/img/' . $fileName;
            $imagePath->storeAs('public/img', $fileName);
        }

        $validate['user_id'] = $user->id;
        $doctor = Doctor::create($validate);

        Education::create([
            'institution' => $validate['institution'],
            'level' => $validate['level'],
            'marks' => $validate['marks'],
            'board' => $validate['board'],
            'completion_date' => $validate['completion_date'],
            'doctor_id' => $doctor->id
        ]);

        Experience::create([
            'organization_name' => $validate['organization_name'],
            'position' => $validate['position'],
            'job_description' => $validate['job_description'],
            'start_date' => $validate['start_date'],
            'end_date' => $validate['end_date'],
            'doctor_id' => $doctor->id
        ]);

        return redirect()->route('doctor.index')->with('create', 'doctor created successfully');
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            // Handle the case where the user does not exist
            return redirect()->route('doctor.index')->with('error', 'Doctor not found');
        }

        return view('system.doctor.profile', ['doctor' => $doctor]);
    }


    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('system.doctor.edit', compact('doctor'));
    }


    public function update(DoctorRequest $request, $id)
    {
        // dd($request);
        $validate = $request->validated();
        $validate['name'] =  $validate['first_name'] . ' ' . $validate['middle_name'] . ' ' . $validate['last_name'];

        $doctor = Doctor::findOrFail($id);
        $u_id = $doctor->user_id;
        $user = User::findOrFail($u_id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $fileName = $imagePath->getClientOriginalName();
            $validate['image'] = 'storage/img/' . $fileName;
            $imagePath->storeAs('public/img', $fileName);
        }

        $user->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'role' => $validate['role'],
            'status' => $validate['status'],
        ]);

        $doctor->education->update([
            'institution' => $validate['institution'],
            'level' => $validate['level'],
            'marks' => $validate['marks'],
            'board' => $validate['board'],
            'completion_date' => $validate['completion_date'],
            'doctor_id' => $doctor->id
        ]);

        $doctor->experience->update([
            'organization_name' => $validate['organization_name'],
            'position' => $validate['position'],
            'job_description' => $validate['job_description'],
            'start_date' => $validate['start_date'],
            'end_date' => $validate['end_date'],
            'doctor_id' => $doctor->id
        ]);

        $doctor->update($validate);
        return redirect()->route('doctor.index')->with('update', 'Doctor Updated Successfully');
    }


    public function destroy($id)
    {
        // findOrFail() => 404 page
        // find() => error page
        $doctor = Doctor::findOrFail($id);
        // $doctor->user->delete();
        $doctor->delete();
        return redirect()->route('doctor.index')->with('delete', 'Doctor deleted successfully');
    }
}
