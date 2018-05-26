<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => 'Nguyen Minh Hoang',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456'), // secret
        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber,
        'role_id' => 1,
        'credit_card' => $faker->creditCardNumber,
        'points' => 0,
        'avatar' => 'unknown.png',
        'gender' => 'Male',
        'dob' => "1997-07-06",
    ];
});
