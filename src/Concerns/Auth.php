<?php

namespace WebScientist\Postman\Concerns;

use WebScientist\Postman\Collection\Auth as CollectionAuth;

trait Auth
{
    public CollectionAuth $auth;

    public function auth(string $type, array|string $data = null)
    {
        $data = (array) $data;
        $this->auth = (new CollectionAuth())->{$type}(...$data);

        return $this;
    }

    public function noauth()
    {
        $this->auth('noauth');
        return $this;
    }
}
