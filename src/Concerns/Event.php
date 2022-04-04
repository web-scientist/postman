<?php

namespace WebScientist\Postman\Concerns;

use WebScientist\Postman\Collection\Event as CollectionEvent;

trait Event
{
    public array $event = [];

    public function prerequest(array $exec): self
    {
        $this->event[] = (new CollectionEvent())->prerequest($exec);
        return $this;
    }

    public function test(array $exec): self
    {
        $this->event[] = (new CollectionEvent())->test($exec);
        return $this;
    }
}
