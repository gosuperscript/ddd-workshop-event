<?php

namespace Domains\Registration;

use Domains\Registration\Exceptions\CapacityIsFull;

class Capacity
{
    public function __construct(
        public readonly string $eventId,
        public readonly int $totalCapacity,
        private int $reservedCapacity)
    {
    }

    public function reserve()
    {
        if($this->reservedCapacity >= $this->totalCapacity) {
            throw new CapacityIsFull();
        }
        $this->reservedCapacity++;
    }

    public function getReservedCapacity(): int
    {
        return $this->reservedCapacity;
    }


}
