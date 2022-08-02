<?php

namespace Domains\Event\CommandHandlers;

use App\Models\Event;
use Domains\Event\Commands\CreateEvent;
use Domains\Event\Commands\PublishEvent;
use Domains\Event\Events\EventPublished;
use Illuminate\Contracts\Events\Dispatcher;

class EventCommandHandler
{
    public function __construct(
    )
    {
    }

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

    public function handlePublishEvent(PublishEvent $publishEvent): void
    {
        $event = Event::findOrFail($publishEvent->eventId);
        $event->published_at = now();
        $event->save();

        event(EventPublished::fromEvent($event));
    }
}
