<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;

class DashboardController extends Controller
{
    private $users, $patients, $departments, $doctors;
    public function __construct(User $users,Patient $patients, Department $departments, Doctor $doctors)
    {
        $this->users = $users;
        $this->patients = $patients;
        $this->departments = $departments;
        $this->doctors = $doctors;
    }

    public function index(){
        $users = $this->users->count();
        $departmentCount = $this->departments->count();
        $doctors = $this->doctors->count();
        $patients = $this->patients->count();

        $notifications = [];
        $user = auth()->user();
        $notes = $user->notifications;
        $notify = $notes->count();
        if($notify!==0){
            foreach($notes as $notification){
                $notifications[] = $notification;
            }
        }

        $data = [
            'userCount' => $users,
            'deptCount' => $departmentCount,
            'doctorCount' => $doctors,
            'patientCount' => $patients,
            'notificationCount' => $notify,
            'notifications' => $notifications
        ];

        $chartData = [
            'labels' => ['Doctor', 'Patient'],
            'data' => [$data['doctorCount'], $data['patientCount']],
        ];

        return view('dashboard',compact('data','chartData'));
    }
}
