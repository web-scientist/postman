<?php

namespace WebScientist\Postman\Collection;

/**
 * Class Body
 * @package WebScientist\Postman\Collection
 */
class Body
{
    /**
     * @var string
     */
    public string $mode;

    /**
     * @var array|string
     */
    public array|string $data = [];

    /**
     * @var string|null
     */
    public ?string $raw;

    /**
     * @var array|null
     */
    public ?array $options;

    /**
     * @param array $fields
     * @param string $type
     * @return $this
     */
    public function body(array $fields, string $type = 'json'): self
    {
        $this->{$type}($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function formdata(array $fields): self
    {
        $this->mode = 'formdata';

        foreach ($fields as $field) {
            $this->data[] = $field;
        }

        return $this;
    }

    /**
     * @param string|array $data
     * @return $this
     */
    public function json(string|array $data): self
    {
        if (is_array($data)) {
            $data = json_encode($data, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $this->raw($data, 'json');

        return $this;
    }

    /**
     * @param string $data
     * @param string $language
     * @return $this
     */
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

    /**
     * @return array
     */
    public function get(): array
    {
        $properties = get_object_vars($this);
        $properties[$this->mode] = $this->data;
        unset($properties['data']);
        return $properties;
    }
}
