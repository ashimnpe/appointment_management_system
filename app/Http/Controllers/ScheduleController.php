<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Doctor;
use App\Models\Schedule;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        $schedules = Schedule::all();
        return view('system.schedule.index', compact('schedules', 'doctors'));
    }

    public function store(ScheduleRequest $req)
    {
        $validate = $req->all();
        $user = auth()->user()->id;

        if (auth()->user()->role == 1 || auth()->user()->role == 0) {
            $doctor = $validate['doctor_id'];
        } else {
            $doctor =  auth()->user()->doctor->id;
        }

        foreach ($validate['start_time'] as $key => $item) {
            $scheduleData[$key] = [
                'user_id' => $user,
                'doctor_id' => $doctor,
                'book_date_bs' => $validate['book_date_bs'],
                'book_date_ad' => $validate['book_date_ad'],
                'start_time' => $validate['start_time'][$key],
                'end_time' => $validate['end_time'][$key],
            ];
            Schedule::create($scheduleData[$key]);
        }
        Alert::success('Success!', 'Schedule Created Successfully');
        return redirect()->route('schedule.index');
    }

    public function update(ScheduleRequest $request, $id)
    {

    }

    public function destroy($id)
    {
        // dd($id);
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        Alert::success('Delete!', 'Schedule Deleted Successfully');
        return redirect()->route('schedule.index');
    }
}
