<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmailEventSending
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;

    public int $city_id;

    public Event $event;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, int $city_id, Event $event)
    {
        $this->user = $user;
        $this->city_id = $city_id;
        $this->event = $event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
