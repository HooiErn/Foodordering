<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DonePrepare
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $table_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($table_id)
    {
        $this -> table_id = $table_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('donePrepare-channel');
    }

    /**
     * 
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'done-prepare';
    }
}
