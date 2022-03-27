<?php

namespace WebScientist\Postman\Collection;

use WebScientist\Postman\Concerns\Auth;

class Request
{
    use Auth;

    public array $request;

    public function __construct(public string $name, public string $method = 'GET')
    {
        $this->name = $name;
        $this->request['method'] = $method;
    }

    public function header(string $key, string $value, string $description = null): self
    {
        $this->request['header'][] = compact('key', 'value', 'description');
        return $this;
    }

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
