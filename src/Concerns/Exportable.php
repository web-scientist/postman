<?php

namespace WebScientist\Postman\Concerns;

/**
 * Trait Exportable
 * @package WebScientist\Postman\Concerns
 */
trait Exportable
{
    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this);
    }

    /**
     * @param string $path
     * @return bool
     */
    public function toFile(string $path): bool
    {
        return boolval(file_put_contents($path, $this->toJson()));
    }

    /**
     * Serve file to a browser as download
     */
    public function download(): void
    {
        header('Content-disposition: attachment; filename=postman.json');
        $this->serve();
    }

    /**
     * Serve file to a browser inline
     */
    public function serve(): void
    {
        header('Content-type: application/json');
        echo $this->toJson();
    }
}