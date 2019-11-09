<?php

use App\Models\Artwork;
use App\Models\Material;
use App\Models\Size;
use App\Models\Specification;
use Faker\Generator as Faker;

$factory->define(Specification::class, function (Faker $faker) {
    return [
        'artwork_id' => function () {
            return factory(Artwork::class)->create()->id;
        },
        'sizes_id' => function () {
            return factory(Size::class)->create()->id;
        },
        'materials_id' => function () {
            return factory(Material::class)->create()->id;
        },
        'price' => $faker->randomFloat(2, 2, 8),
        'paypal' => $faker->swiftBicNumber,
    ];
});
