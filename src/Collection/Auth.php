<?php

namespace WebScientist\Postman\Collection;

class Auth
{
    public ?string $type = null;

    public function __construct(string $type)
    {
        $this->type = $type;
    }
}
