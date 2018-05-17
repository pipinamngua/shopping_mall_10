<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => rand(3, 14),
        'supplier_id' => rand(1, 20),
        'slug' => " ",
        'price_out' => 100000,
        'price_in' => 100000,
        'description' => 'Good product',
        'quantity' => 20,
        'status' => 1,
        'comments' => 0,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
