<?php

namespace WebScientist\Postman\Collection;

/**
 * Class Auth
 * @package WebScientist\Postman\Collection
 */
class Auth
{
    /**
     * @var array
     */
    public array $data = [];

    /**
     * @var string
     */
    private string $type;

    /**
     * @param string $username
     * @param string $password
     * @return $this
     */
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

    /**
     * @param string $token
     * @return $this
     */
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

    /**
     * @return $this
     */
    public function noauth(): self
    {
        $this->type = 'noauth';
        return $this;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return ['type' => $this->type, $this->type => $this->data[$this->type] ?? []];
    }
}
