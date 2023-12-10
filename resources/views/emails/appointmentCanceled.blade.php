<p>Dear {{ $booking->patient->name }},</p>

<p>We are very sorry to infrom you that your appointment on <b>Date: {{ $booking->schedule->book_date_bs }}</b>  <br>
    <b>Time: {{ $booking->schedule->start_time . ' - ' . $booking->schedule->end_time}}</b> has been canceled.</p>

<p>Reason: </p>
<p>Thank you for choosing our service!</p>

