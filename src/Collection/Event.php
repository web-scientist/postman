<?php

namespace WebScientist\Postman\Collection;

/**
 * Class Event
 * @package WebScientist\Postman\Collection
 */
class Event
{
    /**
     * @var string
     */
    public string $listen;

    /**
     * @var string[]
     */
    public array $script = [
        'type' => 'text/javascript'
    ];

    /**
     * @param array $exec
     * @return $this
     */
    public function prerequest(array $exec): self
    {
        $this->listen = 'prerequest';
        $this->script['exec'] = $exec;
        return $this;
    }

    /**
     * @param array $exec
     * @return $this
     */
    public function test(array $exec): self
    {
        $this->listen = 'test';
        $this->script['exec'] = $exec;
        return $this;
    }
}
