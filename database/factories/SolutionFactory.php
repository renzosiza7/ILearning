<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Solution;
use Faker\Generator as Faker;

$factory->define(Solution::class, function (Faker $faker) {
    return [
        'error_id' => function () {
            return factory(App\Error::class)->create()->id;
        },
        'description' => $faker->text($maxNbChars = 200)
    ];
});
