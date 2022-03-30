<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Collection;

/**
 * Class CollectionTest
 * @package Tests\Unit\Collection
 */
class CollectionTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Collection('test','https://schema.getpostman.com/json/collection/v2.1.0/collection.json');
        $this->assertInstanceOf(Collection::class, $obj);
    }
}
