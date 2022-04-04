<?php

namespace WebScientist\Postman\Concerns;

trait Exportable
{
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function toJson(int $flags): string
    {
        return json_encode($this->toArray(), $flags);
    }
}
