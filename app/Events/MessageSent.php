<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $roomId;
    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
        $this->userId = $data->user_id;
        $this->roomId = $data->room_id;
        $this->message = $data->text;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new Channel('chatroom');
    }

    public function broadcastWith()
    {
        return [
            'user_id' => $this->userId,
            'message' => $this->message,
        ];
    }
}
