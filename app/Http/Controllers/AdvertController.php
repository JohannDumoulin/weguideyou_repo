<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdvertCourse;
use DB;


class AdvertController extends Controller
{

	public function getAdverts() {
        $adverts = DB::table('Advertisement')->get();
		$adverts = (array) $adverts;
		$adverts = $adverts["\x00*\x00items"];
        return $adverts;
	}

	public function displayAdvert(Request $request) {
        $advert = DB::select('select * from Advertisement where id ='.$request->id);
        return $advert;
	}

	public function displayAdverts() {
		$adverts = DB::table('Advertisement')->get();
		return view('pages/advertisement')->with('adverts', $adverts);
	}

	public function sortAdverts(Request $request) {
		
		$adverts = $request->adverts;
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

    
    public function addAdvert() { /*AdvertCourse $advert*/

/*
    	DB::table('AdvertCourse')->insert(
		    array(
		    	'title' => $advert->title, 
		    	'description' => $advert->description, 
		    	'type' => $advert->type, 
		    	'profession' => $advert->profession, 
		    	'dateStart' => $advert->dateStart, 
		    	'dateEnd' => $advert->dateEnd, 
		    	'duration' => $advert->duration, 
		    	'price' => $advert->price, 
		    	'displayNumber' => $advert->displayNumber, 
		    	'activities' => $advert->activities, 
		    	'locations' => $advert->locations
		    )
		);
*/

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
