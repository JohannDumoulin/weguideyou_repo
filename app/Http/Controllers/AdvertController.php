<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Route;
use View;
use Illuminate\Support\Facades\Auth;
use App\Advertisement;
use App\User;


class AdvertController extends Controller
{

	public function getAdverts(Request $request) {

		// get param url
		$parameters = [];
		$p = parse_url($_SERVER["HTTP_REFERER"]);
		if(isset($p["query"])) {
			$ps = explode("&", $p["query"]);
			foreach ($ps as $key => $value) {
				$r = explode("=", $value);
				if($r[1] != "") {
					$r[1] = str_replace("+", " ", $r[1]);
					$parameters[$r[0]] = $r[1];
				}
			}
		}

		$type = $request->type;

        if($type == "Favoris") {
			$adverts = DB::table('favorites')
				->join('advertisement', 'favorites.advert_id', '=', 'advertisement.id')
				->join('users', 'favorites.user_id', '=', 'users.id')
				->where("favorites.user_id", "=", Auth::user()->id)
				->select('advertisement.*')
				->get();
        } 
        else if($type == "Urgent") {
        	$adverts = DB::table('Advertisement')
				->where("premium_urgent_week", "=", 1)
				->select('advertisement.*')
				->get();
        }
        else if(is_numeric($type)) {
        	$adverts = DB::table('Advertisement')
				->where("id", "=", $type)
				->select('advertisement.*')
				->get();
        }
        else {
        	$adverts = DB::table('advertisement')->get();
        }

        $adverts = (array) $adverts;
		$adverts = $adverts["\x00*\x00items"];

		if(count($parameters) != 0) {
			array_push($adverts, $parameters);
		}

        return $adverts;
	}

	public function getCities() {
        $cities = DB::select('select ville_nom from villes_france_free');
		$cities = (array) $cities;
        return $cities;
	}

	public function getActs() {
        $acts = DB::select('select * from activities');
        return $acts;
	}

	public function displayDetailAdvert($id) {
        $advert = DB::select('select * from Advertisement where id ='.$id);
        $advert = $advert[0];

        // convertion format date
		$advert->date_from = date("d-m-Y", strtotime($advert->date_from));
		$advert->date_to = date("d-m-Y", strtotime($advert->date_to));

        return view('layout/annonce')->with('advert', $advert);
    }

    public function displayAllAdverts($id) {
    	$advert = DB::select('select * from Advertisement where id ='.$id);
    	$advert = $advert[0];
    	return view('components/advert')->with('advert', $advert);
    }

    public function displayMyAdverts($id) {
    	$advert = DB::select('select * from Advertisement where id ='.$id);
    	$advert = $advert[0];
    	return view('components/mAdvert')->with('advert', $advert);
    }

	public function pageAdverts() {
		$user = Auth::user();
		return view('pages/advertisement', ['user'=>$user]);
	}	

	public function pageAdvert($id) {
		$user = Auth::user();
		return view('pages/advertisement', ['user'=>$user]);
	}

	public function sortAdverts(Request $request) {
		
		$adverts = json_decode($request->adverts);

		if($request->type == "prixCroissant")
			usort($adverts, function($a, $b) {return $a->price_one_h - $b->price_one_h;});
		if($request->type == "prixDecroissant")
			usort($adverts, function($a, $b) {return $b->price_one_h - $a->price_one_h;});
		if($request->type == "plusRecent")
			usort($adverts, function($a, $b) {return strtotime($a->created_at) - strtotime($b->created_at);});
		if($request->type == "plusAncien")
			usort($adverts, function($a, $b) {return strtotime($b->created_at) - strtotime($a->created_at);});

		return $adverts;
	}

	public function deleteAdvert(Request $request) {
		DB::table('advertisement')
			->where('id', $request->id)
			->delete();

		return $request->id;
	}


	public function filterAdverts(Request $request) {

		$adverts = json_decode($request->adverts);

		if($adverts === false) // si aucun parametre passé, on récupère tous les annonces
			$adverts = DB::select('select * from Advertisement');

		$u = $request->urgent;
		if($u === "true") { // si la case est coché, on ne récupère que les annonces urgente
			$adverts = DB::select('select * from Advertisement where premium_urgent_week = 1');	
		}

		if($request->filter_on == "") {
			return $adverts;
		}


		// filters
		foreach ($request->filter_on as $key => $value) {
			if($key == "activity" || $key == "place") {
				$adverts = array_filter($adverts, function ($var) use ($value, $key){ 
				    if(stripos($var->$key, $value) !== false)
				    	return true;
				});
			}
			else if($key == "date") {
				$adverts = array_filter($adverts, function ($var) use ($value) {
				    return ($value >= $var->date_from && $value <= $var->date_to);
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

		$id = DB::table('Advertisement')->insertGetId([
	    	'type' => "Cours",
	    	'name' => "titre", 
	    	'desc' => "description", 
	    	'date_from' => $dateS, 
	    	'date_to' => $dateE, 
	    	'price_one_h' => 40,
	    	'phone_bool' => false,  
	    	'place' => "Courchevel",
	    	'duration' => "journée", 
	    	'activity' => "Ski", 
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		]);

		$this->alerte($id);
    }

    public function alerte($id) {

    	$advertisement = new Advertisement;

    	$advertisement->type = "Cours";
    	$advertisement->activity = "Ski";
    	$advertisement->place = "Val Thorens, Auvergne-Rhône-Alpes, France";

		$alertes = DB::table('alerte')
			->join('users', 'alerte.user_id', '=', 'users.id')
			->where([
				['type', '=', $advertisement->type],
				['act', '=', $advertisement->activity],
				['place', '=', $advertisement->place],
			])
			->select('users.*', 'alerte.*')
			->get();

		$users_id = [];
		foreach($alertes as $alerte) {
			array_push($users_id, $alerte->user_id);
		}

		$users = User::findMany($users_id);

		app('App\Http\Controllers\NotificationController')->alerte($users, $alertes, $id);
    }
}
