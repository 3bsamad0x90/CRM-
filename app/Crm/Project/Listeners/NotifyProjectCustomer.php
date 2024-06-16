<?php

namespace Crm\Project\Listeners;

use Crm\Project\Events\ProjectCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyProjectCustomer
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreation  $event
     * @return void
     */
    public function handle(ProjectCreation $event)
    {
        $Project = $event->getProject();
        $customer = $Project->customer;
        // $customer->notify(new \Crm\Project\Notifications\ProjectCreation($Project));
        dd($customer);
    }
}
