<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use WebScientist\Postman\Collection\Collection;
use WebScientist\Postman\Collection\Item;
use WebScientist\Postman\Collection\Request;
use WebScientist\Postman\Services\PostmanService;

/**
 * Class BasicExampleTest
 * @package Tests\Feature
 */
class BasicExampleTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_basic()
    {
        $postman = new PostmanService();
        $collection = $postman->collection('Test collection');
        $folder = $collection->folder('Test');

        $request = $folder->request('Create user', 'POST')
            ->url('https://reqres.in/api/users')
            ->body('json', [
                'name' => 'morpheus',
                'job' => 'leader',
            ])->noauth();

        $this->assertInstanceOf(PostmanService::class, $postman);
        $this->assertInstanceOf(Collection::class, $collection);
        $this->assertInstanceOf(Item::class, $folder);
        $this->assertInstanceOf(Request::class, $request);

        $this->assertJson(json_encode($collection->get()));
    }
}
