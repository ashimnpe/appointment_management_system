<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
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
        $validate = $request->all();

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

        // Doctor create
        $doctor = Doctor::create($validate);

        // Education create
        $education = Education::where('doctor_id', $doctor->id)->get();

        foreach ($validate['institution'] as $key => $item) {
            $education[$key] = [
                'doctor_id' => $doctor->id,
                'institution' => $validate['institution'][$key],
                'level' => $validate['level'][$key],
                'board' => $validate['board'][$key],
                'completion_date' => $validate['completion_date'][$key],
                'adcompletion_date' => $validate['adcompletion_date'][$key],
                'marks' => $validate['marks'][$key],
            ];
            Education::create($education[$key]);
        }

        // Experience create
        $experience = Experience::where('doctor_id', $doctor->id)->get();
        foreach ($validate['organization_name'] as $key => $item) {
            $experience[$key] = [
                'doctor_id' => $doctor->id,
                'organization_name' => $validate['organization_name'][$key],
                'position' => $validate['position'][$key],
                'start_date' => $validate['start_date'][$key],
                'end_date' => $validate['end_date'][$key],
                'job_description' => $validate['job_description'][$key],
            ];
            Experience::create($experience[$key]);
        }

        // Alert::succ`('success');
        return redirect()->route('doctor.index')->with('create', 'doctor created successfully');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('system.doctor.profile', compact('doctor'));
    }


    public function edit($id)
    {
        $departments = Department::all();
        $doctor = Doctor::findOrFail($id);
        return view('system.doctor.edit', compact('doctor', 'departments'));
    }


    public function update(DoctorRequest $request, $id)
    {
        $validate = $request->all();
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

        // Doctor update
        $doctor->update($validate);

        // Education update
        $del_education = Doctor::findOrFail($doctor->id);
        if ($del_education) {
            Education::where('doctor_id', $doctor->id)->delete();
        }

        foreach ($validate['institution'] as $key => $item) {
            $education = new Education();
            $education->doctor_id = $doctor->id;
            $education->level = $validate['level'][$key];
            $education->institution = $validate['institution'][$key];
            $education->board = $validate['board'][$key];
            $education->marks = $validate['marks'][$key];
            $education->completion_date = $validate['completion_date'][$key];
            $education->adcompletion_date = $validate['adcompletion_date'][$key];
            $education->save();
        }

        // Experience update
        $del_experience = Doctor::findOrFail($doctor->id);
        if ($del_experience) {
            Experience::where('doctor_id', $doctor->id)->delete();
        }
        foreach ($validate['organization_name'] as $key => $item) {
            $experience = new Experience();
            $experience->doctor_id = $doctor->id;
            $experience->organization_name = $validate['organization_name'][$key];
            $experience->position = $validate['position'][$key];
            $experience->start_date = $validate['start_date'][$key];
            $experience->end_date = $validate['end_date'][$key];
            $experience->job_description = $validate['job_description'][$key];
            $experience->save();
        }

        return redirect()->route('doctor.index')->with('update', 'Doctor Updated Successfully');
    }


    public function destroy($id)
    {
        // findOrFail() => 404 page
        // find() => error page

        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctor.index')->with('delete', 'Doctor deleted successfully');
    }
}
