<?php

namespace WebScientist\Postman\Collection;

class Variable
{
    public function __construct(public string $key, public ?string $value = null)
    {
    }
}
