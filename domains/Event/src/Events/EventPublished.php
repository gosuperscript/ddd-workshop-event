<?php

namespace Domains\Event\Events;

use App\Models\Event;
use App\PublicEvent;

class EventPublished implements PublicEvent
{
    public function __construct(
        public readonly string $eventId,
        public readonly int $capacity,
    )
    {
    }

    public static function fromEvent(Event $event): static
    {
        return new self(
            $event->id,
            $event->capacity,
        );
    }
}
