<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Http\Request;

class PrankSentEvent extends Event
{
    use SerializesModels;
    public $request, $charge;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, $charge)
    {
        //
        $this->request = $request;
        $this->charge = $charge;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
