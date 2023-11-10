<?php

namespace App\Http\Controllers;
use App\Http\Requests\ScheduleRequest;
use App\Models\Doctor;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 0 || auth()->user()->role == 1) {
            $schedules = Schedule::get();
            $doctors = Doctor::get();
            return view('system.schedule.index', compact('schedules', 'doctors'));
        } else if (auth()->user()->role == 2) {
            $doctor = Doctor::where('user_id', auth()->user()->id)->first();
            $schedules = Schedule::where('doctor_id', $doctor->id)->get();
            return view('system.schedule.index', compact('schedules'));
        }
    }

    public function store(ScheduleRequest $request)
    {
        $user = auth()->user()->id;
        $scheduleData = [
            'user_id' => $user,
            'doctor_id' => $request['doctor_id'],
            'date_bs' => $request['date_bs'],
            'date_ad' => $request['date_ad'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
            'limit' => $request['limit'],
            'available_limit' => $request['limit'],
        ];
        Schedule::create($scheduleData);

        return redirect()->route('schedule.index')->with('success', 'Schedule Created Successfully');
    }
}
