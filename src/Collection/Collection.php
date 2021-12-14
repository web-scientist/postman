<?php

namespace WebScientist\Postman\Collection;

use Ramsey\Uuid\Uuid;
use WebScientist\Postman\Traits\EventTrait;

class Collection
{
    public array $info;

    public array $item = [];

    public array $event;

    public function __construct(string $name, string $schema, string $description = null)
    {
        $info = [
            '_postman_id' => (string) Uuid::uuid4(),
            'name' => $name,
            'schema' => $schema,
        ];

        if ($description) {
            $info['description'] = $description;
        }

        $this->info = $info;
    }

    public function folder(string $name)
    {
        return $this->item($name);
    }

    public function item(string $name)
    {
        $key = array_search($name, $this->item);
        if ($key !== false) {
            return $this->item[$key];
        }
        $this->item[] = new Item($name);
        return end($this->item);
    }

    public function request(string $name, string $method = 'GET')
    {
        $this->item[] = new Request(...func_get_args());
        return end($this->item);
    }

    public function description(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function acceptJson()
    {
        $script = ["pm.request.headers.add({key: 'Accept', value: 'application/json'});"];
        $this->event[] = (new Event())->prerequest($script);
        return $this;
    }

    public function __get($name)
    {
        foreach ($this->item as $key => $item) {
            if ($item->name == $name) {
                $index = $key;
                return $this->item[$index];
            }
        }
        return null;
    }

    public function get(): array
    {
        return get_object_vars($this);
    }
}
