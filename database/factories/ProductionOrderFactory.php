<?php

use Faker\Generator as Faker;

$factory->define(App\ProductionOrder::class, function (Faker $faker) {
    $invoices = App\Invoice::all()->pluck('invoice_id')->toArray();
    return [
        "invoice_id" => $faker->randomElement($invoices),
        "status" => $faker->randomElement(['Open', 'Closed', 'Pending']),
        "quantity" => $faker->numberBetween($min = 10, $max = 400)
    ];
});
