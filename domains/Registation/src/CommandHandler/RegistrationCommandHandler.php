<?php

namespace Domains\Registration\CommandHandler;

use Domains\Registration\Commands\RegisterAttendee;
use Domains\Registration\Entities\Attendee;
use Domains\Registration\Events\AttendeeNotRegistered;
use Domains\Registration\Events\AttendeeRegistered;
use Domains\Registration\Events\AvailableCapacityReduced;
use Domains\Registration\Exceptions\CapacityIsFull;
use Domains\Registration\Repositories\AttendeeRepository;
use Domains\Registration\Repositories\EventCapacityRepository;
use Domains\Registration\Services\CapacityService;

class RegistrationCommandHandler
{
    public function __construct(
        private AttendeeRepository $attendeeRepository,
        private CapacityService $capacityService
    )
    {
    }

    public function handleRegisterAttendee(RegisterAttendee $command)
    {

        $attendee = $this->attendeeRepository->getById($command->attendeeId);

        $attendee->setName($command->name);
        try {
            $attendee->registerForEvent($command->eventId, $this->capacityService);
        } catch (CapacityIsFull $e) {
            event(new AttendeeNotRegistered(
                $command->eventId,
                $command->attendeeId,
            ));
        }

        $this->attendeeRepository->save($attendee);

        event(new AttendeeRegistered(
            $command->eventId,
            $command->attendeeId
        ));

        event(new AvailableCapacityReduced($command->eventId));
    }
}
