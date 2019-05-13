<?php
/**
 * Date: 13-May-19
 * Time: 10:15 AM
 */

namespace Neyosoft\ChuckNorrisJoke\Tests;


use Illuminate\Support\Facades\Artisan;
use Neyosoft\ChuckNorrisJoke\ChuckNorrisServiceProvider;
use Neyosoft\ChuckNorrisJoke\Facades\ChuckNorris;
use Orchestra\Testbench\TestCase;

class ChuckNorrisCommandTest extends TestCase
{
    public function getPackageProviders($app){
        return [ChuckNorrisServiceProvider::class];
    }

    public function getPackageAliases($app){
        return ['ChuckNorris' => ChuckNorris::class];
    }

    /** @test */
    public function it_output_random_joke_into_the_console(){
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandom')
            ->once()
            ->andReturn("some unique random joke");

        $this->artisan("chuck-norris");

        $output = Artisan::output();

        $this->assertSame("some unique random joke" . PHP_EOL, $output);
    }

}