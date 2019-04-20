<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    $purchase_order = App\PurchaseOrder::all()->pluck('purchase_order_id')->toArray();
    return [
        "purchase_order_id" => $faker->randomElement($purchase_order),
        "status" => $faker->randomElement(['Open', 'Closed', 'Pending'])
    ];
});
