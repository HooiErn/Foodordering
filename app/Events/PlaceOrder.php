<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlaceOrder implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $table, $orderID;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($table = null, $orderID = null)
    {
        $this -> table = $table;
        $this -> orderID = $orderID;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('placeOrder-channel');
    }

    /**
     * Broadcast event place order
     * 
     * @return void
     */
    public function broadcastAs(){
        return 'place-order';
    }
}
