<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Header;

/**
 * Class HeaderTest
 * @package Tests\Unit\Collection
 */
class HeaderTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Header('key', 'value');
        $this->assertInstanceOf(Header::class, $obj);

        $this->assertIsString($obj->key);
        $this->assertIsString($obj->value);
        $this->assertEquals('key', $obj->key);
        $this->assertEquals('value', $obj->value);
    }
}
