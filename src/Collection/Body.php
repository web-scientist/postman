<?php

namespace WebScientist\Postman\Collection;

use JsonSerializable;

class Body implements JsonSerializable
{
    public string $mode;

    public array|string $data = [];

    public ?string $raw;

    public ?array $options;

    public function body(array $fields, string $type = 'json'): self
    {
        $this->{$type}($fields);

        return $this;
    }

    public function formdata(array $fields): self
    {
        $this->mode = 'formdata';

        foreach ($fields as $field) {
            $this->data[] = $field;
        }

        return $this;
    }

    public function json(string|array $data): self
    {
        if (is_array($data)) {
            $data = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        $this->raw($data, 'json');

        return $this;
    }

    public function raw(string $data, string $language = 'json'): self
    {
        $this->mode = 'raw';
        $this->options = [
            'raw' => [
                'language' => $language
            ]
        ];
        $this->data = $data;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        $properties = get_object_vars($this);
        $properties[$this->mode] = $this->data;
        unset($properties['data']);
        return $properties;
    }
}
