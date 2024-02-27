<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdoptionRequestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $pet_name;
    public $notification_url;
    public $petOwnerId; // Add pet owner's ID property

    /**
     * Create a new event instance.
     */
    public function __construct($pet_name, $notification_url, $petOwnerId)
    {
        $this->pet_name = $pet_name;
        $this->petOwnerId = $petOwnerId;
        $this->notification_url = $notification_url;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('user.' . $this->petOwnerId);
    }
    public function broadcastAs()
    {
        return 'my-event';
    }
}
