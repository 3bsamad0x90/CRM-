<?php

namespace Crm\Customer\Listeners;

use Crm\Customer\Events\CustomerCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
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
     * @param  \App\Events\CustomerCreation  $event
     * @return void
     */
    public function handle(CustomerCreation $event)
    {
        // get the customer from the event
        $customer = $event->getCustomer();
        dd($customer);
        // send the welcome email to the customer
        // $customer->sendWelcomeEmail()
    }
}
