<?php

namespace WebScientist\Postman\Collection;

use Ramsey\Uuid\Uuid;
use WebScientist\Postman\Concerns\Auth;

/**
 * Class Collection
 * @package WebScientist\Postman\Collection
 */
class Collection
{
    use Auth;

    /**
     * @var array
     */
    public array $info;

    /**
     * @var array
     */
    public array $item;

    /**
     * @var array
     */
    public array $event;

    /**
     * @var string|null
     */
    private ?string $description;

    /**
     * Collection constructor.
     *
     * @param string $name
     * @param string $schema
     * @param string|null $description
     */
    public function __construct(string $name, string $schema, string $description = null)
    {
        $info = [
            '_postman_id' => Uuid::uuid4()->toString(),
            'name' => $name,
            'schema' => $schema,
            'description' => $description ?: null
        ];

        $this->item = [];
        $this->info = $info;
    }

    /**
     * @param string $name
     * @return Item
     */
    public function folder(string $name): Item
    {
        return $this->item($name);
    }

    /**
     * @param string $name
     * @return Item
     */
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

    /**
     * @param string $name
     * @param string $method
     * @return Request
     */
    public function request(string $name, string $method = 'GET'): Request
    {
        $request = new Request(...func_get_args());
        $this->item[] = $request;
        return $request;
    }

    /**
     * @param string $description
     * @return $this
     */
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
