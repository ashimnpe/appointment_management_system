<p>Dear {{ $patientDetail->name }},</p>

<p>Your appointment has been booked successfully.</p>

<ul>
    <li>Booked Date: <b>{{ $bookingDetail->book_date_bs }}</b></li>
    <li>Booked Time: <b>{{ $scheduleData->start_time . ' - ' . $scheduleData->end_time }}</b></li>
    <li>Doctor: <b>{{ $bookingDetail->doctor->first_name . ' ' . $bookingDetail->doctor->last_name }}</b></li>
</ul>
<p>Thank you for choosing our service!</p>
