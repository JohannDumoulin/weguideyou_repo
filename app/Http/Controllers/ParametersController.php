<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;

class ParametersController extends Controller
{
    public function getInfos(){
        return Auth::user(); 
    }

    public function changeInfos(Request $request){

    	$user = Auth::user();
    	$user = DB::select('select * from users where id ='.$user->id);
    	$req = $request->infos;

    	// tester si mdp correspond
    	if (!Hash::check($req["oldMdp"], $user[0]->password)) {
		    return 0;
		}

		if(strlen($req["mdp"]) < 6)
			return "c";

		// changer les infos
		$user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id); 
        $obj_user->password = Hash::make($req["mdp"]);
        $obj_user->email = $req["mail"];
        $obj_user->save();

        redirect('/')->with(['message' => 'Vos informations ont a bien été modifiées !']);

        return 1;
    }

}
