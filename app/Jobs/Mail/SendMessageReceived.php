<?php

namespace App\Jobs\Mail;

use App\Mail\MessageReceived;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMessageReceived implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $message;


    public function __construct($message)
    {
        $this->message = $message;
                     
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $bccmembers=['manzatourskl@gmail.com','manzaoffice@gmail.com','manzawebsite@gmail.com'];

        $members=['peter@thepikes.net','manzawebsite@gmail.com'];

        $email = new MessageReceived($this->message );
        Mail::to($this->message->email)
            ->cc($members)
            ->send($email);

    }
}
