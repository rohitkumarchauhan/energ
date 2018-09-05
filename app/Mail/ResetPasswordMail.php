<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$token)
    {
        $this->user  = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.forgetPassword')->with([
            'name' => $this->user->name,
            // 'email' => $this->user->email,
            'url' => url('/reset/pass/'.base64_encode($this->user->id).'/'.base64_encode($this->token)),
        ]);
    }
}
