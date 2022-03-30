<?php

namespace Tests\Unit\Concerns;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Concerns\Auth;

/**
 * Class BodyTest
 * @package Tests\Unit\Concerns
 */
class AuthTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new class() {
            use Auth;
        };
        $obj->noauth();
        $this->assertIsArray($obj->auth);
    }
}
