<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\User;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('system.doctor.index', compact('doctors'));
    }


    public function create()
    {
        return view('system.doctor.create');
    }


    public function store(DoctorRequest $request)
    {
        $validate = $request->validated();

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
        // Doctor::create($validate);
        return redirect()->route('education.create');
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

        // Delete the previous image file if it exists
        // if (!empty($doctor->image)) {
        //     unlink($imagePath . $doctor->image);
        // }

        // $doctor->image = $fileName;



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
}
