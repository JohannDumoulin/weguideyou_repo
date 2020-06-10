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


Route::get('annonces', 'AdvertController@displayAdverts')->name('advertisements');
Route::get('/annonce/{id}', 'AdvertController@displayAdvert');


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


/*Register*/
Route::get('new-account', 'RegisterController@index');

Route::get('new-account/{accountType}','RegisterController@create');

Route::resource('new-account','RegisterController');

/*Register*/


Route::post('annonce/report', 'NotificationController@report');

Route::get('getAdverts', 'AdvertController@getAdverts');
Route::get('displayAdvert', 'AdvertController@displayAdvert');
Route::get('sortAdverts', 'AdvertController@sortAdverts');
Route::get('filterAdverts', 'AdvertController@filterAdverts');
Route::get('getActs', 'AdvertController@getActs');
//Route::get('getCities', 'AdvertController@getCities');



// Temporary route
Route::get('getnotifs', 'NotificationController@recupNotif');
Route::get('addAdvert', 'AdvertController@addAdvert');



// Create Advertisement
Route::get('/deposer-une-annonce', function() {
	return view('pages/create_advertisement');
});

Route::post('/advertisement-send', 'Create_advertisementController@send')->name('advertisement-send');


