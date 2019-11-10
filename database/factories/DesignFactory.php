<?php

use App\Models\Design;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Design::class, function (Faker $faker) {
    $image = $faker->imageUrl();
    return [
        'name' => $name = $faker->name,
        'client' => $faker->name,
        'type' => $faker->randomElement(['Music', 'Creative Services', 'Entertainment Services', 'Production Services']),
        'category' => $faker->randomElement(['Album Cover', 'Icon', 'Full Logo & Design', 'Event Promo', 'Marketing Promo']),
        'template' => $faker->randomElement(['portrait', 'square', 'landscape', 'custom']),
        'is_visible' => $faker->randomElement([true, false]),
        'is_featured' => $faker->randomElement([true, false]),
        'image' => $image,
        'image_thumb' => $image,
        'credit' => $faker->name,
        'color' => $faker->hexcolor,
        'slug' => Str::slug($name),
        'order' => $faker->randomDigit,
    ];
});
