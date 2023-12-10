<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookNotification extends Notification
{
    use Queueable;
    public $booking, $book_time;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bookingDetail)
    {
        $this->booking = $bookingDetail;
        $this->book_time = $bookingDetail->schedule->start_time . ' - ' . $bookingDetail->schedule->end_time;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Appointment Booked')
            ->line('Appointment has been booked for you.')
            ->action('View Appointment', url('/dashboard'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'booking_id' =>  $this->booking->id,
            'message' => 'Appointment has been booked for you',
            'date' => $this->booking->book_date_bs,
            'time' => $this->book_time,
        ];
    }
}
