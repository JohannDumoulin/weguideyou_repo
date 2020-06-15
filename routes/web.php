<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('pages/home');
});*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::post('/login/authenticate', 'Auth\LoginController@authenticate')->name('authenticate');

Route::get('/particulier', function () {
    return view('pages/homeIndividual');
});

Route::get('/parametres', function () {
    return view('pages/parameter');
});

Route::get('/profil', 'ProfilController@index');

Route::get('/favoris', 'FavoritesController@index');

Route::get('/messagerie', function() {
	return view('pages/mailbox');
});



/* Notifications */
Route::get('/report/{id}', function($id) {
	return view('pages/report')->with('id', $id);
});
Route::post('/report', 'NotificationController@report');

/* Alerte */
Route::get('/addAlerte', 'NotificationController@addAlerte');
Route::get('/removeAlerte', 'NotificationController@removeAlerte');
Route::get('/getAlertes', 'NotificationController@getAlertes');
Route::get('/displayAlerte', 'NotificationController@displayAlerte');



/*Register*/
Route::get('register', 'RegisterController@index');

Route::resource('particular-account','register\NewParController');
Route::resource('professional-account','register\NewParController');
/*Route::resource('particular-account','register\NewParController');
Route::resource('particular-account','register\NewParController');*/

Route::get('register/particular','register\NewParController@create');
Route::get('register/professional','register\NewProController@create');
Route::get('register/non-sport-organization','register\NewParController@create');
Route::get('register/sport-organization','register\NewParController@create');

/*Register*/

/* Annonces */
Route::get('annonces', 'AdvertController@displayAdverts')->name('advertisements'); // affiche la page des annonces
Route::get('/advert/{id}', 'AdvertController@displayAdverts2'); // affiche les annonces sur la page
Route::get('/mAdvert/{id}', 'AdvertController@displayMAdvert'); // affiche les annonces sur la page mes annonces
Route::get('/annonce/{id}', 'AdvertController@displayAdvert'); // affiche les détails d'une annonce

Route::get('getAdverts', 'AdvertController@getAdverts');
Route::get('displayAdvert', 'AdvertController@displayAdvert');
Route::get('deleteAdvert', 'AdvertController@deleteAdvert');
Route::get('sortAdverts', 'AdvertController@sortAdverts');
Route::get('filterAdverts', 'AdvertController@filterAdverts');
Route::get('getActs', 'AdvertController@getActs');
//Route::get('getCities', 'AdvertController@getCities');

Route::get('/mes_annonces', function () {
    return view('pages/mes_annonces');
});


/* Favorites */
Route::get('toggleFavorite', 'FavoritesController@toggleFavorite');
Route::get('getFavorites', 'FavoritesController@getFavorites');





// Temporary route
Route::get('getnotifs', 'NotificationController@recupNotif');
Route::get('addAdvert', 'AdvertController@addAdvert');



// Create Advertisement
Route::get('/deposer-une-annonce', 'Create_AdvertisementController@create')->name('create_ad');
Route::post('/deposer-une-annonce', 'Create_AdvertisementController@store');


//logout
Route::get('/logout', 'LogoutController@index');
