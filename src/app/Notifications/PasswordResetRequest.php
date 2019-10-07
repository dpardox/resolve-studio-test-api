<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequest extends Notification {
    use Queueable;

    protected $token;

    public function __construct($token) {
        $this->token = $token;
    }

    public function via($notifiable) {
        return ['mail'];
    }

    public function toMail($notifiable) {
        return (new MailMessage)
            ->line('Recibió este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.')
            ->action('Restablecer contraseña', 'http://localhost:4200/reset-password/' . $this->token);
    }

    public function toArray($notifiable) {
        return [
            //
        ];
    }
}
