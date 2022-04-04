<?php

namespace WebScientist\Postman\Collection;

use WebScientist\Postman\Concerns\Auth as AuthConcern;
use WebScientist\Postman\Concerns\Event as EventConcern;

class Item
{
    use AuthConcern, EventConcern;

    public array $item = [];

    public function __construct(public string $name)
    {
        $this->name = $name;
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
        $item = new Item($name);
        $this->item[] = $item;
        return $item;
    }

    public function request(string $name, string $method = 'GET')
    {
        $request =  new Request(...func_get_args());
        $this->item[] = $request;
        return $request;
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
}
