<?php

namespace WebScientist\Postman\Collection;

/**
 * Class Variable
 * @package WebScientist\Postman\Collection
 */
class Variable
{
    /**
     * Variable constructor.
     *
     * @param string $key
     * @param string|null $value
     */
    public function __construct(public string $key, public ?string $value = null)
    {
        //
    }
}
