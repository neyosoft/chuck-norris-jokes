<?php

namespace Neyosoft\ChuckNorrisJoke\Factories;

class JokeFactory
{
    /** @var array */
    protected $jokes;

    public function __construct(array $jokes = null){
        if(is_null($jokes)){
            $this->jokes = [
                'Chuck Norris counted to infinity. Twice.',
                "Chuck Norris is the reason Waldo is hiding.",
                "Chuck Norris is the only person that can punch a cyclops between the eye."
            ];
        }else{
            $this->jokes = $jokes;
        }
    }

    public function getRandom()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
    
    public function all(){
        return $this->jokes;
    }

    public function add($joke){
        $this->jokes[] = $joke;
    }
}
