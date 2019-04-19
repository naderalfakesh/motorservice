<?php

use Faker\Generator as Faker;

$factory->define(App\contact::class, function (Faker $faker) {
    return [
        'company_id' => $faker->numberBetween(1,5),
        'name' => $faker->name ,
        'email' => $faker->companyEmail
    ];
});
