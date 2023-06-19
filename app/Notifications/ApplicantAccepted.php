<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Http\Utils\ChooseNotifiableChanels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicantAccepted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $title;
    public function __construct(string $title)
    {
        $this->title=$title;
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
                    ->subject('Freeci - Candidature accepté')
                    ->line('Votre candidature a été acceptée .')
                    ->action('Visiter', url('/mission/mes-missions'));
    }
    
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title'=>'Mission décrochée',
            'description'=>'Votre candidature à la mission '.$this->title.' a été acceptée',
            'provide'=>'candidacy'
        ];
    }
}