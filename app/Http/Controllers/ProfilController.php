<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index(){
        if (Auth::check()){
            $Carbon=  Carbon::now();
            $dateOfBirth = Auth::user()->birth;
            $years = Carbon::createFromDate($dateOfBirth)->age;
            return view('pages/profil', ['years'=>$years]);
        }
    }
}
