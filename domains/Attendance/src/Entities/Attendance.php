<?php

namespace Domains\Attendance\Entities;

use Domains\Attendance\Exceptions\SorryAlreadyWelcomed;

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
        if($this->welcomed){
            throw new SorryAlreadyWelcomed('Already welcomed');
        }
        $this->welcomed = true;
        return $this;
    }

    public function wasWelcomedBefore(): bool
    {
        return $this->welcomed;
    }
}
