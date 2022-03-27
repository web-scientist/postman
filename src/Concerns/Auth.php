<?php

namespace WebScientist\Postman\Concerns;

use WebScientist\Postman\Collection\Auth as CollectionAuth;

trait Auth
{
    public array $auth;

    public function auth(string $type, array|string $data)
    {
        $data = array($data);

        $this->auth = (new CollectionAuth())->{$type}(...$data)->get();

        return $this;
    }
}
