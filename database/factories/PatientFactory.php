<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date,
        'email' => $faker->safeEmail,
    ];
});
