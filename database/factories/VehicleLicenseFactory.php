<?php

use Faker\Generator as Faker;

$factory->define(App\VehicleLicense::class, function (Faker $faker) {
    return [
        'commencement_date' => $faker->date,
        'expiry_date' => $faker->date,
        'amount_paid' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50),
        'status' => $faker->word,
        'vehicle_id' => 1,
    ];
});
