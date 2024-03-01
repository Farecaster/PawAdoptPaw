<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RejectRequestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $owner_name;
    public $notification_url;
    public $requesterId; // Add pet owner's ID property

    /**
     * Create a new event instance.
     */
    public function __construct($owner_name, $notification_url, $requesterId)
    {
        $this->owner_name = $owner_name . " has rejected your request";
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
        return 'reject-event' . $this->requesterId;
    }
}
