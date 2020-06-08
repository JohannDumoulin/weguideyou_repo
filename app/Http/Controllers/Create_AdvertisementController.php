<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class Create_AdvertisementController extends Controller
{
    public function send(Request $request) {
    	$advertisement = new Advertisement;

    	$advertisement->name = $request->input('name');
    	$advertisement->desc = $request->input('desc');
    	$advertisement->type = $request->input('type');
    	$advertisement->date_from = $request->input('date_from');
    	$advertisement->date_to = $request->input('date_to');
    	$advertisement->price_one_h = $request->input('price_one_h');
    	$advertisement->price_two_h = $request->input('price_two_h');
    	$advertisement->price_four_h = $request->input('price_four_h');
    	$advertisement->price_half_day = $request->input('price_half_day');
    	$advertisement->price_day = $request->input('price_day');
    	$advertisement->phone_bool = $request->input('phone_bool');

    	$advertisement->save();

    	return redirect()->route('advertisements');
    }
}
