<?php

namespace Domains\Event\Commands;

class PublishEvent
{
    public function __construct(
        public readonly string $eventId
    )
    {
    }
}
