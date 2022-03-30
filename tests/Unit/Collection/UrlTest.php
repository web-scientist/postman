<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Url;

class UrlTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_constructing()
    {
        $testurl = 'https://subdomain.host.com/folder/path?param=1&param=2';
        $urlObj = new Url($testurl);
        $urlObj->description = 'testurl';

        $this->assertInstanceOf(Url::class, $urlObj);
        $this->assertIsString($urlObj->description);
        $this->assertIsString($urlObj->protocol);
        $this->assertIsArray($urlObj->host);
        $this->assertIsArray($urlObj->path);

        $this->assertEquals('https', $urlObj->protocol);
        $this->assertEquals(['subdomain', 'host', 'com'], $urlObj->host);
        $this->assertEquals($testurl, $urlObj->raw);
    }
}
