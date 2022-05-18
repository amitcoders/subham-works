<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user_email;
    public $validToken;
    public $user_name;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_email, $validToken, $user_name)
    {
        $this->user_email = $user_email;
        $this->validToken = $validToken;
        $this->user_name = $user_name;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome')->with([
            'user_email' => $this->user_email,
            'validToken' => $this->validToken,
            'user_name' => $this->user_name,
        ]);
    }
}
