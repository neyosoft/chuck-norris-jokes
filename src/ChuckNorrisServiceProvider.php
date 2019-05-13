<?php
/**
 * Date: 11-May-19
 * Time: 11:12 PM.
 */

namespace Neyosoft\ChuckNorrisJoke;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Neyosoft\ChuckNorrisJoke\Console\ChuckNorrisJoke;
use Neyosoft\ChuckNorrisJoke\Factories\JokeFactory;
use Neyosoft\ChuckNorrisJoke\Http\Controllers\ChuckNorrisController;

class ChuckNorrisServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([ChuckNorrisJoke::class]);
        }

        $this->loadViewsFrom(__DIR__ . "/../resources/views", "chuck-norris");

        $this->publishes([
            __DIR__  . "/../resources/views" => resource_path("views/vendor/chuck-norris"),
        ]);

        Route::get("/chuck-norris", ChuckNorrisController::class);
    }

    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokeFactory();
        });
    }
}
