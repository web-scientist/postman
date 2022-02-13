<?php

namespace WebScientist\Postman\Collection;

class Url
{
    public string $protocol;

    public array $host;

    public array $path;

    public array $variable;

    public string $port;

    public array $query;

    public string $description;

    public function __construct(public string $raw)
    {
        $this->raw = $raw;
        $this->transform($raw);
    }

    public function query(string $key, string $value = null): self
    {
        $this->query[] = new Query($key, $value);
        return $this;
    }

    public function transform(string $raw): void
    {
        $position = strpos($raw, '://');

        if ($position !== false) {
            $url = substr($raw, $position + 3);

            $rev = substr(strrev($raw), - ($position + 3));
            $protocol = strrev($rev);
            $this->protocol = str_replace('://', '', $protocol);

            $domain = explode('/', $url)[0];

            $subDomains = explode('.', $domain);

            foreach ($subDomains as  $subDomain) {
                $this->host[] = $subDomain;
            }

            $url = str_replace($domain . '/', '', $url);
        } else {
            $url = $raw;
            $this->raw = "{{base_url}}/{$raw}";
            $this->host[] = "{{base_url}}";
        }


        $this->path = explode('/', $url);

        foreach ($this->path as &$path) {

            if (strpos($path, '{') !== false) {
                $path = rtrim($path, "}");
                $path = ltrim($path, "{");
                $this->variable[] = new Variable($path);
                $path = ":{$path}";
            }
        }
    }
}
