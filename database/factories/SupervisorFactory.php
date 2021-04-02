<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supervisor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Supervisor::class, function (Faker $faker) {
    return [
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'usuario' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
