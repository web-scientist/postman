<?php

namespace WebScientist\Postman\Collection;

class Event
{
    public string $listen;

    public array $script = [
        'type' => 'text/javascript'
    ];

    public function prerequest(array $exec): self
    {
        $this->listen = 'prerequest';
        $this->script['exec'] = $exec;
        return $this;
    }

    public function test(array $exec): self
    {
        $this->listen = 'test';
        $this->script['exec'] = $exec;
        return $this;
    }
}
