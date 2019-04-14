<?php

use Faker\Generator as Faker;

$factory->define(App\contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name ,
        'email' => $faker->companyEmail
    ];
});
