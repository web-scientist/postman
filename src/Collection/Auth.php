<?php

namespace WebScientist\Postman\Collection;

use JsonSerializable;

class Auth implements JsonSerializable
{
    public array $data = [];

    public string $type;

    public function basic(string $username = '', string $password = ''): self
    {
        $this->type = 'basic';

        $this->data['basic'] = [
            [
                'key' => 'username',
                'value' => $username,
                'type' => 'string'
            ],
            [
                'key' => 'password',
                'value' => $password,
                'type' => 'string'
            ]
        ];

        return $this;
    }

    public function bearer(string $token): self
    {
        $this->type = 'bearer';

        $this->data['bearer'] = [
            [
                'key' => 'token',
                'value' => $token,
                'type' => 'string'
            ]
        ];

        return $this;
    }

    public function noauth(): self
    {
        $this->type = 'noauth';
        return $this;
    }

    public function jsonSerialize()
    {
        $properties = get_object_vars($this);
        if (isset($this->data[$this->type])) {
            $properties[$this->type] = $this->data[$this->type];
        }
        unset($properties['data']);
        return $properties;
    }
}
