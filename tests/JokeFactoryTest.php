<?php

namespace Neyosoft\ChuckNorrisJoke\Tests;

use Neyosoft\ChuckNorrisJoke\Factories\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    function it_returns_random_joke()
    {
        $jokes = new JokeFactory(['The first joke of the year']);

        $joke = $jokes->getRandom();

        $this->assertSame($joke, "The first joke of the year");
    }

    /** @test */
    public function get_all_jokes(){
        $some_jokes = ['Joke one', 'Second joke', 'last joke'];

        $jokes = new JokeFactory($some_jokes);

        $all_jokes = $jokes->all();

        self::assertSame($all_jokes, $some_jokes);
    }

    /** @test */
    public function joke_can_be_added(){
        $new_joke = "Some funny joke";

        $jokes = new JokeFactory();

        $jokes->add($new_joke);

        $this->assertContains($new_joke, $jokes->all());
    }
}
