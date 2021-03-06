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

    $type = ["PAR", "PRO", "SOA", "NSOA"];
    $type = $type[array_rand($type)];

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make("123456"),
        'surname' => "surname",
        'gender' => "H",
        'birth' => date_create("1990-05-15"),
        'address' => "a",
        'city' => "Paris",
        'pc' => 00000,
        'phone' => "0606060606",
        'pic' => null,
        'status' => $type,
        'license' => null,
        'license_date' => null,
        'siret' => "123456789",
        'num_licence' => "12345678",
        'IBAN' => "1234567",
        'notif_alerte' => 0,
        'cgu' => 0,
        'news_letter' => 0,
    ];
});
