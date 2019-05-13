<?php
/**
 * Date: 13-May-19
 * Time: 11:27 AM.
 */

namespace Neyosoft\ChuckNorrisJoke\Http\Controllers;

use Neyosoft\ChuckNorrisJoke\Facades\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
        return ChuckNorris::getRandom();
    }
}
