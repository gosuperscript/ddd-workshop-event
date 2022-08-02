<?php

namespace Domains\Registration\Events;

class AvailableCapacityReduced
{
    public function __construct(
        public readonly string $eventId,
    )
    {
    }
}
