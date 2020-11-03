<?php

namespace App\Events;

use stdClass;

class BroadcastJobEvent extends Event
{
    public StdClass $job;

    /**
     * Create a new event instance.
     *
     * @param $job
     */
    public function __construct(stdClass $job)
    {
        $this->job = $job;
    }
}
