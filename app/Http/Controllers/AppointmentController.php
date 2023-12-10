<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    public function index(){
        $bookings = Booking::orderBy('book_date_ad', 'asc')->get();

        $days=[];
        foreach($bookings as $book){
            $bookDay = $book->book_date_ad;
            $carbonDate = Carbon::parse($bookDay);
            $days[] = $carbonDate->format('D');
        }

        return view('system.appointment.index', compact('bookings','days'));
    }

    public function searchPatient(Request $request){
        $query = $request->input('search');
        $bookings = Booking::all();

        if($query){
            $patients = Patient::where('name', 'LIKE', "%$query%")->get();
            if($patients->isNotEmpty()){
                $bookings = Booking::whereIn('patient_id', $patients->pluck('id'))->get();
                return view('system.appointment.index',compact('patients','bookings'));

            }else{
                Alert::error('Error','No patients found for the given name.');
                return view('system.appointment.index',compact('patients','bookings'));
            }
        }
        Alert::error('Error','Please enter a search query.');
        return view('system.appointment.index',compact('bookings'));

    }

    public function show(int $id)
    {
        $doctor_id = $id;
        $appointment = Booking::where('doctor_id', $doctor_id)->get();
        return view('system.appointment.index',['appointment' => $appointment]);
    }


    public function edit(Request $request, $id){
        $updatedstatus = $request->input('status');
        $booking = Booking::find($id);

        $schedule = $booking->schedule;

        $booking->status = $updatedstatus;
        $booking->save();

        if($booking->status == 'approved'){
            Alert::success('Success!','Status Approved Sucessfully!');
        }else{
            // Mail::send('emails.appointmentCanceled', ['booking' => $booking], function ($message) {
            //     $message->to('ashimnpe@gmail.com', 'Ashim Neupane')
            //     ->subject('Appointment Canceled');
            // });
            Alert::success('Success!','Status Canceled!');
            $schedule->status = 'pending';
            $schedule->save();

        }
        return redirect()->back();
    }
}
