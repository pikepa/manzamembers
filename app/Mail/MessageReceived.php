<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageReceived extends Mailable
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
        return $this->from('postmaster@mg.manzamembers.org', 'MANZA Message System')
            ->subject('Your Message has been received and forwarded')
            ->markdown('mails.receivedmessage')
            ->with([
                'name' => $this->info['name'],
                'email' => $this->info['email'],
                'subject' => $this->info['subject'],
                'content' => $this->info['content'],
            ]);
    }
}
