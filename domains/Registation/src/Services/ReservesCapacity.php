<?php

namespace Domains\Registration\Services;

use Domains\Registration\Exceptions\CapacityIsFull;

interface ReservesCapacity
{
    /**
     * @throws CapacityIsFull
     */
    public function reserveCapacityForEvent(string $eventId): void;
}
