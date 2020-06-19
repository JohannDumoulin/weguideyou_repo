<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Advertisement;
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

$factory->define(Advertisement::class, function (Faker $faker) {

    return [
        'user_id' => 1,
        'type' => "Cours",
        'name' => "titre", 

        'desc' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus cursus fringilla. Curabitur sed neque vitae eros feugiat luctus a ut diam. Quisque malesuada orci diam, eget euismod augue tempor et. Suspendisse potenti. Donec placerat odio non est vestibulum consequat. Proin viverra lacus ut nunc dictum fermentum. Praesent tristique lorem et risus euismod, sed ornare justo convallis. Proin tellus felis, tincidunt dictum lacus at, aliquam pellentesque metus. Donec mollis, libero sed eleifend malesuada, metus risus dapibus risus, ut aliquam risus lectus ac ex. Phasellus fringilla est sed ante consequat, efficitur auctor libero ultricies. Vestibulum scelerisque convallis nibh auctor placerat. Cras eget semper tortor, sed tristique velit. Fusce ultrices dui eu turpis convallis elementum at vitae turpis.",

        'nbPers' => "Collectif",
        'date_from' => date_create("2020-03-15"), 
        'date_to' => date_create("2020-05-15"), 
        'price_one_h' => random_int (30, 500),
        'phone_bool' => false,  
        'place' => "Courchevel",
        'duration' => "Toute la journée", 
        'activity' => "Ski", 
        'premium_urgent_week' => random_int (0, 1), 
        'premium_banner_week' => random_int (0, 1), 
        'phone_bool' => random_int (0, 1), 
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
    ];
});
