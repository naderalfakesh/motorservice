<?php

use Faker\Generator as Faker;

$factory->define(App\product::class, function (Faker $faker) {
    $type=array('Motor','VFD','Gearbox');
    $randkeys=array_rand($type);

    $spec =array(
        'Power' => $faker->text(10),
        'spec2' => $faker->text(10),
        'spec3' => $faker->text(10),
        'sn' => $faker->text(10),
        'spec4' => $faker->text(10)
    );

    $spec = json_encode($spec);

    return [
        'type' => $type[$randkeys],
        'specifics' => $spec

    ];
});
