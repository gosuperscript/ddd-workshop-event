<?php

namespace Domains\Event\Commands;

use Carbon\Carbon;

class CreateEvent
{
    public function __construct(
        public readonly string $eventId,
        public readonly string $organizationId,
        public readonly string $eventName,
        public readonly string $location,
        public readonly Carbon $date,
        public readonly int $capacity = 0,
    )
    {
    }
}
