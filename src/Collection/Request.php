<?php

namespace WebScientist\Postman\Collection;

use WebScientist\Postman\Concerns\Auth;

/**
 * Class Request
 * @package WebScientist\Postman\Collection
 */
class Request
{
    /**
     * @var array
     */
    public array $request;

    /**
     * Request constructor.
     *
     * @param string $name
     * @param string $method
     */
    public function __construct(public string $name, public string $method = 'GET')
    {
        $this->request['method'] = $method;
    }

    /**
     * @return $this
     */
    public function noauth(): static
    {
        $this->request['auth']['type'] = 'noauth';
        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $description
     * @return $this
     */
    public function header(string $key, string $value, string $description = null): self
    {
        $this->request['header'][] = compact('key', 'value', 'description');
        return $this;
    }

    /**
     * @param string $mode
     * @param array $data
     * @return $this
     */
    public function body(string $mode, array $data): self
    {
        $this->request['body'] = (new Body())->{$mode}($data)->get();
        return $this;
    }

    public function url(string $url): self
    {
        $this->request['url'] = new Url($url, $url);
        return $this;
    }

    public function description(string $description): self
    {
        $this->request['description'] = $description;
        return $this;
    }

    public function acceptJson(): self
    {
        $this->request['header'][] = new Header('Accept', 'application/json');
        return $this;
    }
}
