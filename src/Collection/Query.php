<?php

namespace WebScientist\Postman\Collection;

class Query
{
    public function __construct(public string $key, public ?string $value = null)
    {
        $this->key = $key;
        $this->value = $value;
    }
}
