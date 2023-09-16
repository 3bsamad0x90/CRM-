<?php

namespace Crm\User\Listeners;

use Crm\User\Events\UserCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeEmail
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
     * @param  UserCreation  $event
     * @return void
     */
    public function handle(UserCreation $event)
    {
        $User = $event->getUser();
        dd($User);
        // $customer->notify(new \Crm\User\Notifications\UserCreation($User));
    }
}
