<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfileController extends Controller
{
    public function index(){
        $status = Auth::user()->status;
        if ($status === 'PAR'){
            $dateOfBirth = Auth::user()->birth;
            $years = Carbon::createFromDate($dateOfBirth)->age;
            return view('pages/profile', ['years'=>$years, 'status'=>$status]);
        }
        if ($status === 'PRO'){
            $dateOfBirth = Auth::user()->birth;
            $years = Carbon::createFromDate($dateOfBirth)->age;
            return view('pages/profile', ['years'=>$years, 'status'=>$status]);
        }
        if ($status === 'NSO'){
            return view('pages/profile', ['status'=>$status]);
        }
        if ($status === 'SO'){
            return view('pages/profile', ['status'=>$status]);
        }
    }

    /*public function update(Request $request){

        if ($validate){

            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }*/

    public function profilePublic($id) {

    	$user = DB::select('select * from users where id ='.$id);
    	$user = $user[0];

        $dateOfBirth = $user->birth;
        $years = Carbon::createFromDate($dateOfBirth)->age;

    	return view('pages/profilePublic', ['user'=>$user, "years"=> $years]);
    }
}
