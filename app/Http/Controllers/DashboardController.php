<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $users = User::count();
        $departments = Department::count();
        $doctors = Doctor::count();
        $patients = Patient::count();

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
            'deptCount' => $departments,
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
