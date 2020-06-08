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
})->name('advertisements');

Route::get('/profil', function() {
	return view('pages/profil');
});

Route::get('/favoris', function() {
	return view('pages/favoris');
});

Route::get('/messagerie', function() {
	return view('pages/mailbox');
});

Route::get('annonce/report', function() {
	return view('pages/report');
});

Route::get('/register','RegisterController@index');





Route::post('annonce/report', 'NotificationController@report');



// Temporary route
Route::get('getnotifs', 'NotificationController@recupNotif');
Route::get('addAdvert', 'AdvertController@addAdvert');

Route::get('annonces2', 'AdvertController@displayAdverts');
Route::get('getAdverts', 'AdvertController@getAdverts');
Route::get('sortAdverts', 'AdvertController@sortAdverts');
Route::get('filterAdverts', 'AdvertController@filterAdverts');



// Create Advertisement
Route::get('/deposer-une-annonce', function() {
	return view('pages/create_advertisement');
});

Route::post('/advertisement-send', 'Create_advertisementController@send')->name('advertisement-send');


