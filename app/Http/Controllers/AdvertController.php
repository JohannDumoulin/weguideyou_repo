<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Route;
use View;


class AdvertController extends Controller
{

	public function getAdverts(Request $request) {

		if($request->type == "Annonces")
        	$adverts = DB::table('advertisement')->get();

        else if($request->type == "Favoris")
        	$adverts = DB::table('advertisement')
	            ->join('favorites', 'advertisement.id', '=', 'favorites.advert_id')
	            ->select('advertisement.*')
	            ->get();

        return $adverts;
	}

	/*public function getCities() {
        $cities = DB::select('select ville_nom from villes_france_free');
		$cities = (array) $cities;
        return $cities;
	}*/

	public function getActs() {
        $acts = DB::table('activities')->get();
		$acts = (array) $acts;
		$acts = $acts["\x00*\x00items"];
        return $acts;
	}

	public function displayAdvert($id) {
        $advert = DB::select('select * from Advertisement where id ='.$id);
        $advert = $advert[0];

        // convertion format date
		$advert->dateStart = date("d-m-Y", strtotime($advert->dateStart));
		$advert->dateEnd = date("d-m-Y", strtotime($advert->dateEnd));
		//
		$pieces = explode(", ", $advert->locations);
		$advert->firstLocation = $pieces[0];

        return view('layout/annonce')->with('advert', $advert);
    }

    public function displayAdverts2($id) {
    	$advert = DB::select('select * from Advertisement where id ='.$id);
    	$advert = $advert[0];
    	return view('components/advert')->with('advert', $advert);
    }

	public function displayAdverts() {
		$adverts = DB::table('Advertisement')->get();
		return view('pages/advertisement')->with('adverts', $adverts);
	}

	public function sortAdverts(Request $request) {
		
		$adverts = json_decode($request->adverts);

		if($request->type == "prixCroissant")
			usort($adverts, function($a, $b) {return $a->price - $b->price;});
		if($request->type == "prixDecroissant")
			usort($adverts, function($a, $b) {return $b->price - $a->price;});
		if($request->type == "plusRecent")
			usort($adverts, function($a, $b) {return strtotime($a->created_at) - strtotime($b->created_at);});
		if($request->type == "plusAncien") {
			usort($adverts, function($a, $b) {return strtotime($b->created_at) - strtotime($a->created_at);});
		}

		return $adverts;
	}


	public function filterAdverts(Request $request) {
		
		$adverts = $this->getAdverts();

		if($request->filter_on == "") {
			return $adverts;
		}

		// filters
		foreach ($request->filter_on as $key => $value) {
			if($key == "date") {
				$adverts = array_filter($adverts, function ($var) use ($value) {
				    return ($value >= $var->dateStart && $value <= $var->dateEnd);
				});
			}
			else {
				$adverts = array_filter($adverts, function ($var) use ($value, $key){
				    return ($value == $var->$key);
				});
			}
		}

		return $adverts;
	}

    
    public function addAdvert() {

			$dateS = date_create("2020-03-15");
			$dateE = date_create("2020-05-15");

			DB::table('Advertisement')->insert([
		    	'type' => "cours",
		    	'title' => "titre", 
		    	'description' => "description", 
		    	'nb_pers' => "individuel", 
		    	'profession' => "profession", 
		    	'dateStart' => $dateS, 
		    	'dateEnd' => $dateE, 
		    	'duration' => "journée", 
		    	'price' => 40,
		    	'displayNumber' => false, 
		    	'activities' => "ski, snowboard", 
		    	'locations' => "Courchevel, Val Thorens",
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			]);

    }
}
