<?php

use App\Models\Material;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    return [
        'order' => $faker->randomDigit,
        'type' => $faker->randomElement(['Original', 'Canvas Print', 'Paper Print', 'Metal Print']),
    ];
});
