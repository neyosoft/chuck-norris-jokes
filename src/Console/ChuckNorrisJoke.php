<?php

namespace Neyosoft\ChuckNorrisJoke\Console;

use Illuminate\Console\Command;
use Neyosoft\ChuckNorrisJoke\Facades\ChuckNorris;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris';

    protected $description = 'Display random funny Chuck Norris joke';

    public function handle()
    {
        $this->info(ChuckNorris::getRandom());
    }
}
