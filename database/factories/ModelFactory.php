<?php

use App\Models\Company;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->streetAddress,
        'phone' => $faker->phoneNumber,
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'web' => $faker->url,
        'email' => $faker->email,
        'description' => $faker->paragraph,
    ];
});
