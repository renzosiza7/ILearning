<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Error;
use App\Solution;
use Faker\Generator as Faker;

$factory->define(Solution::class, function (Faker $faker) {
    return [
        'error_id' => Error::all()->random(),
        'description' => $faker->text($maxNbChars = 200)
    ];
});
