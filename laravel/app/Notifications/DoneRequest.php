<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DoneRequest extends Notification
{
    use Queueable;

    public $pet_name;
    public $notification_url;
    public $adoptername;
    /**
     * Create a new notification instance.
     */
    public function __construct($pet_name, $notificationUrl, $adoptername)
    {
        $this->notification_url = $notificationUrl;
        $this->pet_name = $pet_name;
        $this->adoptername = $adoptername;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }
    public function toDatabase(object $notifiable)
    {
        return [
            'message' => $this->adoptername . ' Succesfully Adopted',
            'notification_url' => $this->notification_url
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Adopted Successfully!') // Custom subject line
            ->greeting('Hello!') // Custom greeting
            ->line($this->adoptername
                . ' Succesfully Adopted ' . $this->pet_name) // First line of content
            ->action('Go to history', url('/history')) // Button with custom text and URL
            ->line('Thank you for using our application!'); // Last line of content
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
