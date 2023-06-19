<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Http\Utils\ChooseNotifiableChanels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReview extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $name;
    public function __construct(string $name)
    {
        $this->name=$name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return  ChooseNotifiableChanels::channel($notifiable->id);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->gretting('Chers freelancer , ')
                    ->subject('Freeci - Nouveau commentaire')
                    ->line('Un utilisateur a envoyé un nouveau commentaire .')
                    ->action('Voir le commentaire', url('/commentaire'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title'=>'Nouveau commentaire',
            'description'=>$this->name.' a ajouté un commentaire',
            'provide'=>'review'
        ];
    }
}