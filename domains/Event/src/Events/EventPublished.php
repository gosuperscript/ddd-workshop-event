<?php

namespace Domains\Event\Events;

use App\PublicEvent;
use Domains\Event\Event;

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
            eventId: $event->id,
            capacity: $event->capacity,
        );
    }
}
