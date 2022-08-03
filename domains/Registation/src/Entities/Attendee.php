<?php

namespace Domains\Registration\Entities;

use Domains\Registration\Services\ReservesCapacity;

class Attendee
{
    public function __construct(
        public readonly string $id,
        private ?string $name = null,
        private array $attendingEvents = [],
    )
    {
    }

    public static function newWithId(string $attendeeId)
    {
        return new self($attendeeId);
    }

    /**
     * @throws \Domains\Registration\Exceptions\CapacityIsFull
     */
    public function registerForEvent(string $eventId, ReservesCapacity $capacity)
    {
        if($this->alreadyAttendsEvent($eventId)){
            throw \Domains\Registration\Exceptions\SorryCouldNotRegisterForEvent::becauseAttendeeAlreadyAttendingThisEvent();
        }

        $capacity->reserveCapacityForEvent($eventId);

        $this->attendingEvents[$eventId] = true;
    }

    private function alreadyAttendsEvent(string $eventId): bool
    {
        return array_key_exists($eventId, $this->attendingEvents);
    }

    public static function fromPayload(array $payload): static
    {
        return new self(
            $payload['id'],
            $payload['name'],
            $payload['attendingEvents'] ?? [],
        );
    }

    public function toPayload(): array
    {
        return ['id' => $this->id, 'name' => $this->name, 'attendingEvents' => $this->attendingEvents];
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}
