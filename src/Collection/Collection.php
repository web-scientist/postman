<?php

namespace WebScientist\Postman\Collection;

use JsonSerializable;
use Ramsey\Uuid\Uuid;
use WebScientist\Postman\Concerns\Exportable;
use WebScientist\Postman\Concerns\Auth as AuthConcern;
use WebScientist\Postman\Concerns\Event as EventConcern;

class Collection implements JsonSerializable
{
    use AuthConcern, EventConcern, Exportable;

    public array $info;

    public array $item = [];

    public function __construct(string $name, string $schema, string $description = null)
    {
        $this->info = [
            '_postman_id' => Uuid::uuid4()->toString(),
            'name' => $name,
            'schema' => $schema,
            'description' => $description,
        ];
    }

    public function folder(string $name): Item
    {
        return $this->item($name);
    }

    public function item(string $name): Item
    {
        $key = array_search($name, $this->item);
        if ($key !== false) {
            return $this->item[$key];
        }
        $item = new Item($name);
        $this->item[] = $item;
        return $item;
    }

    public function request(string $name, string $method = 'GET')
    {
        $request = new Request(...func_get_args());
        $this->item[] = $request;
        return $request;
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

    public function __get($name): mixed
    {
        foreach ($this->item as $key => $item) {
            if ($item->name == $name) {
                $index = $key;
                return $this->item[$index];
            }
        }
        return null;
    }
}
