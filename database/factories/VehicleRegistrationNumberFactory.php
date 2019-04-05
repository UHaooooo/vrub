<?php

use Faker\Generator as Faker;

$factory->define(App\VehicleRegistrationNumber::class, function (Faker $faker) {
    return [
        'registration_number' => $faker->word,
        'status' => $faker->word,
        'area_id' => 1,
    ];
});
