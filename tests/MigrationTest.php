<?php

namespace Neyosoft\ChuckNorrisJoke\Tests;

use Neyosoft\ChuckNorrisJoke\Models\Joke;
use Orchestra\Testbench\TestCase;
use Neyosoft\ChuckNorrisJoke\Facades\ChuckNorris;
use Neyosoft\ChuckNorrisJoke\ChuckNorrisServiceProvider;

class MigrationTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    public function getPackageProviders($app)
    {
        return [ChuckNorrisServiceProvider::class];
    }

    public function getPackageAliases($app)
    {
        return ['ChuckNorris' => ChuckNorris::class];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
    }

    /** @test */
    public function can_access_jokes_on_database(){
        $joke = new Joke();
        $joke->joke = "Let save this funny joke.";
        $joke->save();

        $freshJoke = Joke::find($joke->id);

        $this->assertSame($freshJoke->joke, "Let save this funny joke.");
    }
}
