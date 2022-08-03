<?php

namespace Domains\Registration;

use Domains\Registration\Entities\Attendee;

class Registration
{
    private array $updatedAttendees = [];

    public function __construct(
        private Capacity $capacity,
    )
    {
    }

    public static function withCapacity(Capacity $capacity): static
    {
        return new static($capacity);
    }

    /**
     * @throws Exceptions\CapacityIsFull
     */
    public function registerAttendee(Attendee $attendee)
    {
        $this->capacity->reserve();
        $this->updatedAttendees[] = $attendee;
    }
}
