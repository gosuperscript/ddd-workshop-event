<?php

namespace Domains\Registration\Providers;

use Domains\Registration\CommandHandler\RegistrationCommandHandler;
use Domains\Registration\Commands\RegisterAttendee;
use Illuminate\Support\ServiceProvider;
use League\Tactician\Handler\Locator\InMemoryLocator;

class RegistrationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RegistrationEventServiceProvider::class);


        /** @var InMemoryLocator $locator */
        $locator = $this->app->make(InMemoryLocator::class);
        $locator->addHandler($this->app->make(RegistrationCommandHandler::class), RegisterAttendee::class);


    }
}
