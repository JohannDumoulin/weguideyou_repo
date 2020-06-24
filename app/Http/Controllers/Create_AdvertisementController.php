<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Advertisement;

class Create_AdvertisementController extends Controller
{
	public function create(FormBuilder $formBuilder) {
		$adForm = $formBuilder->create(\App\Forms\AdvertisementForm::class, [
	        'method' => 'POST',
	    ]);

	    return view('pages/create_advertisement', compact('adForm'));
	}

    public function store(FormBuilder $formBuilder, Request $request) {
    	$advertisement = new Advertisement;

    	$advertisement->user_id = Auth::id();

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
    	$advertisement->price_one_h = $request->input('price_one_h');
    	$advertisement->price_two_h = $request->input('price_two_h');
    	$advertisement->price_half_day = $request->input('price_half_day');
    	$advertisement->price_day = $request->input('price_day');
    	$advertisement->phone_bool = $request->input('show_phone');

    	if ($request->hasfile('img')) {
    		$images_url = [];
    		    foreach($request->file('img') as $img)
    		    {
    		        $img->store('ad_pictures', 'public');
    		        array_push($images_url, $img->store('ad_pictures', 'public'));          

    		    }
    		$advertisement->img = json_encode($images_url);
    	}
    	
    	// $advertisement->img = $request->file('img')->store('ad_pictures', 'public');


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

    	// $form = $formBuilder->create(\App\Forms\AdvertisementForm::class);
    	// 	$form->redirectIfNotValid();
    		        
    	// 	$adForm = new AdvertisementForm();
    	// 	$adForm->fill($request->only([
    	// 		'name',
    	// 		'desc',
    	// 		'type',
    	// 		'date_from',
    	// 		'date_to',
    	// 		'show_phone'
    	// 	]))->save();

    	return redirect()->route('advertisements');
    }

    
}
