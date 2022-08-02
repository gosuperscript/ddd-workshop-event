<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use League\Tactician\CommandBus;
use Livewire\Component;

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

//        $event = Event::create([
//            'name' => $this->name,
//            'location' => $this->location,
//            'date' => $this->date,
//            'capacity' => $this->capacity,
//        ]);
//
//        $dispatcher->dispatch(EventCreated::fromEvent($event));
        $commandBus->handle(new \Domains\Event\Commands\CreateEvent($this->name, Auth::user()->organization_id));
        // properties can be accessed like this: $this->name
        throw new \Exception('Not implemented yet');
    }

    public function render()
    {
        return view('livewire.events.create-event');
    }
}
