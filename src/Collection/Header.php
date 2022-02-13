<?php

namespace WebScientist\Postman\Collection;

class Header
{
    public string $description;

    public string $type;

    public function __construct(public string $key, public string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function description(string $description, string $type = 'text'): self
    {
        $this->description = $description;
        $this->type = $type;
        return $this;
    }
}
