<?php

namespace WebScientist\Postman\Collection;

use Illuminate\Support\Arr;

class Item
{
    public string $name;

    public array $item;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->item = [];
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
        return Arr::last($this->item);
    }

    public function request(string $name, string $method = 'GET')
    {
        $this->item[] = new Request(...func_get_args());
        return Arr::last($this->item);
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
