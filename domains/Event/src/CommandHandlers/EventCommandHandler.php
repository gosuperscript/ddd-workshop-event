<?php

namespace Domains\Event\CommandHandlers;

use Domains\Event\Commands\CreateEvent;
use Domains\Event\Commands\PublishEvent;
use Domains\Event\Event;
use Domains\Event\Events\EventPublished;

class EventCommandHandler
{
    public function __construct()
    {
    }

    /** @noinspection PhpUnused */
    public function handleCreateEvent(CreateEvent $createEvent): void
    {
        Event::create([
            'id' => $createEvent->eventId,
            'name' => $createEvent->eventName,
            'organization_id' => $createEvent->organizationId,
            'location' => $createEvent->location,
            'date' => $createEvent->date,
            'capacity' => $createEvent->capacity,
        ]);
    }

    /** @noinspection PhpUnused */
    public function handlePublishEvent(PublishEvent $publishEvent): void
    {
        $event = Event::findOrFail($publishEvent->eventId);
        $event->published_at = now();
        $event->save();

        event(EventPublished::fromEvent($event));
    }
}
