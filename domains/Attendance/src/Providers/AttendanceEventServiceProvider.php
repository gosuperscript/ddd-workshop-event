<?php

namespace Domains\Attendance\Providers;

use Domains\Attendance\Listeners\AttendeeRegisteredListener;
use Domains\Registration\Events\AttendeeRegistered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class AttendanceEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        AttendeeRegistered::class => [
            AttendeeRegisteredListener::class
        ]
    ];
}
