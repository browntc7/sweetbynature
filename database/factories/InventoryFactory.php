<?php

use Faker\Generator as Faker;

$factory->define(App\Inventory::class, function (Faker $faker) {
    $products = App\Product::all()->pluck('product_id')->toArray();
    return [
        "product_id" => $faker->randomElement($products),
        "quantity" => $faker->numberBetween($min = 10, $max = 400)
    ];
});
