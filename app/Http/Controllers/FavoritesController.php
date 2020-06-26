<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoritesController extends Controller
{

	public function index(){
        if (Auth::check()){
            $user = Auth::user();
            return view('pages/favoris', ['user'=>$user]);
        }
    }

	public function getFavorites() {

		$favorites = "";

		if(Auth::user()) {
			$favorites = DB::table('favorites')
				->join('advertisement', 'favorites.advert_id', '=', 'advertisement.id')
				->join('users', 'favorites.user_id', '=', 'users.id')
				->where("favorites.user_id", "=", Auth::user()->id)
				->select('advertisement.*')
				->get();
		} 

        return $favorites;
	}

	public function toggleFavorite(Request $request) {

		if($request->type == "true") {
			DB::table('favorites')->insert([
		    	'user_id' => Auth::user()->id,
		    	'advert_id' => $request->id, 
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			]);
		} else {
			DB::table('favorites')
				->where('advert_id', $request->id)
				->delete();
		}

        return $request->id;
	}

}
