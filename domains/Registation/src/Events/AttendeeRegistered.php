<?php

namespace Domains\Registration\Events;

use App\PublicEvent;

class AttendeeRegistered implements PublicEvent
{
    public function __construct(
        public readonly string $eventId,
        public readonly string $attendeeId,
        public readonly string $name,
    )
    {
    }
}
