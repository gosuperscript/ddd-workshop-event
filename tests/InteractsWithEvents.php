<?php

namespace Tests;

use Illuminate\Events\Dispatcher;
use Illuminate\Events\NullDispatcher;
use Illuminate\Support\Testing\Fakes\EventFake;

trait InteractsWithEvents
{
    private EventFake $dispatcher;

    public function eventDispatcher(): EventFake
    {
        if (!isset($this->dispatcher)) {
            $this->dispatcher = new EventFake(new NullDispatcher(new Dispatcher()));
        }
        return $this->dispatcher;
    }
}
