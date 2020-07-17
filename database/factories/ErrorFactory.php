<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Error;
use Faker\Generator as Faker;

$factory->define(Error::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'description' => $faker->text($maxNbChars = 200)
    ];
});
