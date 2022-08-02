<?php

namespace Domains\Registration\Repositories;

use Domains\Registration\Capacity;
use Illuminate\Support\Facades\DB;

class EventCapacityRepository
{
    public function getCapacityForEventId(string $eventId): Capacity
    {
        $row = DB::table('event_capacity')->where('event_id', $eventId)->first();
        return new Capacity($row->event_id, $row->total_capacity, $row->reserved_capacity);
    }

    public function setCapacityForEvent(string $eventId, int $capacity)
    {
        DB::table('event_capacity')->updateOrInsert(['event_id' => $eventId], ['total_capacity' => $capacity, 'reserved_capacity' => 0]);
    }

    public function store(Capacity $capacity)
    {
        DB::table('event_capacity')
            ->updateOrInsert(['event_id' => $capacity->eventId], [
                'reserved_capacity' => $capacity->getReservedCapacity()
            ]);
    }
}
