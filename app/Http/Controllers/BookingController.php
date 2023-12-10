<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\User;
use App\Notifications\BookNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('doctor')->get();
        return view('system.bookings.index', compact('departments'));
    }



    public function show($id){
        $departments = Department::findOrFail($id);

        $doctors = Doctor::with(['schedule' => function ($res) {
            $res->orderBy('book_date_bs', 'asc');
        }])
        ->where('department_id', $departments->id)
        ->get();

        foreach ($doctors as $doctor) {
            foreach ($doctor->schedule as $schedule) {
                $schedule->end_time =  Carbon::parse($schedule->end_time)->format('h:i A');
                $schedule->start_time = Carbon::parse($schedule->start_time)->format('h:i A');
                $schedule->formatted_date = Carbon::parse($schedule->book_date_bs)->format('M d, l');
            }
        }

        $today = Carbon::now()->toDateString();
        $tomorrow = Carbon::now()->addDay()->toDateString();
        $nextDay = Carbon::now()->addDay(2)->toDateString();
        $dateFormat = [
            'today' => $today,
            'tomorrow' => $tomorrow,
            'nextDay' => $nextDay,
        ];


        return view('system.bookings.show',compact('doctors','departments','dateFormat'));
    }


    public function store(BookingRequest $request){
        $patientDetail = Patient::create($request->all());
        $scheduleData = Schedule::findOrFail($request->schedule_id);

        $request['doctor_id'] = $scheduleData->doctor_id;
        $request['patient_id'] = $patientDetail->id;


        $bookingDetail = Booking::create($request->only([
            'book_date_bs',
            'book_date_ad',
            'schedule_id',
            'patient_id',
            'doctor_id',
            'status',
            'remarks',
        ]));

        $scheduleData->end_time =  Carbon::parse($scheduleData->end_time)->format('h:i A');
        $scheduleData->start_time = Carbon::parse($scheduleData->start_time)->format('h:i A');

        // Mail::send('emails.appointmentCreated', ['scheduleData' => $scheduleData,'bookingDetail' => $bookingDetail, 'patientDetail' => $patientDetail ], function ($message) use ($patientDetail) {
            //     $message->to($patientDetail->email, $patientDetail->name)
            //     ->subject('Appointment Booked');
        // });

        $doctor = Doctor::where('id', $bookingDetail->doctor->id)->first();
        $doctor->notify(new BookNotification($bookingDetail));

        $bookingDetail->schedule()->update(['status' => 'booked']);
        $scheduleData->decrement('available_limit');
        Alert::success('Booked', 'Appointment Booked Successfully');

        return redirect()->route('booking.index');
    }
}
