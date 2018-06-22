<?php

namespace App\Events;

use App\Landmarks;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CreatedLandMarkEven
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $landMark;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Landmarks $landmarks)
    {
        $this->landMark = $landmarks;
    }

}
