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

		$favorites = DB::table('advertisement')
			->join('favorites', 'advertisement.id', '=', 'favorites.advert_id')
			->select('advertisement.*')
			->get();

        return $favorites;
	}

	public function toggleFavorite(Request $request) {

		if($request->type == "true") {
			DB::table('favorites')->insert([
		    	'user_id' => 1,
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
