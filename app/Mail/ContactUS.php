<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class ContactUS extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $info;
    public function __construct(Request $info)
    {
        // dd($info1);
        $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->info->message);
        return $this->view('mails.contact_us')
                    ->with([
                        'lastname' => $this->info->lastname,
                        'firstname' => $this->info->firstname,
                        'email' => $this->info->email,
                        'telephone' => $this->info->telephone,
                        'topic' => $this->info->topic,
                        'Clientmessage' => $this->info->message,
                    ]);;
    }
}
