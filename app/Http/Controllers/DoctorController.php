<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DoctorController extends Controller
{
    private $users, $education,$experience, $departments, $doctors;
    public function __construct(User $users,Education $education,Experience $experience, Department $departments, Doctor $doctors)
    {
        $this->users = $users;
        $this->departments = $departments;
        $this->doctors = $doctors;
        $this->education = $education;
        $this->experience = $experience;
    }


    public function index(){
        $doctors = $this->doctors->all();
        return view('system.doctor.index', compact('doctors'));
    }


    public function create(){
        $departments = $this->departments->all();
        return view('system.doctor.create', compact('departments'));
    }


    public function store(DoctorRequest $request){
        $validate = $request->all();

        $user = $this->users->create([
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
        $doctor = $this->doctors->create($validate);

        // Education create
        $education = $this->education->where('doctor_id', $doctor->id)->get();

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
            $this->education->create($education[$key]);
        }

        // Experience create
        $experience = $this->experience->where('doctor_id', $doctor->id)->get();
        foreach ($validate['organization_name'] as $key => $item) {
            $experience[$key] = [
                'doctor_id' => $doctor->id,
                'organization_name' => $validate['organization_name'][$key],
                'position' => $validate['position'][$key],
                'start_date' => $validate['start_date'][$key],
                'end_date' => $validate['end_date'][$key],
                'start_date_ad' => $validate['start_date_ad'][$key],
                'end_date_ad' => $validate['end_date_ad'][$key],
                'job_description' => $validate['job_description'][$key],
            ];
            $this->experience->create($experience[$key]);
        }

        Alert::success('Success!', 'Doctor Created Successfully');
        return redirect()->route('doctor.index');
    }


    public function show($id){
        $doctor = $this->doctors->findOrFail($id);

        $dob = $doctor->english_dob;
        $age = Carbon::parse($dob)->age;

        return view('system.doctor.profile', compact('doctor','age'));
    }


    public function edit($id){
        $departments = $this->departments->all();
        $doctor = $this->doctors->findOrFail($id);
        return view('system.doctor.edit', compact('doctor', 'departments'));
    }


    public function update(DoctorRequest $request, $id){
        $validate = $request->all();
        $validate['name'] =  $validate['first_name'] . ' ' . $validate['middle_name'] . ' ' . $validate['last_name'];

        $doctor = $this->doctors->findOrFail($id);
        $u_id = $doctor->user_id;
        $user = $this->users->findOrFail($u_id);

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
        if ($doctor->id) {
            $this->education->where('doctor_id', $doctor->id)->delete();


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
        }

        // Experience update
        if ($doctor->id) {
            $this->experience->where('doctor_id', $doctor->id)->delete();

            foreach ($validate['organization_name'] as $key => $item) {
                $experience = new Experience();
                $experience->doctor_id = $doctor->id;
                $experience->organization_name = $validate['organization_name'][$key];
                $experience->position = $validate['position'][$key];
                $experience->start_date = $validate['start_date'][$key];
                $experience->end_date = $validate['end_date'][$key];
                $experience->start_date_ad = $validate['start_date_ad'][$key];
                $experience->end_date_ad = $validate['end_date_ad'][$key];
                $experience->job_description = $validate['job_description'][$key];
                $experience->save();
            }
        }


        Alert::success('Update!', 'Doctor Updated Successfully');
        return redirect()->route('doctor.index')->with('update', 'Doctor Updated Successfully');
    }


    public function destroy($id){
        $doctor = $this->doctors->findOrFail($id);
        $doctor->delete();
        Alert::success('Delete!', 'Doctor deleted successfully');
        return redirect()->route('doctor.index');
    }
}
