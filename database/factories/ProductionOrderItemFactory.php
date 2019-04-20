<?php

use Faker\Generator as Faker;

$factory->define(App\ProductionOrderItem::class, function (Faker $faker) {
    
    $inventory = App\Inventory::all()->pluck('inventory_id')->toArray();
    $production_order = App\ProductionOrder::all()->pluck('production_order_id')->toArray();
    return [
        "production_order_id" => $faker->randomElement($production_order),
        "inventory_id" => $faker->randomElement($inventory),
        "input_quantity" => $faker->numberBetween($min = 10, $max = 400)
    ];
});
