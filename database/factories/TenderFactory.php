<?php

use Faker\Generator as Faker;

$factory->define(App\Tender::class, function (Faker $faker) {
    return [
        'registration_number_id' => 1,
        'tender_session_id' => 1,
        'citizen_id' => 1,
        'tender_amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50),
        'paid_amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50),
        'status' => $faker->word,
        'tender_date' => $faker->date,
        'tender_success_date' => $faker->date,
        'expiry_date' => $faker->date,
    ];
});
