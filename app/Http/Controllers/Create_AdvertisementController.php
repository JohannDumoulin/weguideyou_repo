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

    	$advertisement->save();

    	return redirect()->route('advertisements');
    }
}
