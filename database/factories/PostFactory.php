<?php
use Faker\Generator as Faker;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Post::class, function(Faker $generator) {
    return [
        'title' => $generator->sentence(),
        'body'=> $generator->text(1000)
    ];
});
