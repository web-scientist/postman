<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Item;

/**
 * Class ItemTest
 * @package Tests\Unit\Collection
 */
class ItemTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Item('ItemName');
        $this->assertInstanceOf(Item::class, $obj);

        $this->assertIsString($obj->name);
        $this->assertEquals('ItemName', $obj->name);
    }
}
