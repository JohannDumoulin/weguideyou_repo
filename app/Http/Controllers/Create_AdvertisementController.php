<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Advertisement;
use App\UserLanguage;
use DB;
use Lang;

class Create_AdvertisementController extends Controller
{
	public function create(FormBuilder $formBuilder) {
		$adForm = $formBuilder->create(\App\Forms\AdvertisementForm::class, [
	        'method' => 'POST',
	    ]);

	    return view('pages/create_advertisement', compact('adForm'));
	}

    public function store(FormBuilder $formBuilder, Request $request) {

        $user_language = DB::table('user_languages')
                            ->join('languages', 'user_languages.language_id', '=', 'languages.language_id')
                            ->select('languages.language_name')
                            ->where("user_languages.user_id", "=", Auth::id())
                            ->get();

        $l = "";
        foreach ($user_language as $value) {
            $l .= $value->language_name.", ";
        }

    	$advertisement = new Advertisement;

    	$advertisement->user_id = Auth::id();
        $advertisement->user_status = Auth::user()->status;
        $advertisement->user_name = Auth::user()->name;
        $advertisement->user_language = $l;

    	$advertisement->name = $request->input('name');
    	$advertisement->desc = $request->input('desc');
    	$advertisement->type = $request->input('type');
        $advertisement->nbPers = $request->input('nbPers');
        $advertisement->duration = $request->input('duration');
        $advertisement->activity = $request->input('activity');
    	$advertisement->place = $request->input('place');
        $advertisement->place_lat = $request->input('place_lat');
        $advertisement->place_lng = $request->input('place_lng');
    	$advertisement->date_from = $request->input('date_from');
    	$advertisement->date_to = $request->input('date_to');
        $advertisement->job = $request->input('job');
        $advertisement->sexe = $request->input('sexe');
        $advertisement->premium_urgent_week = $request->input('urgent');
        $advertisement->salaire = $request->input('salaire');
        $advertisement->loge = $request->input('loge');
    	$advertisement->price_one_h = $request->input('price_one_h');
    	// $advertisement->price_two_h = $request->input('price_two_h');
    	// $advertisement->price_half_day = $request->input('price_half_day');
    	// $advertisement->price_day = $request->input('price_day');
        if($request->input('show_phone') == "on")
            $phone = true;
        else
            $phone = false;
    	$advertisement->phone_bool = $phone;

    	if ($request->hasfile('img')) {
    		$images_url = [];

            if(count($request->file('img')) > 5) {
                session()->flash('msg', Lang::get('Vous ne pouvez télécharger qu\'un maximum de 5 fichiers'));
                return back();
            }

		    foreach($request->file('img') as $img)
		    {
		        $img->store('ad_pictures', 'public');
		        array_push($images_url, $img->store('ad_pictures', 'public'));          

		    }
    		$advertisement->img = json_encode($images_url);
    	}
    	
    	// $advertisement->premium_in_front_week = $request->input('premium_in_front_week');
    	// $advertisement->premium_in_front_month = $request->input('premium_in_front_month');
    	// $advertisement->premium_banner_week = $request->input('premium_banner_week');
    	// $advertisement->premium_banner_month = $request->input('premium_banner_month');
    	// $advertisement->premium_urgent_week = $request->input('premium_urgent_week');
    	// $advertisement->premium_urgent_month = $request->input('premium_urgent_month');
    	// $advertisement->premium_booking = $request->input('premium_booking');
    	// $advertisement->premium_securing = $request->input('premium_securing');
    	// $advertisement->premium_insurance = $request->input('premium_insurance');

    	$advertisement->save();

        // Alertes
        app('App\Http\Controllers\AdvertController')->alerte($advertisement->id);

    	return redirect('/deposer-une-annonce')->with(['message' => Lang::get('L\'annonce a bien été postée !')]);
    }

    
}
