<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Report extends Notification
{
    use Queueable;

    protected $content;

    public function __construct($content, $motif)
    {
        $this->content = $content;
        $this->motif = $motif;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $content = $this->content;
        $motif = $this->motif;

        return (new MailMessage)
                    ->subject("Signalement d'une Annonce")
                    ->line('Une Annonce a été signalée')
                    ->line('Motif : ' . $motif)
                    ->line('Messages : ' . $content)
                    ->action('Voir l\'annonce concernée', url('/'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
