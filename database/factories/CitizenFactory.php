<?php

use Faker\Generator as Faker;

$factory->define(App\Citizen::class, function (Faker $faker) {
    return [
        'identification_number' => $faker->unique()->word,
        'name' => $faker->word,
        'address' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'postcode' => $faker->numberBetween($min = 10000, $max = 99999),
        'city' => $faker->word,
        'state' => $faker->word,
    ];
});
