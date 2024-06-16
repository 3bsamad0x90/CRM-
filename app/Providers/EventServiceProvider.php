<?php

namespace App\Providers;

use Crm\Customer\Events\CustomerCreation;
use Crm\Customer\Listeners\NotifySalesOnCustomerCreation;
use Crm\Customer\Listeners\SendWelcomeEmail;
use Crm\Project\Events\ProjectCreation;
use Crm\Project\Listeners\NotifyProjectCustomer;
use Crm\User\Events\UserCreation;
use Crm\User\Listeners\WelcomeEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        CustomerCreation::class => [
            NotifySalesOnCustomerCreation::class,
            SendWelcomeEmail::class,
        ],

        ProjectCreation::class => [
            NotifyProjectCustomer::class,
        ],

        UserCreation::class => [
            WelcomeEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
