<?php

namespace Tests\Unit\Environment;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Environment\Environment;

/**
 * Class EnvironmentTest
 * @package Tests\Unit\Environment
 */
class EnvironmentTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Environment('EnvironmentTest', 'PHPunit');
        $this->assertInstanceOf(Environment::class, $obj);
    }
}
