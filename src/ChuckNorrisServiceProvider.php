<?php
/**
 * Date: 11-May-19
 * Time: 11:12 PM.
 */

namespace Neyosoft\ChuckNorrisJoke;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Neyosoft\ChuckNorrisJoke\Factories\JokeFactory;
use Neyosoft\ChuckNorrisJoke\Console\ChuckNorrisJoke;
use Neyosoft\ChuckNorrisJoke\Http\Controllers\ChuckNorrisController;

class ChuckNorrisServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([ChuckNorrisJoke::class]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chuck-norris');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/chuck-norris'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../config/chuck-norris.php' => config_path('chuck-norris.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        Route::get(config('chuck-norris.route'), ChuckNorrisController::class);
    }

    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokeFactory();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/chuck-norris.php', 'chuck-norris');
    }
}
