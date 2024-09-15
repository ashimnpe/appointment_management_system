<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    private $bookings, $patients;
    public function __construct(Booking $bookings, Patient $patients){
        $this->bookings = $bookings;
        $this->patients = $patients;
    }

    public function index(){
        $bookings = $this->bookings->orderBy('book_date_ad', 'asc')->get();
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
        $bookings = $this->bookings->all();

        if($query){
            $patients = $this->patients->where('name', 'LIKE', "%$query%")->get();
            if($patients->isNotEmpty()){
                $bookings = $this->bookings->whereIn('patient_id', $patients->pluck('id'))->get();
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
        $appointment = $this->bookings->where('doctor_id', $doctor_id)->get();
        return view('system.appointment.index',['appointment' => $appointment]);
    }


    public function edit(Request $request, $id){
        $updatedstatus = $request->input('status');
        $bookings = $this->bookings->find($id);

        $schedule = $bookings->schedule;

        $bookings->status = $updatedstatus;
        $bookings->save();

        if($bookings->status == 'approved'){
            Alert::success('Success!','Status Approved Sucessfully!');
        }else{
            // Mail::send('emails.appointmentCanceled', ['booking' => $bookings], function ($message) {
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
