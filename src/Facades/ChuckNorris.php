<?php

namespace Neyosoft\ChuckNorrisJoke\Facades;

use Illuminate\Support\Facades\Facade;

class ChuckNorris extends Facade{
    protected static function getFacadeAccessor(){
        return 'chuck-norris';
    }
}