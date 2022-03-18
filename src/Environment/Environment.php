<?php

namespace WebScientist\Postman\Environment;

use Ramsey\Uuid\Uuid;

class Environment
{
    public string $id;

    public array $values = [];

    public function __construct(string $name, string $exportedUsing, string $variableScope)
    {
        $this->id = (string) Uuid::uuid4();
        $this->name = $name;
        $this->postman_variable_scope = $variableScope;
        $this->_postman_exported_at = date('Y-m-d\TH:i:sp');
        $this->_postman_exported_using = $exportedUsing;
    }

    public function values(string $key, string $value, string $type = 'default', bool $enabled = true)
    {
        $this->values[] = compact('key', 'value', 'default', 'enabled');
        return $this;
    }

    public function get(): array
    {
        return get_object_vars($this);
    }
}
