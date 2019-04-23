<?php

use Faker\Generator as Faker;

$factory->define(App\Inventory::class, function (Faker $faker) {
    $products = App\Product::all()->pluck('product_id')->toArray();
    $inventory = App\Inventory::all()->pluck('product_id')->toArray();
    //$this->command->info('test_message');
    return [
        "product_id" => $faker->randomElement(array_diff($products, $inventory)),
        "quantity" => $faker->numberBetween($min = 10, $max = 400)
    ];
});
