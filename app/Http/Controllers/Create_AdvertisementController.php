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
    	$advertisement->premium_in_front_week = $request->input('premium_in_front_week');
    	$advertisement->premium_in_front_month = $request->input('premium_in_front_month');
    	$advertisement->premium_banner_week = $request->input('premium_banner_week');
    	$advertisement->premium_banner_month = $request->input('premium_banner_month');
    	$advertisement->premium_urgent_week = $request->input('premium_urgent_week');
    	$advertisement->premium_urgent_month = $request->input('premium_urgent_month');
    	$advertisement->premium_booking = $request->input('premium_booking');
    	$advertisement->premium_securing = $request->input('premium_securing');
    	$advertisement->premium_insurance = $request->input('premium_insurance');

    	$advertisement->save();

    	return redirect()->route('advertisements');
    }
}
