<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class EventCard extends Component
{
    public Event $event;

    public function render()
    {
        return view('livewire.events.event-card', ['event' => $this->event]);
    }
}
