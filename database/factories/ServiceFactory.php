<?php

use Faker\Generator as Faker;

$factory->define(App\service::class, function (Faker $faker) {
    return [
        'failureDescription' => $faker->text(200) ,
        'rootCause' => $faker->text(200) ,
        'warrantyStatus' => $faker->text(10) ,
        'warrantyGENumber' => $faker->text(10) ,
        'WarrantyAcceptingDate' => NOW() ,
        'serviceAction' => $faker->text(200) ,
        'costAmount' => $faker->randomFloat(4,0,1000) ,
        'costCurrency' => $faker->text(6) ,
        'taxAmount' => $faker->numberBetween(1,100) ,
        'bankBranch' => $faker->text(10) 


    ];
});







