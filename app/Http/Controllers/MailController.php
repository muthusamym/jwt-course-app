<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendWelcomeEmail;

class MailController extends Controller
{
   public function sendEmail()
{
    $user = ['name' => 'Muthu MKDH', 'email' => 'm.muthusamybca@gmail.com'];
	SendWelcomeEmail::dispatch($user);
    #SendWelcomeEmail::dispatch($user)->delay(now()->addMinutes(5));
    #Mail::to($user['email'])->send(new WelcomeMail($user));

    return 'Email Sent1!';
}
}
