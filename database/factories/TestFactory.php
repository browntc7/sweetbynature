<?php

use Faker\Generator as Faker;

$factory->define(App\Test::class, function (Faker $faker) {
    return [
        //
        'Value1' => $faker->sentence($nbWords = 6, $variableNbWords = true), // 'Sit vitae voluptas sint non voluptates.'
        'Value2' => $faker->randomNumber($nbDigits = NULL, $strict = false), // 79907610
        'Value3' => $faker->randomNumber($nbDigits = NULL, $strict = false), // 79907610
        'Value4' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 999999), // 48.89
    ];
});
