<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfilController extends Controller
{
    public function index(){
        if (Auth::check()){
            $dateOfBirth = Auth::user()->birth;
            $years = Carbon::createFromDate($dateOfBirth)->age;
            return view('pages/profil', ['years'=>$years]);
        }
    }

    public function profilPublic($id) {

    	$user = DB::select('select * from users where id ='.$id);
    	$user = $user[0];

	    $Carbon=  Carbon::now();
        $dateOfBirth = $user->birth;
        $years = Carbon::createFromDate($dateOfBirth)->age;

    	return view('pages/profilPublic', ['user'=>$user, "years"=> $years]);
    }
}
