<?php
namespace App\Mail;

use App\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    Public $booking;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking  =  $booking;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('postmaster@mg.manzamembers.org', 'Manza Events Team')
                    ->subject('Your Booking has been confirmed !')
                    ->markdown('mails.bookingconfirmed');

    }
}
