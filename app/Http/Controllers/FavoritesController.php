<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;


class FavoritesController extends Controller
{

	public function getFavorites() {
        $favorites = DB::table('favorites')->get();

		$adverts = array();

		foreach($favorites as $key=>$value) {
			$f = DB::select('select * from Advertisement where id ='.$value->advert_id)[0];
			$adverts[] = $f;
		}

        return $adverts;
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
