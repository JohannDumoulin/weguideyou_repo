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


Route::get('annonces', 'AdvertController@displayAdverts')->name('advertisements'); // affiche la page des annonces
Route::get('/advert/{id}', 'AdvertController@displayAdverts2'); // affiche les annonces sur la page
Route::get('/annonce/{id}', 'AdvertController@displayAdvert'); // affiche les détails d'une annonce


Route::get('/profil', function() {
	return view('pages/profil');
});

Route::get('/favoris', function() {
	return view('pages/favoris');
});

Route::get('/messagerie', function() {
	return view('pages/mailbox');
});

Route::get('/report/{id}', function($id) {
	return view('pages/report')->with('id', $id);
});
Route::post('/report', 'NotificationController@report');


/*Register*/
Route::get('register', 'RegisterController@index');

Route::resource('par-account','register\NewParController');
Route::get('register/par','register\NewParController@create');

/*Register*/


/* Advertissement */
Route::get('getAdverts', 'AdvertController@getAdverts');
Route::get('displayAdvert', 'AdvertController@displayAdvert');
Route::get('sortAdverts', 'AdvertController@sortAdverts');
Route::get('filterAdverts', 'AdvertController@filterAdverts');
Route::get('getActs', 'AdvertController@getActs');
//Route::get('getCities', 'AdvertController@getCities');

/* Favorites */
Route::get('toggleFavorite', 'FavoritesController@toggleFavorite');
Route::get('getFavorites', 'FavoritesController@getFavorites');



// Temporary route
Route::get('getnotifs', 'NotificationController@recupNotif');
Route::get('addAdvert', 'AdvertController@addAdvert');



// Create Advertisement
Route::get('/deposer-une-annonce', 'Create_AdvertisementController@create');
Route::post('/deposer-une-annonce', 'Create_AdvertisementController@store');

