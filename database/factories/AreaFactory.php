<?php

use Faker\Generator as Faker;

$factory->define(App\Area::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'name' => $faker->word,
    ];
});
