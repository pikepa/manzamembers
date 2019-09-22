<?php

namespace App\Jobs\Mail\Messages;
use Mail;
use App\Mail\MessageReceived;
use Illuminate\Bus\Queueable;
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

        $email = new MessageReceived($this->message );
        Mail::to($this->message->email)
            ->cc(['manzaoffice@gmail.com','manzawebsite@gmail.com'])
            ->send($email);
    }
}
