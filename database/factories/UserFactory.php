<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\roomType::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'nightRate' => mt_rand(1, 16),
        'capacity' => mt_rand(1, 16),
        'childrenAllowed' => mt_rand(1, 16), // secret
        'maxAdult' => mt_rand(1, 16), // secret
        'description' => str_random(100),
        'cover_image' => "Standard-room_1543751302_1544336791_1545080241.jpg",
    ];
});
