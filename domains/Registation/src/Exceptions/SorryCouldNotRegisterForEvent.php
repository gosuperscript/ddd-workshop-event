<?php

namespace Domains\Registration\Exceptions;

class SorryCouldNotRegisterForEvent extends \Exception
{

    public static function becauseAttendeeAlreadyAttendingThisEvent(): static
    {
        return new static('Attendee already attending this event');
    }
}
