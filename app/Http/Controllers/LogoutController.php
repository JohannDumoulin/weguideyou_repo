<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class LogoutController extends Controller
{
    public function index(){
        $name = Auth::user()->name;
        Auth::logout();
        Flashy::message('Au revoir ,  '.$name.'');
        return redirect('/');
    }
}

