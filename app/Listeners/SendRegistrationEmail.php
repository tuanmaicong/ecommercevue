<?php

namespace App\Listeners;

use App\Events\UserRegister;
use App\Mail\UserEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail
{
    /**
     * Handle the event.
     */
    public function handle(UserRegister $event): void
    {
        $name = $event->getName();
        $email = $event->getEmail();
        $password = $event->getPassword();

        $mailContent = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];
        Mail::to($email)->send(new UserEmail($mailContent));
    }
}
