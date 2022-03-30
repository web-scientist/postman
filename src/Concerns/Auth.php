<?php

namespace WebScientist\Postman\Concerns;

use WebScientist\Postman\Collection\Auth as CollectionAuth;

/**
 * Trait Auth
 * @package WebScientist\Postman\Concerns
 */
trait Auth
{
    /**
     * @var array
     */
    public array $auth;

    /**
     * @param string $type
     * @param array|string|null $data
     * @return $this
     */
    public function auth(string $type, array|string $data = null): static
    {
        $data = array($data);

        $this->auth = (new CollectionAuth())->{$type}(...$data)->get();

        return $this;
    }

    /**
     * @return $this
     */
    public function noauth(): static
    {
        $this->auth('noauth');
        return $this;
    }
}
