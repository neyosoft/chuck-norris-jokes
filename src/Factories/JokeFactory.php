<?php

namespace Neyosoft\ChuckNorrisJoke\Factories;

use GuzzleHttp\Client;

class JokeFactory
{
    /** @var array */
    protected $jokes;

    /** @var \GuzzleHttp\Client */
    protected $client;

    const JOKE_API = 'http://api.icndb.com/jokes/random';

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function getRandom()
    {
        $response = $this->client->get(static::JOKE_API);

        $content = json_decode($response->getBody()->getContents());

        return $content->value->joke;
    }

    public function all()
    {
        return $this->jokes;
    }

    public function add($joke)
    {
        $this->jokes[] = $joke;
    }
}
