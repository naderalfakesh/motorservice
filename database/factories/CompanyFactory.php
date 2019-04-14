<?php

use Faker\Generator as Faker;

$factory->define(App\company::class, function (Faker $faker) {
    $type=array('WEG Branch','Customer','Requesting company');
    $randkeys=array_rand($type);

    return [
        'name' => $faker->company,
        'type' => $type[$randkeys],
        'email' => $faker->companyEmail,
        'website' => $faker->domainName,
        'phone' => $faker->PhoneNumber,
        'taxAdmin' => $faker->text(5),
        'taxNumber' => $faker->text(5),

    ];
});


