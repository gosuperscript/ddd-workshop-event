<?php

namespace App\Http\Livewire\Registration;

use Domains\Event\Event;
use Domains\Registration\Commands\RegisterAttendee;
use League\Tactician\CommandBus;
use Livewire\Component;
use Ramsey\Uuid\Uuid;

class Register extends Component
{
    public Event $event;

    public $name;

    protected $rules = [
        'name' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($event_id)
    {
        $this->event = Event::findOrFail($event_id);
    }

    public function register(CommandBus $commandBus)
    {
        $this->validate();
        $attendeeId = Uuid::uuid4()->toString();
        $commandBus->handle(new RegisterAttendee($this->event->id, $attendeeId, $this->name));

        $this->redirectRoute('registration.attendee', ['attendee_id' => $attendeeId]);
    }

    public function render()
    {
        return view('livewire.registration.register');
    }
}
