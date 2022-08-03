<?php

namespace Domains\Attendance\Entities;

class Attendance
{
    public function __construct(
        public       readonly string $eventId,
        public       readonly string $attendeeId,
        private bool $welcomed = false,
    )
    {
    }

    public function welcome(): static
    {
        $this->welcomed = true;
        return $this;
    }

    public function wasWelcomedBefore(): bool
    {
        return $this->welcomed;
    }
}
