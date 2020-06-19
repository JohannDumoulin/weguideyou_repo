<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'surname' => "surname",
        'gender' => "H",
        'birth' => date_create("1990-05-15"),
        'address' => "a",
        'city' => "Paris",
        'pc' => 00000,
        'phone' => 0606060606,
        'pic' => null,
        'status' => 'PAR',
        'status_detail' => null,
         'language' => "Francais - Anglais",
        'job' => "guide de haute montagne",
        'license' => null,
        'license_date' => null,
        'siret' => null,
        'cgu' => 0,
        'news_letter' => 0,
    ];
});
