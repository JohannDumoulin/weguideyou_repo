<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Alerte extends Notification
{
    use Queueable;

    public $type;
    public $act;
    public $place;
    public $id_advert;

    public function __construct($type, $act, $place, $id_advert)
    {
        $this->type = $type;
        $this->act = $act;
        $this->place = $place;
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
        return explode(', ', $notifiable->notification_preferences);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $type = $this->type;
        $act = $this->act;
        $place = $this->place;
        $id_advert = $this->id_advert;

        return (new MailMessage)
            ->subject("Une Annonce correspond à vos critères !")
            ->line('Une annonce correspondant à vos critères viens d\'être postée.')
            ->line('Type : ' . $type)
            ->line('Activité : ' . $act)
            ->line('Lieu : ' . $place)
            ->action('Voir l\'annonce concernée', url('/a/'.$id_advert));
    }


    public function toDatabase() {

        return [
            'type' => 'Type',
            'content' => 'Contenue',
        ];
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
            'title' => $this->alerte->title,
            'content' => $this->alerte->content,
        ];
    }


}
