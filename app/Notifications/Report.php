<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Report extends Notification implements ShouldQueue 
{
    use Queueable;

    public $content;
    public $motif;
    public $id_advert;

    public function __construct($content, $motif, $id_advert)
    {
        $this->content = $content;
        $this->motif = $motif;
        $this->id_advert = $id_advert;
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
        $id_advert = $this->id_advert;

        return (new MailMessage)
            ->subject("Signalement d'une Annonce")
            ->line('Une Annonce a été signalée')
            ->line('Motif : ' . $motif)
            ->line('Messages : ' . $content)
            ->action('Voir l\'annonce concernée', url('/annonce/'.$id_advert));
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
