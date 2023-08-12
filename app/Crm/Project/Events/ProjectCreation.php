<?php

namespace Crm\Project\Events;

use Crm\Project\Models\Project;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Project $Project;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Project $Project)
    {
        $this->setProject($Project);
    }

    // create a getter for the Project property
    public function getProject(): Project
    {
        return $this->Project;
    }

    // create a setter for the Project property
    public function setProject(Project $Project): void
    {
        $this->Project = $Project;
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
