<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->info  =  $info;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('postmaster@mg.manzamembers.org', 'Manza Events Team')
            ->subject('Your Booking has been confirmed')
            ->markdown('mails.bookingconfirmed')
            ->with([
                'name' => $this->info['name'],
                'link' => $this->info['receipt_url'],
            ]);
    }
}
