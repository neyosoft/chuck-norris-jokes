<?php


namespace Neyosoft\ChuckNorrisJoke\Models;


use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $fillable = ['joke'];

    protected $table = "jokes";
}