<?php

namespace Tests\Unit\Collection;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Auth;

/**
 * Class AuthTest
 * @package Tests\Unit\Collection
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
        $obj = new Auth();
        $this->assertInstanceOf(Auth::class, $obj);
        $this->assertIsArray($obj->data);

        $obj->basic('username', 'password');
        $this->assertTrue(isset($obj->data['basic']));
        $this->assertEquals([
            [
                'key' => 'username',
                'value' => 'username',
                'type' => 'string'
            ],
            [
                'key' => 'password',
                'value' => 'password',
                'type' => 'string'
            ]
        ], $obj->data['basic']);
    }

    /**
     * Test no auth
     */
    public function test_noauth()
    {
        $obj = new Auth();
        $obj->noauth();
        $this->assertEquals(['type' => 'noauth', 'noauth' => []], $obj->get());
    }
}
