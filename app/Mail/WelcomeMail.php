<?php

namespace App\Mail;
#namespace App\Models\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
{
    $this->user = $user;
}

public function build()
{
    return $this->subject('Welcome!')
                ->markdown('emails.welcome')
                ->with([
                    'name' => $this->user->name,
                ]);
}

}
