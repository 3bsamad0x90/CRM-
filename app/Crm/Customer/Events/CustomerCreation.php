<?php

namespace Crm\Customer\Events;

use Crm\Customer\Models\Customer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Customer $customer;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->setCustomer($customer);
    }

    // create a getter for the customer property
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    // create a setter for the customer property
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
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
