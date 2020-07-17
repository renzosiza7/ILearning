<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'solution_id' => function () {
            return factory(App\Solution::class)->create()->id;
        },
        'url' => $faker->url,
        'description' => $faker->text($maxNbChars = 200)        
    ];
});
