<?php

namespace Domains\Registration;

use Domains\Registration\Exceptions\CapacityIsFull;

class Capacity
{
    public function __construct(
        public readonly int $totalCapacity,
        private int $reservedCapacity)
    {
    }

    /**
     * @throws CapacityIsFull
     */
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
