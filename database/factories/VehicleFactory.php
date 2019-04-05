<?php

use Faker\Generator as Faker;

$factory->define(App\Vehicle::class, function (Faker $faker) {
    return [
        'registration_number_id' => $faker->unique()->numberBetween($min = 1000, $max = 9999),
        'engine_number' => $faker->word,
        'chassis_number' => $faker->word,
        'production_year' => $faker->year,
        'original_status' => $faker->randomElement($array = array('A', 'B', 'C', 'D', 'E', 'F', 'G')),
        'engine_capacity' => $faker->randomNumber,
        'number_of_seat' => $faker->randomDigitNotNull,
        'color' => $faker->word,
        'fuel_type' => $faker->randomElement($array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9)),
        'purpose' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'brand' => $faker->word,
        'model' => $faker->word,
        'vehicle_type' => $faker->word,
        'laden_weight' => $faker->randomNumber,
        'unladen_weight' => $faker->randomNumber,
        'kerb_weight' => $faker->randomNumber,
    ];
});
