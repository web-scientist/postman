<?php

namespace WebScientist\Postman\Collection;

class Body
{
    public string $mode;

    public array $data = [];

    public function __construct(string $mode = 'formdata')
    {
        $this->mode = $mode;
    }

    public function body(array $fields): self
    {
        foreach ($fields as $field) {
            $field['type'] = 'text';
            $this->{$this->mode}($field['key'], $field['value'], $field['description']);
        }
        return $this;
    }

    public function formdata(string $key, string $value, string $description, string $type = 'text'): self
    {
        $this->data[] = compact('key', 'value', 'description', 'type');
        return $this;
    }

    public function get(): array
    {
        $properties = get_object_vars($this);
        $properties[$this->mode] = $this->data;
        unset($properties['data']);
        return $properties;
    }
}
