<?php

namespace WebScientist\Postman\Collection;

/**
 * Class Url
 * @package WebScientist\Postman\Collection
 */
class Url
{
    /**
     * @var string
     */
    public string $protocol;

    /**
     * @var array
     */
    public array $host;

    /**
     * @var array
     */
    public array $path;

    /**
     * @var array
     */
    public array $variable;

    /**
     * @var string
     */
    public string $port;

    /**
     * @var array
     */
    public array $query;

    /**
     * @var string
     */
    public string $description;

    /**
     * Url constructor.
     *
     * @param string $raw
     */
    public function __construct(public string $raw)
    {
        $this->transform($raw);
    }

    /**
     * @param string $key
     * @param string|null $value
     * @return $this
     */
    public function query(string $key, string $value = null): self
    {
        $this->query[] = new Query($key, $value);
        return $this;
    }

    /**
     * @param string $raw
     */
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
            $this->raw = "{{BASE_URL}}/{$raw}";
            $this->host[] = "{{BASE_URL}}";
        }


        $this->path = explode('/', $url);

        foreach ($this->path as &$path) {

            if (str_contains($path, '{')) {
                $path = rtrim($path, "}");
                $path = ltrim($path, "{");
                $this->variable[] = new Variable($path);
                $path = ":{$path}";
            }
        }
    }
}
