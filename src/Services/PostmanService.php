<?php

namespace WebScientist\Postman\Services;

use WebScientist\Postman\Collection\Collection;
use WebScientist\Postman\Environment\Environment;

/**
 * Class PostmanService
 * @package WebScientist\Postman\Services
 */
class PostmanService
{
    /**
     * @var Collection
     */
    protected Collection $collection;

    /**
     * @var Environment
     */
    protected Environment $environment;

    /**
     * @param string $name
     * @return Collection
     */
    public function collection(string $name): Collection
    {
        $schema = 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json';
        $this->collection = new Collection($name, $schema);
        return $this->collection;
    }

    /**
     * @param string $name
     * @param string $exportedUsing
     * @param string $variableScope
     * @return Environment
     */
    public function environment(string $name, string $exportedUsing, string $variableScope = 'environment'): Environment
    {
        $this->environment = new Environment($name, $exportedUsing, $variableScope);
        return $this->environment;
    }
}
