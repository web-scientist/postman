<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Variable;

/**
 * Class VariableTest
 * @package Tests\Unit\Collection
 */
class VariableTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new Variable('key', 'value');
        $this->assertInstanceOf(Variable::class, $obj);

        $this->assertIsString($obj->key);
        $this->assertIsString($obj->value);

        $this->assertEquals('key', $obj->key);
        $this->assertEquals('value', $obj->value);
    }
}
