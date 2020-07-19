<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Solution;
use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'solution_id' => Solution::all()->random(),
        'url' => $faker->url,
        'description' => $faker->text($maxNbChars = 200)        
    ];
});
