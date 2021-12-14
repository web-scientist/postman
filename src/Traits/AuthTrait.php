<?php

namespace WebScientist\Postman\Traits;

use WebScientist\Postman\Collection\Auth;

trait AuthTrait
{
    public Auth $auth;

    public function auth(string $type = null)
    {
        $this->auth = new Auth($type);
    }
}
