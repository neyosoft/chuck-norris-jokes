<?php
/**
 * Date: 13-May-19
 * Time: 11:18 AM.
 */

namespace Neyosoft\ChuckNorrisJoke\Tests;

use Neyosoft\ChuckNorrisJoke\ChuckNorrisServiceProvider;
use Neyosoft\ChuckNorrisJoke\Facades\ChuckNorris;

class RouteTest extends \Orchestra\Testbench\TestCase
{
    public function getPackageProviders($app)
    {
        return [ChuckNorrisServiceProvider::class];
    }

    public function getPackageAliases($app)
    {
        return ['ChuckNorris' => ChuckNorris::class];
    }

    /** @test */

    public function route_can_be_accessed()
    {
        ChuckNorris::shouldReceive('getRandom')
            ->once()
            ->andReturn('random post from the route');

        $this->get('/chuck-norris')
            ->assertStatus(200);
    }
}
