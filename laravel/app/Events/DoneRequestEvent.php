<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DoneRequestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pet_name;
    public $notification_url;
    public $requesterId; 

    /**
     * Create a new event instance.
     */
    public function __construct($pet_name, $notification_url, $requesterId)
    {
        $this->pet_name = "You Successfully Adopted " . $pet_name;
        $this->requesterId = $requesterId;
        $this->notification_url = $notification_url;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('user'),
        ];
    }
    public function broadcastAs()
    {
        return 'done-event' . $this->requesterId;
    }
}
