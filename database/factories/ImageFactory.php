<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'product_id' => rand(1, 20),
        'url' => "picture.png",
        'main_image' => false,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
