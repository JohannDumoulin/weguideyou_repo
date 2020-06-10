<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\AdvertisementForm;

class Create_AdvertisementController extends Controller
{
	public function create(FormBuilder $formBuilder) {
		$adForm = $formBuilder->create(\App\Forms\AdvertisementForm::class, [
	        'method' => 'POST',
	    ]);

	    return view('pages/create_advertisement', compact('adForm'));
	}

    public function store(FormBuilder $formBuilder, Request $request) {
    	// $advertisement->price_one_h = $request->input('price_one_h');
    	// $advertisement->price_two_h = $request->input('price_two_h');
    	// $advertisement->price_four_h = $request->input('price_four_h');
    	// $advertisement->price_half_day = $request->input('price_half_day');
    	// $advertisement->price_day = $request->input('price_day');
    	// $advertisement->premium_in_front_week = $request->input('premium_in_front_week');
    	// $advertisement->premium_in_front_month = $request->input('premium_in_front_month');
    	// $advertisement->premium_banner_week = $request->input('premium_banner_week');
    	// $advertisement->premium_banner_month = $request->input('premium_banner_month');
    	// $advertisement->premium_urgent_week = $request->input('premium_urgent_week');
    	// $advertisement->premium_urgent_month = $request->input('premium_urgent_month');
    	// $advertisement->premium_booking = $request->input('premium_booking');
    	// $advertisement->premium_securing = $request->input('premium_securing');
    	// $advertisement->premium_insurance = $request->input('premium_insurance');

    	$form = $formBuilder->create(\App\Forms\AdvertisementForm::class);
    	$form->redirectIfNotValid();
    	        
    	$adForm = new AdvertisementForm();
    	$adForm->fill($request->only([
    		'name',
    		'desc',
    		'type',
    		'date_from',
    		'date_to',
    		'show_phone'
    	]))->save();

    	return redirect()->route('advertisements');
    }

    
}
