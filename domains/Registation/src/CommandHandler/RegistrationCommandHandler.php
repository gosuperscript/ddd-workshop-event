<?php

namespace Domains\Registration\CommandHandler;

use Domains\Registration\Commands\RegisterAttendee;
use Domains\Registration\Events\AttendeeNotRegistered;
use Domains\Registration\Events\AttendeeRegistered;
use Domains\Registration\Events\AvailableCapacityReduced;
use Domains\Registration\Exceptions\CapacityIsFull;
use Domains\Registration\Repositories\EventCapacityRepository;

class RegistrationCommandHandler
{
    public function __construct(
        private EventCapacityRepository $eventCapacityRepository,
    )
    {
    }

    public function handleRegisterAttendee(RegisterAttendee $command)
    {
        $capacity = $this->eventCapacityRepository->getCapacityForEventId($command->eventId);

        try {
            $capacity->reserve();
        } catch (CapacityIsFull $e) {
            event(new AttendeeNotRegistered(
                $command->eventId,
                $command->attendeeId,
            ));
        }

        $this->eventCapacityRepository->store($capacity);

        event(new AttendeeRegistered(
            $command->eventId,
            $command->attendeeId
        ));

        event(new AvailableCapacityReduced($command->eventId));
    }
}
