<?php

namespace Domains\Registration\Events;

class AttendeeNotRegistered
{
    public function __construct(
        public readonly string $eventId,
        public readonly string $attendeeId
    )
    {
    }
}
