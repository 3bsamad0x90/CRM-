<?php

namespace Crm\User\Events;

use Crm\User\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private User $User;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $User)
    {
        $this->setUser($User);
    }

    // create a getter for the User property
    public function getUser(): User
    {
        return $this->User;
    }

    // create a setter for the User property
    public function setUser(User $User): void
    {
        $this->User = $User;
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
