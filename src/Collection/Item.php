<?php

namespace WebScientist\Postman\Collection;

/**
 * Class Item
 * @package WebScientist\Postman\Collection
 */
class Item
{
    /**
     * @var array
     */
    public array $item;

    /**
     * Item constructor.
     *
     * @param string $name
     */
    public function __construct(public string $name)
    {
        $this->item = [];
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
     * @param $name
     * @return mixed|null
     */
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
