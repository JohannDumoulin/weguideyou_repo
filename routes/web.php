<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', 'HomeController@index')->name('home');
Route::get('/particulier', 'HomeController@indexP')->name('homeIndividual');

Route::get('/particulier', function () {
    return view('pages/homeIndividual');
});


Route::get('/parametres', function () {
    return view('pages/parameter');
});

/*Profile*/
Route::resource('profile','ProfileController')->middleware('auth');
Route::get('/profil/{id}', 'ProfileController@indexPublic');


/*Favoris*/
Route::get('/favoris', 'FavoritesController@index')->middleware('auth');



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
Route::get('annoncesPro', 'AdvertController@pageAdvertsPro')->name('advertisements'); // affiche la page des annonces pro
Route::get('/adverts', 'AdvertController@displayAdverts'); // affiche les annonces sur la page
Route::get('a/{id}', 'AdvertController@pageAdvert'); // affiche la page des annonces avec une seule annonce
Route::get('/annonce/{id}', 'AdvertController@displayDetailAdvert'); // affiche les détails d'une annonce

Route::get('getAdverts', 'AdvertController@getAdverts');
Route::get('getActs', 'AdvertController@getActs');
Route::get('getCities', 'AdvertController@getCities');

Route::get('/mes_annonces', 'AdvertController@pageMesAnnonces')->middleware('auth');

Route::get('/modifyAnnonce/{id}', 'AdvertController@displayModifyAdvert'); // affiche la page de modif de l'annonce
Route::get('/saveModif', 'AdvertController@saveModif');
Route::get('deleteAdvert', 'AdvertController@deleteAdvert');


/* Parameters */
Route::get('/getInfos', 'ParametersController@getInfos');
Route::get('/changeInfosPerso', 'ParametersController@changeInfosPerso');
Route::get('/changeInfosA', 'ParametersController@changeInfosA');
Route::get('/modifPrefNotif', 'ParametersController@modifPrefNotif');
Route::get('/deleteAccount', 'ParametersController@deleteAccount');


/* Favorites */
Route::get('toggleFavorite', 'FavoritesController@toggleFavorite');
Route::get('getFavorites', 'FavoritesController@getFavorites');

/* Payment */
Route::get('/payment', function () {
    return view('pages/payment');
});
Route::post ( '/', function (Request $request) {
    \Stripe\Stripe::setApiKey ( 'sk_test_51GyBvvAmBYV0PzsGwvvm2Zl8BTxJrGS1nv32r3oLg9l31C0NhnAs0CztGvDySn560A7gUhCoQlJWwGE86ombBzK600YpXkNizm' );
    try {
        \Stripe\Charge::create ( array (
                "amount" => 300 * 100,
                "currency" => "usd",
                "source" => $request->input ( 'stripeToken' ),
                "description" => "description test payment." 
        ) );
        Session::flash ( 'success-message', 'Payement effectué avec succès !' );
        return Redirect::back ();
    } catch ( \Exception $e ) {
        Session::flash ( 'fail-message', "Erreur ! Veuillez réessayer plus tard." );
        return Redirect::back ();
    }
} );

// Mailbox
Route::get('/messagerie','ConversationsController@index')->name('conversations');
Route::get('/messagerie/{conversation}','ConversationsController@show')
	->name('conversations.show');
Route::post('/messagerie/{conversation}','ConversationsController@store');
Route::get('/nouveau-message/{user}/{ad}','ConversationsController@newMessage');
Route::post('/nouveau-message/{user}/{ad}','ConversationsController@storeNewMessage')->middleware('can:talkTo,user');


// Language
Route::get('setlocale/{locale}', function ($locale) {
  if (in_array($locale, \Config::get('app.locales'))) {
    Session::put('locale', $locale);
  }
  return redirect()->back();
});
Route::get('/getLocale','LangController@getLocale');
Route::get('/getSession','LangController@getSession');


// Create Advertisement
Route::get('/deposer-une-annonce', 'Create_AdvertisementController@create')->name('create_ad')->middleware('auth');
Route::post('/deposer-une-annonce', 'Create_AdvertisementController@store')->middleware('auth');

//Admin
Route::middleware(['admin'])->group(function () {
    Route::resource('admin', 'AdminController');
});

//logout
Route::get('/logout', 'LogoutController@index')->middleware('auth');
