<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Menu;
use App\Models\Patient;
use App\Models\Schedule;
use App\Notifications\BookNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    private $menus, $patients, $departments, $doctors, $schedule, $booking;
    public function __construct(Menu $menus, Patient $patients, Department $departments, Doctor $doctors, Schedule $schedule, Booking $booking)
    {
        $this->menus = $menus;
        $this->patients = $patients;
        $this->departments = $departments;
        $this->doctors = $doctors;
        $this->schedule = $schedule;
        $this->booking = $booking;
    }

    public function index()
    {

        $menus = $this->menus->orderBy('order', 'ASC')->get();
        $departments = $this->departments->withCount('doctor')->get();
        return view('system.bookings.index', compact('menus', 'departments'));
    }



    public function show($id)
    {
        $departments = $this->departments->findOrFail($id);
        $menus = $this->menus->orderBy('order', 'ASC')->get();
        $doctors =  $this->doctors->with(['schedule' => function ($res) {
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


        return view('system.bookings.show', compact('menus', 'doctors', 'departments', 'dateFormat'));
    }


    public function store(BookingRequest $request)
    {
        $patientDetail = $this->patients->create($request->all());
        $scheduleData =  $this->schedule->findOrFail($request->schedule_id);

        $request['doctor_id'] = $scheduleData->doctor_id;
        $request['patient_id'] = $patientDetail->id;


        $bookingDetail = $this->booking->create($request->only([
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

        Mail::send('emails.appointmentCreated', ['scheduleData' => $scheduleData, 'bookingDetail' => $bookingDetail, 'patientDetail' => $patientDetail], function ($message) use ($patientDetail) {
            $message->to($patientDetail->email, $patientDetail->name)
                ->subject('Appointment Booked');
        });

        $doctor =  $this->doctors->where('id', $bookingDetail->doctor->id)->first();
        $doctor->notify(new BookNotification($bookingDetail));

        $bookingDetail->schedule()->update(['status' => 'booked']);
        $scheduleData->decrement('available_limit');
        Alert::success('Booked', 'Appointment Booked Successfully');

        return redirect()->route('booking.index');
    }
}
