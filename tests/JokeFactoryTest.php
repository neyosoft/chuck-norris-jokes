<?php

namespace Neyosoft\ChuckNorrisJoke\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use Neyosoft\ChuckNorrisJoke\Factories\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 204, "joke": "Nagasaki never had a bomb dropped on it. Chuck Norris jumped out of a plane and punched the ground", "categories": [] } }')
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandom();

        $this->assertSame($joke, "Nagasaki never had a bomb dropped on it. Chuck Norris jumped out of a plane and punched the ground");
    }

    /** @test */
    public function joke_can_be_added()
    {
        $new_joke = 'Some funny joke';

        $jokes = new JokeFactory();

        $jokes->add($new_joke);

        $this->assertContains($new_joke, $jokes->all());
    }
}
