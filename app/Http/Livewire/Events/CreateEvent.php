<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use League\Tactician\CommandBus;
use Livewire\Component;
use Ramsey\Uuid\Uuid;

class CreateEvent extends Component
{
    public $name;
    public $date;
    public $location;
    public $capacity;

    protected $rules = [
        'name' => 'required|string',
        'location' => 'required|string',
        'date' => 'required|date|date_format:d-m-Y',
        'capacity' => 'required|integer|min:1',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createEvent(CommandBus $commandBus)
    {
        $this->validate();

        $eventId = Uuid::uuid4()->toString();
        $commandBus->handle(new \Domains\Event\Commands\CreateEvent(
            $eventId,
            Auth::user()->organization_id,
            $this->name,
            $this->location,
            Carbon::parse($this->date),
            $this->capacity
        ));

        $this->redirectRoute('events.list');
    }

    public function render()
    {
        return view('livewire.events.create-event');
    }
}
