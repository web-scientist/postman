<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Query;

/**
 * Class QueryTest
 * @package Tests\Unit\Collection
 */
class QueryTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Query('key', 'value');
        $this->assertInstanceOf(Query::class, $obj);

        $this->assertIsString($obj->key);
        $this->assertIsString($obj->value);
        $this->assertEquals('key', $obj->key);
        $this->assertEquals('value', $obj->value);
    }
}
