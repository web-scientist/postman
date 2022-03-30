<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Services\PostmanService;

/**
 * Class PostmanServiceTest
 * @package Tests\Unit\Services
 */
class PostmanServiceTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_constructing()
    {
        $obj = new PostmanService();
        $this->assertInstanceOf(PostmanService::class, $obj);
    }
}
