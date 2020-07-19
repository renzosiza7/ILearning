<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Error;
use Faker\Generator as Faker;

$factory->define(Error::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random(),
        'description' => $faker->text($maxNbChars = 200)
    ];
});
