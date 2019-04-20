<?php

use Faker\Generator as Faker;

$factory->define(App\PurchaseOrder::class, function (Faker $faker) {
    $customers = App\Customer::all()->pluck('customer_id')->toArray();
    return [
        "customer_id" => $faker->randomElement($customers),
        "status" => $faker->randomElement(['Open', 'Closed', 'Pending'])
    ];
});
