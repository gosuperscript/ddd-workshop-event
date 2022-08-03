<?php

namespace Domains\Registration\Services;

use Domains\Registration\Repositories\EventCapacityRepository;

class CapacityService implements ReservesCapacity
{
    public function __construct(
        private EventCapacityRepository $eventCapacityRepository
    )
    {
    }

    public function reserveCapacityForEvent(string $eventId): void
    {
        $capacity = $this->eventCapacityRepository->getCapacityForEventId($eventId);
        $capacity->reserve();
        $this->eventCapacityRepository->store($eventId, $capacity);
    }
}
