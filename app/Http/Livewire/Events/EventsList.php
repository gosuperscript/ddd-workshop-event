<?php

namespace App\Http\Livewire\Events;

use Domains\Event\Event;
use Livewire\Component;

class EventsList extends Component
{
    public function render()
    {
        return view('livewire.events.events-list', [
            'events' => Event::query()->where('organization_id', auth()->user()->organization_id)->get(),
        ]);
    }
}
