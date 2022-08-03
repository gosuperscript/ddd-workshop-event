<?php

namespace Domains\Registration\Repositories;

use Domains\Registration\Capacity;
use Domains\Registration\Entities\Attendee;
use Illuminate\Support\Facades\DB;

class AttendeeRepository
{
    public function getById(string $attendeeId): Attendee
    {
        $row = DB::table('attendees')->where('id', $attendeeId)->first();
        if($row){
            return Attendee::fromPayload(json_decode($row->payload, true));
        }
        return Attendee::newWithId($attendeeId);
    }

    public function save(Attendee $attendee): void
    {
        DB::table('attendees')->updateOrInsert(
            ['id' => $attendee->id],
            ['payload' => json_encode($attendee->toPayload())]
        );
    }
}
