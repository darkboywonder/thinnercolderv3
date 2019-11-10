<?php

use App\Models\Artwork;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Artwork::class, function (Faker $faker) {
    $image = $faker->imageUrl();
    return [
        'name' => $name = $faker->name,
        'method' => 'Acrylic & Texture',
        'dimensions' => '36 x 48',
        'thickness' => '1.5"',
        'year' => $faker->year,
        'canvas_number' => $faker->randomDigit,
        'location' => $faker->city . ', ' . $faker->stateAbbr,
        'is_visible' => $faker->randomElement([true, false]),
        'is_sellable' => $faker->randomElement([true, false]),
        'template' => $faker->randomElement(['portrait', 'square', 'landscape', 'custom']),
        'image' => $image,
        'image_hi_res' => $image,
        'image_thumb' => $image,
        'color' => $faker->hexcolor,
        'slug' => Str::slug($name),
        'is_featured' => $faker->randomElement([true, false]),
    ];
});
