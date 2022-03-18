<?php

namespace WebScientist\Postman\Services;

use WebScientist\Postman\Collection\Collection;
use WebScientist\Postman\Environment\Environment;

class PostmanService
{
    protected Collection $collection;

    protected Environment $environment;

    public function collection(string $name): Collection
    {
        $schema = 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json';
        $this->collection = new Collection($name, $schema);
        return $this->collection;
    }

    public function environment(string $name, $exportedUsing, $variableScope = 'environment'): Environment
    {
        $this->environment = new Environment($name, $exportedUsing, $variableScope);
        return $this->environment;
    }
}
