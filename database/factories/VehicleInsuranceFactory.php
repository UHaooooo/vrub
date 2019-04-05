<?php

use Faker\Generator as Faker;

$factory->define(App\VehicleInsurance::class, function (Faker $faker) {
    return [
        'commencement_date' => $faker->date,
        'expiry_date' => $faker->date,
        'status' => $faker->word,
        'vehicle_id' => 1,
    ];
});
