<?php

namespace WebScientist\Postman\Collection;

class Variable
{
    public $key;

    public $value;

    public function __construct(string $key, string $value = null)
    {
        $this->key = $key;
        $this->value = $value;
    }
}
