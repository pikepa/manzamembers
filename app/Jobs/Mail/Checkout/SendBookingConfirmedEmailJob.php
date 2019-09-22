<?php

namespace App\Jobs\Mail\Checkout;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmed;
use App\Booking;
use Log;

class SendBookingConfirmedEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    
    Mail::to($this->booking->email)
        ->cc(['manzaoffice@gmail.com','manzawebsite@gmail.com'])
        ->send(new BookingConfirmed($this->booking));

    }
}
