<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Route;
use View;
use Illuminate\Support\Facades\Auth;
use App\Advertisement;
use App\User;
use App\Language;
use App\UserLanguage;
use Kris\LaravelFormBuilder\FormBuilder;
use Lang;


class AdvertController extends Controller
{

	public function getAdverts(Request $request) {

		// get param url
		$parameters = [];
		if($request->filterUrl == true) {
			$p = parse_url($_SERVER["HTTP_REFERER"]);
			if(isset($p["query"])) {
				$ps = explode("&", $p["query"]);
				foreach ($ps as $key => $value) {
					$r = explode("=", $value);
					if($r[1] != "") {
						$r[1] = str_replace("+", " ", $r[1]);
						$r[1] = str_replace("%2C", ",", $r[1]);
						$parameters[$r[0]] = $r[1];
					}
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
        else if($type == "Mes Annonces") {
			$adverts = DB::table('advertisement')
				->join('users', 'advertisement.user_id', '=', 'users.id')
				->where("advertisement.user_id", "=", Auth::user()->id)
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

		if($request->filterUrl == true) {
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
        $advert = DB::select('select * from advertisement where id ='.$id);
        $advert = $advert[0];
        $user = DB::select('select * from users where id ='.$advert->user_id);
        $user = $user[0];

        // convertion format date
		$advert->date_from = date("d/m/Y", strtotime($advert->date_from));
		$advert->date_to = date("d/m/Y", strtotime($advert->date_to));

        // get age
        $birthDate = date("d/m/Y", strtotime($user->birth));
		$birthDate = explode("/", $birthDate);
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
		? ((date("Y") - $birthDate[2]) - 1)
		: (date("Y") - $birthDate[2]));
		$user->age = $age;

        $activeLang = UserLanguage::where('user_id', $user->id)->get();
        if ($activeLang){
            $userActiveLangs = [];
            foreach ($activeLang as $key=>$values){
                $userActiveLangs[$key] = Language::where('language_id', $values->language_id)->first();
                $userActiveLangs[$key] = $userActiveLangs[$key]->language_name;
            }
        }

		// get images
		$advert->img = json_decode($advert->img);

        return view('layout/annonce', ['advert' => $advert, 'user' => $user, 'userActiveLangs'=>$userActiveLangs ?? null]);
    }

    public function displayAdverts(Request $request) {

    	$adverts = $request->adverts;

    	$comp = 'components/advert';
    	if($request->type == "mes_annonces")
    		$comp = 'components/mAdvert';

		foreach ($adverts as $key => $advert) {
			$adverts[$key]['img'] = json_decode($adverts[$key]['img']);
		}

    	return view($comp, ['adverts' => $adverts]);
    }

    public function displayMyAdverts(Request $request) {
    	return view('components/mAdvert')->with('adverts', $request->adverts);
    }

	public function displayModifyAdvert($id) {
        $advert = DB::select('select * from advertisement where id ='.$id);
        $advert = $advert[0];

        // convertion format date
		$advert->date_from = date("d-m-Y", strtotime($advert->date_from));
		$advert->date_to = date("d-m-Y", strtotime($advert->date_to));
		$imgs = explode(", ", $advert->img);

        return view('layout/modifyAnnonce', ['advert' => $advert, 'imgs' => $imgs]);
    }

    public function saveModif(Request $request) {

    	$advert = $request->advert;

    	$advert["date_from"] = date("Y-m-d", strtotime($advert["date_from"]));
		$advert["date_to"] = date("Y-m-d", strtotime($advert["date_to"]));
	
		$affected = DB::table('advertisement')
			          ->where('id', $advert["id"])
			          ->update($advert);

    	redirect('/')->with(['message' => Lang::get('L\'annonce a bien été modifiée !')]);

    	return 1;
    }

	public function pageAdverts() {
		$user = Auth::user();
		return view('pages/advertisement', ['user'=>$user]);
	}	

	public function pageAdvertsPro() {
		$user = Auth::user();
		return view('pages/advertisementPro', ['user'=>$user]);
	}	

	public function pageAdvert($id) {
		$user = Auth::user();
		return view('pages/advertisement', ['user'=>$user]);
	}

	public function alerte($id) {

    	$advert = DB::select('select * from advertisement where id ='.$id)[0];

		$alertes = DB::table('alerte')
			->join('users', 'alerte.user_id', '=', 'users.id')
			->where([
				['type', '=', $advert->type],
				['act', '=', $advert->activity],
				['place', '=', $advert->place],
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

	public function deleteAdvert(Request $request) {
		DB::table('advertisement')
			->where('id', $request->id)
			->delete();

		redirect('/')->with(['message' => Lang::get('L\'annonce a bien été modifiée !')]);

		return $request->id;
	}

	public function pageMesAnnonces(FormBuilder $formBuilder) {
	    return view('pages/mes_annonces');
	}
}
