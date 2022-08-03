<?php

namespace Domains\Attendance\CommandHandlers;

use App\Models\Event;
use Domains\Attendance\Commands\EnterAttendee;
use Domains\Attendance\Events\AttendeeIsBounced;
use Domains\Attendance\Events\AttendeeIsWelcomed;
use Domains\Attendance\Repositories\AttendanceRepository;
use Domains\Event\Commands\CreateEvent;
use Domains\Event\Commands\PublishEvent;
use Domains\Event\Events\EventPublished;

class AttendanceCommandHandler
{
    public function __construct(private AttendanceRepository $repository)
    {
    }

    /** @noinspection PhpUnused */
    public function handleEnterAttendee(EnterAttendee $enterAttendee): void
    {
        $attendance = $this->repository->getBy($enterAttendee->eventId, $enterAttendee->attendeeId);
        if (!$attendance) {
            \event(new AttendeeIsBounced());
            return;
        }
        $attendance->welcome();
        $this->repository->save($attendance);
        \event(new AttendeeIsWelcomed());
    }
}
