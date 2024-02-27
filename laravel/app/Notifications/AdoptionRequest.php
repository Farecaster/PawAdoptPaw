<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdoptionRequest extends Notification
{
    use Queueable;

    public $petName;
    public $notificationUrl;
    /**
     * Create a new notification instance.
     */
    public function __construct($petName, $notificationUrl)
    {
        $this->petName = $petName;
        $this->notificationUrl = $notificationUrl;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    // /**
    //  * Get the mail representation of the notification.
    //  */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'pet_name' => $this->petName,
            'notification_url' => $this->notificationUrl
        ]);
    }

    public function toDatabase($notifiable)
    {
        return [
            'pet_name' => $this->petName,
            'notification_url' => $this->notificationUrl
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
