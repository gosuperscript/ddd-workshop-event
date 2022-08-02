<?php

namespace Domains\Event\Providers;

use Domains\Event\CommandHandlers\EventCommandHandler;
use Domains\Event\Commands\CreateEvent;
use Domains\Event\Commands\PublishEvent;
use Illuminate\Support\ServiceProvider;
use League\Tactician\Handler\Locator\InMemoryLocator;

class EventServiceProvider extends ServiceProvider
{
    public function register()
    {
        /** @var InMemoryLocator $locator */
        $locator = $this->app->make(InMemoryLocator::class);
        $locator->addHandler($this->app->make(EventCommandHandler::class), CreateEvent::class);
        $locator->addHandler($this->app->make(EventCommandHandler::class), PublishEvent::class);
    }
}
