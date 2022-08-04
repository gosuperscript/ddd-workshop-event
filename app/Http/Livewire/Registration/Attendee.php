<?php

namespace App\Http\Livewire\Registration;

use Domains\Event\Event;
use Domains\Registration\Repositories\AttendeeRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Attendee extends Component
{
    private \Domains\Registration\Entities\Attendee $attendee;
    public Collection $events;
    public string $name;
    public $attendeeId;

    public function mount($attendee_id, AttendeeRepository $attendeeRepository)
    {
        // todo: read from read model instead of entity
        $this->attendee = $attendeeRepository->getById($attendee_id);
        $this->attendeeId = $attendee_id;
        $this->name = $this->attendee->getName();
        $this->events = Event::whereIn('id', $this->attendee->attendingEvents())->upcoming()->get();
    }

    public function render()
    {
        return view('livewire.registration.attendee');
    }
}
