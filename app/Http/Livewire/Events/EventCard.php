<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Domains\Event\Commands\PublishEvent;
use Domains\Event\Events\EventPublished;
use League\Tactician\CommandBus;
use Livewire\Component;

class EventCard extends Component
{
    public Event $event;

    public function publish(CommandBus $commandBus)
    {
        $commandBus->handle(new PublishEvent($this->event->id));
        $this->event->refresh();
    }

    public function render()
    {
        return view('livewire.events.event-card', ['event' => $this->event]);
    }
}
