<?php

namespace Domains\Registration\Listeners;

use Domains\Event\Events\EventPublished;
use Domains\Registration\Repositories\EventCapacityRepository;

class EventPublishedListener
{
    public function __construct(
        private EventCapacityRepository $eventCapacityRepository
    )
    {
    }

    public function handle(EventPublished $event)
    {
        $this->eventCapacityRepository->setCapacityForEvent($event->eventId, $event->capacity);
    }
}
