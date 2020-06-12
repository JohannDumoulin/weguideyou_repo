<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index(){
        if (Auth::check()){
            $user = Auth::user();
            return view('pages/profil', ['user'=>$user]);
        }
    }
}
