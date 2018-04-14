<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class InsertFinishEvent extends Event implements ShouldBroadcast
{
//    use  SerializesModels;

//    public $token;
    public $uid;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($uid)
    {
//        $this->token = $token;
        $this->user = $uid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('insert.'.$this->user->id);
//        return ['insert.'.$this->user->id];
    }

    public function broadcastWith()
    {
        return ['user' => $this->user];
    }
}
