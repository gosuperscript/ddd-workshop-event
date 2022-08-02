<?php

namespace Domains\Registration\Events;

class AttendeeRegistered
{
    public function __construct(
        public readonly string $eventId,
        public readonly string $attendeeId
    )
    {
    }
}
