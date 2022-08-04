<?php

namespace Domains\Attendance\Events;

use Domains\Attendance\Enum\BounceReason;

class AttendeeIsBounced
{
    public function __construct(
        public readonly BounceReason $reason
    )
    {
    }
}
