<?php
/**
 * Date: 11-May-19
 * Time: 11:12 PM
 */

namespace Neyosoft\ChuckNorrisJoke;


use Illuminate\Support\ServiceProvider;
use Neyosoft\ChuckNorrisJoke\Factories\JokeFactory;

class ChuckNorrisServiceProvider extends ServiceProvider
{
    public function boot(){

    }

    public function register(){
        $this->app->bind('chuck-norris', function(){
            return new JokeFactory();
        });
    }
}