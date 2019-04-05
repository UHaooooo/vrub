<?php

use Faker\Generator as Faker;

$factory->define(App\TenderSession::class, function (Faker $faker) {
    return [
		'name'=>$faker->word,
		'start_date'=>$faker->date,
		'end_date'=>$faker->date,
		'area_id'=>1,
    ];
});
