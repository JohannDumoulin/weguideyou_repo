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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/particulier', 'HomeController@indexP')->name('homeIndividual');

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



/*Auth*/
Auth::routes();
Auth::routes(['register' => false]);

/*Register*/
Route::middleware(['guest'])->group(function () {
    Route::get('/register', 'RegisterController@index')->name('register');

    Route::namespace('register')->group(function () {
        Route::resource('particular-account','NewParController');
        Route::resource('professional-account','NewProController');
        Route::resource('nso-account','NewNsoController');
        Route::resource('so-account','NewSoController');

        Route::get('register/particular','NewParController@create');
        Route::get('register/professional','NewProController@create');
        Route::get('register/non-sport-organization','NewNsoController@create');
        Route::get('register/sport-organization','NewSoController@create');
    });
});

/*Register*/

/* Annonces */
Route::get('annonces', 'AdvertController@pageAdverts')->name('advertisements'); // affiche la page des annonces
Route::get('a/{id}', 'AdvertController@pageAdvert'); // affiche la page des annonces avec une seule annonce
Route::get('/advert/{id}', 'AdvertController@displayAllAdverts'); // affiche les annonces sur la page
Route::get('/mAdvert/{id}', 'AdvertController@displayMyAdverts'); // affiche les annonces sur la page mes annonces
Route::get('/annonce/{id}', 'AdvertController@displayDetailAdvert'); // affiche les détails d'une annonce

Route::get('getAdverts', 'AdvertController@getAdverts');
Route::get('displayAdvert', 'AdvertController@displayAdvert');
Route::get('deleteAdvert', 'AdvertController@deleteAdvert');
Route::get('sortAdverts', 'AdvertController@sortAdverts');
Route::get('filterAdverts', 'AdvertController@filterAdverts');
Route::get('getActs', 'AdvertController@getActs');
Route::get('getCities', 'AdvertController@getCities');

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
Route::get('/deposer-une-annonce', 'Create_AdvertisementController@create')->name('create_ad')->middleware('auth');
Route::post('/deposer-une-annonce', 'Create_AdvertisementController@store')->middleware('auth');

//Admin
Route::middleware(['admin'])->group(function () {
    Route::resource('admin', 'AdminController');
});

//logout
Route::get('/logout', 'LogoutController@index');
