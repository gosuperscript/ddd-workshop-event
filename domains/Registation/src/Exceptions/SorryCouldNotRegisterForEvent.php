<?php

namespace Domains\Registration\Exceptions;

use Exception;

class SorryCouldNotRegisterForEvent extends Exception
{
    public static function becauseTheEventIsAtCapacity(CapacityIsFull $e): static
    {
        return new static('Capacity is full https://www.youtube.com/watch?v=d1x5GXMdK50', 0, $e);
    }

    public static function becauseAttendeeAlreadyAttendingThisEvent(): static
    {
        return new static('Attendee already attending this event');
    }
}
