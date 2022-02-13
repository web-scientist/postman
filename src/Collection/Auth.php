<?php

namespace WebScientist\Postman\Collection;

class Auth
{
    public function __construct(public ?string $type = null)
    {
        $this->type = $type;
    }
}
