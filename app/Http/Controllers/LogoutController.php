<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;
use Lang;

class LogoutController extends Controller
{
    public function index(){
        $name = Auth::user()->name;
        Auth::logout();
        Flashy::message(Lang::get('Au revoir, ').$name);
        return redirect('/');
    }
}

