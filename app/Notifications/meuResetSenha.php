<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class meuResetSenha extends Notification {

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token) {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
                        ->subject('Recuperação de Senha')
                        ->greeting('Olá!')
                        ->line('Você está recebendo está este e-mail porque recebemos uma soliçitação de redefinição de senha para está conta! ')
                        ->action('redefinir Senha', url(config('app.url') . route('password.reset', $this->token, false)))
                        ->line('Obrigado por você utilizar o nosso sistema!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
                //
        ];
    }

}
