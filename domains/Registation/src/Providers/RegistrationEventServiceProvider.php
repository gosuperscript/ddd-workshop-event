<?php

namespace Domains\Registration\Providers;

use Domains\Event\Events\EventPublished;
use Domains\Registration\Listeners\EventPublishedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class RegistrationEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        EventPublished::class => [
            EventPublishedListener::class
        ]
    ];
}
