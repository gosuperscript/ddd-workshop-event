<?php

namespace Domains\Attendance\Repositories;

use Domains\Attendance\Entities\Attendance;
use Illuminate\Support\Facades\DB;

class AttendanceRepository
{
    public function getBy(string $eventId, string $attendeeId): ?Attendance
    {
        $row = DB::table('attendance')
            ->where('event_id', $eventId)
            ->where('attendee_id', $attendeeId)->first();
        return $row
            ? new Attendance($eventId, $attendeeId, $row->welcomed)
            : null;
    }

    public function save(Attendance $attendance): void
    {
        DB::table('attendance')->updateOrInsert(
            [
                'event_id' => $attendance->eventId,
                'attendee_id' => $attendance->attendeeId
            ],
            ['welcomed' => $attendance->wasWelcomedBefore()]
        );
    }
}
