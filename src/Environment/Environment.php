<?php

namespace WebScientist\Postman\Environment;

use Ramsey\Uuid\Uuid;

/**
 * Class Environment
 * @package WebScientist\Postman\Environment
 */
class Environment
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var array
     */
    public array $values = [];

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $postman_variable_scope;

    /**
     * @var string
     */
    private string $_postman_exported_at;

    /**
     * @var string
     */
    private string $_postman_exported_using;

    /**
     * Environment constructor.
     *
     * @param string $name
     * @param string $exportedUsing
     * @param string $variableScope
     */
    public function __construct(string $name, string $exportedUsing, string $variableScope = 'environment')
    {
        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->postman_variable_scope = $variableScope;
        $this->_postman_exported_at = date('Y-m-d\TH:i:sp');
        $this->_postman_exported_using = $exportedUsing;
    }

    /**
     * @param string $key
     * @param string $value
     * @param string $type
     * @param bool $enabled
     * @return $this
     */
    public function value(string $key, string $value = '', string $type = 'default', bool $enabled = true): static
    {
        $this->values[] = compact('key', 'value', 'type', 'enabled');
        return $this;
    }

    /**
     * @param array $values
     * @return $this
     */
    public function values(array $values): static
    {
        foreach ($values as $value) {
            $this->value(...$value);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return get_object_vars($this);
    }
}
