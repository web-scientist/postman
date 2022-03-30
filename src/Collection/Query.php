<?php

namespace WebScientist\Postman\Collection;

/**
 * Class Query
 * @package WebScientist\Postman\Collection
 */
class Query
{
    /**
     * Query constructor.
     *
     * @param string $key
     * @param string|null $value
     */
    public function __construct(public string $key, public ?string $value = null)
    {
        //
    }
}
