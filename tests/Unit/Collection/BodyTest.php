<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Body;

/**
 * Class BodyTest
 * @package Tests\Unit\Collection
 */
class BodyTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Body();
        $this->assertInstanceOf(Body::class, $obj);
    }
}
