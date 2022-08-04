<?php

namespace App\Http\Livewire\Attendance;

use Domains\Attendance\Commands\EnterAttendee;
use Domains\Attendance\Enum\BounceReason;
use Domains\Attendance\Events\AttendeeIsBounced;
use Domains\Attendance\Events\AttendeeIsWelcomed;
use Domains\Event\Event;
use League\Tactician\CommandBus;
use Livewire\Component;

class CheckIn extends Component
{
    public Event $event;

    public $guestId;

    public ?string $message = null;
    public bool $error = false;

    protected $rules = [
        'guestId' => 'required|string',
    ];

    public function mount(string $event_id)
    {
        $this->event = Event::findOrFail($event_id);
    }

    public function checkIn(CommandBus $commandBus)
    {
        $this->validate();

        \Illuminate\Support\Facades\Event::listen(AttendeeIsBounced::class, function (AttendeeIsBounced $event) {
            match ($event->reason){
                BounceReason::AlreadyWelcomed => $this->message = 'You have already been welcomed.',
                BounceReason::NotRegistered => $this->message = 'You are not registered for this event.',
            };
            $this->error = true;
        });

        \Illuminate\Support\Facades\Event::listen(AttendeeIsWelcomed::class, function () {
            $this->message = "Welcome!";
        });
        $commandBus->handle(new EnterAttendee($this->event->id, $this->guestId));
    }

    public function nextCheckin()
    {
        $this->message = null;
        $this->error = false;
        unset($this->guestId);
    }

    public function render()
    {
        return view('livewire.attendance.check-in');
    }
}
