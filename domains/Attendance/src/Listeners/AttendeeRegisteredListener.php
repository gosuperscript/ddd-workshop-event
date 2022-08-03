<?php

namespace Domains\Attendance\Listeners;

use Domains\Attendance\Entities\Attendance;
use Domains\Attendance\Repositories\AttendanceRepository;
use Domains\Registration\Events\AttendeeRegistered;

class AttendeeRegisteredListener
{
    public function __construct(
        private AttendanceRepository $repository
    )
    {
    }

    public function handle(AttendeeRegistered $event)
    {
        $this->repository->save(new Attendance($event->eventId, $event->attendeeId));
    }
}
