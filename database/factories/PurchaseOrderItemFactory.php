<?php

use Faker\Generator as Faker;

$factory->define(App\PurchaseOrderItem::class, function (Faker $faker) {
    
    $inventory = App\Inventory::all()->pluck('inventory_id')->toArray();
    $purchase_order = App\PurchaseOrder::all()->pluck('purchase_order_id')->toArray();
    return [
        "purchase_order_id" => $faker->randomElement($purchase_order),
        "inventory_id" => $faker->randomElement($inventory),
        "qty" => $faker->numberBetween($min = 10, $max = 400)
    ];
});
