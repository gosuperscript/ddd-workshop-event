<?php

namespace Domains\Registration\Commands;

class RegisterAttendee
{
    public function __construct(
        public readonly string $eventId,
        public readonly string $attendeeId,
        public readonly string $name
    )
    {
    }
}
