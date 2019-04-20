<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    ##$faker->seed(90);
    return [
        'customer_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'billing_address' => $faker->streetAddress,
        'billing_city' => $faker->city,
        'billing_state' => $faker->state,
        'billing_zip' => $faker->postcode,
        'shipping_address' => $faker->streetAddress,
        'shipping_city' => $faker->city,
        'shipping_state' => $faker->state,
        'shipping_zip' => $faker->postcode,
        'phone' => $faker->phoneNumber
    ];
});
