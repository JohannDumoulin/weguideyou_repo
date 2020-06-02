<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/particulier', function () {
    return view('pages/homeIndividual');
});

Route::get('/parametres', function () {
    return view('pages/parameter');
});

Route::get('/annonces', function() {
	return view('pages/advertisement');
});

Route::get('/profil', function() {
	return view('pages/profil');
});




// Temporary route

