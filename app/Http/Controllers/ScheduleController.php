<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Doctor;
use App\Models\Schedule;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    private $schedule, $doctors;
    public function __construct(Schedule $schedule, Doctor $doctors)
    {
        $this->schedule = $schedule;
        $this->doctors = $doctors;
    }

    public function index()
    {
        $schedules = $this->schedule->all();
        $doctors =$this->doctors->with(['schedule' => function ($res) {
            $res->orderBy('book_date_bs', 'asc');
        }])->get();

        $serialNumber = 1;

        foreach ($schedules as $schedule) {
            $schedule->start_time = Carbon::parse($schedule->start_time)->format('h:i A');
            $schedule->end_time = Carbon::parse($schedule->end_time)->format('h:i A');
        }
        return view('system.schedule.index', compact('schedules', 'doctors','serialNumber'));
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

        $start_time = $req->start_time;
        $end_time = $req->end_time;
        $interval = 30;

        $start = Carbon::parse($start_time);
        $end = Carbon::parse($end_time);

        $time_slots = [];

        while ($start < $end) {
            $time_slot = $start->toTimeString();
            $end_slot = $start->clone()->addMinutes($interval)->toTimeString();


            $scheduleData = [
                'user_id' => $user,
                'doctor_id' => $doctor,
                'book_date_bs' => $validate['book_date_bs'],
                'book_date_ad' => $validate['book_date_ad'],
                'start_time' => $time_slot,
                'end_time' => $end_slot,
            ];
            $this->schedule->create($scheduleData);

            $time_slots[] = $time_slot;
            $start->addMinutes($interval);
        }

        Alert::success('Success!', 'Schedule Created Successfully');
        return redirect()->route('schedule.index');
    }


    public function destroy($id)
    {
        $schedule = $this->schedule->findOrFail($id);
        $schedule->delete();
        Alert::success('Delete!', 'Schedule Deleted Successfully');
        return redirect()->route('schedule.index');
    }
}
