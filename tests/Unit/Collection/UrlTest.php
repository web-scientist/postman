<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Url;

/**
 * Class UrlTest
 * @package Tests\Unit\Collection
 */
class UrlTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $testurl = 'https://subdomain.host.com/folder/path?param=1&param=2';
        $obj = new Url($testurl);
        $obj->description = 'testurl';

        $this->assertInstanceOf(Url::class, $obj);
        $this->assertIsString($obj->description);
        $this->assertIsString($obj->protocol);
        $this->assertIsArray($obj->host);
        $this->assertIsArray($obj->path);

        $this->assertEquals('https', $obj->protocol);
        $this->assertEquals(['subdomain', 'host', 'com'], $obj->host);
        $this->assertEquals($testurl, $obj->raw);
    }
}
