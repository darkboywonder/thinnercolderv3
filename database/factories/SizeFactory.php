<?php

use App\Models\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    return [
        'order' => $faker->randomDigit,
        'dimension' => $faker->randomDigit . '\" x ' . $faker->randomDigit . '\"',
    ];
});
