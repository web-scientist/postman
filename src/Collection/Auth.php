<?php

namespace WebScientist\Postman\Collection;

class Auth
{
    public array $data = [];

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

    public function get(): array
    {
        $properties = get_object_vars($this);
        $properties[$this->type] = $this->data[$this->type];
        unset($properties['data']);
        return $properties;
    }
}
