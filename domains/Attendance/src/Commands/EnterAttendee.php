<?php

namespace Domains\Attendance\Commands;

class EnterAttendee
{
    public function __construct(
        public readonly string $eventId,
        public readonly string $attendeeId
    )
    {
    }
}
