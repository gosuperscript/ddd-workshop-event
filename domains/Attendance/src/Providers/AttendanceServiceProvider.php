<?php

namespace Domains\Attendance\Providers;

use Domains\Attendance\CommandHandlers\AttendanceCommandHandler;
use Domains\Attendance\Commands\EnterAttendee;
use Illuminate\Support\ServiceProvider;
use League\Tactician\Handler\Locator\InMemoryLocator;

class AttendanceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(AttendanceEventServiceProvider::class);

        /** @var InMemoryLocator $locator */
        $locator = $this->app->make(InMemoryLocator::class);
        $locator->addHandler($this->app->make(AttendanceCommandHandler::class), EnterAttendee::class);
    }
}
