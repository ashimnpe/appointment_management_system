<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
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

        return view('system.bookings.show',compact('doctors','departments'));
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
            'remarks'
        ]));


        $bookingDetail->schedule()->update(['status' => 'booked']);

        Alert::success('Booked', 'Appointment Booked Successfully');
        return redirect()->route('booking.index');
    }

    public function toggleStatus($id){
        $booking = Booking::find($id);

        if ($booking) {
            $booking->toggleStatus();

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
