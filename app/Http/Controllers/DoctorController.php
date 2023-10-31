<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Http\Requests\EducationRequest;
use App\Http\Requests\ExperienceRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;

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

        $doctor->update($validate);

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


    // multi
    public function store(DoctorRequest $request)
    {
        $validate = $request->validated();
        // $request->session()->put('doctor', $validate);
        // return redirect()->route('doctorEducation.create');


        // doctor-store-start
        $validate['department_id'] = $request->department_id;

        $user = User::create([
            'name' => $validate['first_name'] . ' ' . $validate['middle_name'] . ' ' . $validate['last_name'],
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
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
        // dd($validate);
        Doctor::create($validate);
        // doctor-store-end

        return redirect()->route('doctors.index')->with('create','doctor created successfully');


    }

    // Doctor Education
    public function educationCreate(Request $request)
    {
        return view('system.education.create');
    }


    public function educationStore(EducationRequest $request)
    {
        $validateEducation = $request->all();
        $request->session()->put('education',$validateEducation);
        $data = $request->session()->get('doctor','education');
        dd($data);
        return redirect()->route('doctorExperience.create');
    }


    // Doctor Experience
    public function experienceCreate(Request $request)
    {

        // $validate = $request->all();
        // $request->session()->get('doctor',$validate);
        // dd($validate);
        return view('system.experience.create');
    }

    public function experienceStore(ExperienceRequest $request)
    {
        $validate = $request->validated();
        // dd($validate);
        $request->session()->put('education', $validate);
        return redirect()->route('');
    }
}
