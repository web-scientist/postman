<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Request;

/**
 * Class RequestTest
 * @package Tests\Unit\Collection
 */
class RequestTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Request('RequestName', 'PUT');
        $this->assertInstanceOf(Request::class, $obj);

        $this->assertIsString($obj->name);
        $this->assertIsString($obj->method);

        $this->assertEquals('RequestName', $obj->name);
        $this->assertEquals('PUT', $obj->method);
    }
}