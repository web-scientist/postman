<?php

namespace WebScientist\Postman\Services;

use WebScientist\Postman\Collection\Collection;

class PostmanService
{
    protected Collection $collection;

    public function collection(string $name): Collection
    {
        $schema = 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json';
        $this->collection = new Collection($name, $schema);
        return $this->collection;
    }
}
