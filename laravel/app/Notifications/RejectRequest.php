<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectRequest extends Notification
{
    use Queueable;
    public $notificationUrl;
    /**
     * Create a new notification instance.
     */
    public function __construct($notificationUrl)
    {
        $this->notificationUrl = $notificationUrl;
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

    public function toDatabase($notifiable)
    {
        return [
            'message' => auth()->user()->name . ' has rejected your request',
            'notification_url' => $this->notificationUrl
        ];
    }
    public function toMail(): MailMessage
    {
        return (new MailMessage)
            ->subject(auth()->user()->name . ' has rejected your request') // Custom subject line
            ->greeting('Hello!') // Custom greeting
            ->action('history', url('/history')) // Button with custom text and URL
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
