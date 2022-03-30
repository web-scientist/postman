<?php

namespace WebScientist\Postman\Collection;

/**
 * Class Header
 * @package WebScientist\Postman\Collection
 */
class Header
{
    /**
     * @var string
     */
    public string $description;

    /**
     * @var string
     */
    public string $type;

    /**
     * Header constructor.
     *
     * @param string $key
     * @param string $value
     */
    public function __construct(public string $key, public string $value)
    {
        //
    }

    /**
     * @param string $description
     * @param string $type
     * @return $this
     */
    public function description(string $description, string $type = 'text'): self
    {
        $this->description = $description;
        $this->type = $type;
        return $this;
    }
}
