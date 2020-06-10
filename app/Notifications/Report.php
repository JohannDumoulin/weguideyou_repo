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

    public function __construct($content, $motif, $id)
    {
        $this->content = $content;
        $this->motif = $motif;
        $this->id = $id;
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
        $id = $this->id;

        return (new MailMessage)
                    ->subject("Signalement d'une Annonce")
                    ->line('Une Annonce a été signalée')
                    ->line('Motif : ' . $motif)
                    ->line('Messages : ' . $content)
                    ->action('Voir l\'annonce concernée', url('/annonce/'.$id));
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
