<?php

namespace Domains\Registration\Repositories;

use Domains\Registration\Capacity;
use Exception;
use Illuminate\Support\Facades\DB;

class EventCapacityRepository
{
    public function getCapacityForEventId(string $eventId): Capacity
    {
        $row = DB::table('event_capacity')->where('event_id', $eventId)->first();
        if (!$row) {
            throw new Exception("event with id {$eventId} not found");
        }
        return new Capacity($row->total_capacity, $row->reserved_capacity);
    }

    public function setCapacityForEvent(string $eventId, int $capacity)
    {
        DB::table('event_capacity')->updateOrInsert(['event_id' => $eventId], ['total_capacity' => $capacity, 'reserved_capacity' => 0]);
    }

    public function store(string $eventId, Capacity $capacity)
    {
        DB::table('event_capacity')
            ->updateOrInsert(['event_id' => $eventId], [
                'reserved_capacity' => $capacity->getReservedCapacity()
            ]);
    }
}
