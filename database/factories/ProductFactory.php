<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    #$faker->seed(777);
    return [
        "item_description" => $faker->randomElement(['Extract', 'Seedling', 'Honeybush']),
        "location" => $faker->randomElement(['Farm', 'Production', 'Store Room']),
        "quantity" => $faker->numberBetween($min = 10, $max = 400),
        "unit_cost" => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 400)
    ];
});
