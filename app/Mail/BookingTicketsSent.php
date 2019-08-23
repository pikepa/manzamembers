<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingTicketsSent extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking,$event,$totaltickets)
    {
        $this->booking  =  $booking;
        $this->event  =  $event;
        $this->tickets  =  $totaltickets;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('postmaster@mg.manzamembers.org', 'Manza Events Team')
            ->subject('Your Tickets are Here')
            ->markdown('mails.bookingtickets')
            ->with([
                'name' => $this->booking['name'],
                'event_date'=>$this->event['date'],
                'confirmed_at'=>$this->booking['confirmed_at'],
                'venue' => $this->event['venue'],
                'timing' => $this->event['timing'],
                'ticket_ref' => 'MAN10'.$this->booking['id'],
                'add_title'=>$this->event['add_title'],
                'add_info'=>$this->booking['add_info'],
                'title'=>$this->event['title'],
                'tickets'=>$this->tickets,
                'url'=>'https://manzamembers.org'.$this->booking->event['featured_img'],
            ]);
    }
}
