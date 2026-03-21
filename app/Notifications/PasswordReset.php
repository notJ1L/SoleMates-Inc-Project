<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordReset extends Notification implements ShouldQueue
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForReset(),
        ], false));

        return (new MailMessage)
            ->subject('Password Reset Request - SoleMates')
            ->view('emails.passwords.reset', [
                'user' => $notifiable,
                'token' => $this->token,
                'resetUrl' => $resetUrl,
            ]);
    }
}
