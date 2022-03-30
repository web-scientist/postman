<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Event;

/**
 * Class EventTest
 * @package Tests\Unit\Collection
 */
class EventTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Event();
        $this->assertInstanceOf(Event::class, $obj);
    }
}
