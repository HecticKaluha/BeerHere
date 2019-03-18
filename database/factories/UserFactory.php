<?php

use Carbon\Carbon;
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
        'about' => $faker->paragraph,
        'gender' => $faker->randomElement(['M', 'F']),
        'birthdate' => $faker->dateTimeBetween('-50 years','-19 years'),
        'place' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'role_id' => 3,
        'avatar_url' => 'uploads/avatars/defaults/'. $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]) .'.jpg',
        'last_login' => $faker->dateTimeBetween(Carbon::now()->subWeeks(2), 'now'),
        'remember_token' => str_random(10),
    ];
});
