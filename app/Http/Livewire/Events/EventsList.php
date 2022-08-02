<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class EventsList extends Component
{
    public function render()
    {
        return view('livewire.events.events-list', [
            'events' => Event::get(),
        ]);
    }
}
