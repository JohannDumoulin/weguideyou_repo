<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;
use Lang;

class ParametersController extends Controller
{
    public function getInfos(){
        return Auth::user(); 
    }

    public function changeInfosPerso(Request $request){

    	$user = Auth::user();
    	$user = DB::select('select * from users where id ='.$user->id);
    	$req = $request->infos;

    	// tester si mdp correspond
        if(!Hash::check($req["oldMdp"], $user[0]->password))
            return 0;

		if(strlen($req["mdp"]) < 6 && strlen($req["mdp"]) != 0)
			return "c";

		// changer les infos
		$user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id); 
        if(strlen($req["mdp"]) != 0)
            $obj_user->password = Hash::make($req["mdp"]);
        $obj_user->email = $req["mail"];
        $obj_user->save();

        redirect('/')->with(['message' => Lang::get('Vos informations ont a bien été modifiées !')]);

        return 1;
    }

    public function changeInfosA(Request $request) {

        $req = $request->infos;

        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id); 

        $obj_user->num_licence = $req["num_licence"];
        $obj_user->siret = $req["siret"];
        $obj_user->IBAN = $req["IBAN"];
        $obj_user->save();

        redirect('/')->with(['message' => Lang::get('Vos informations ont a bien été modifiées !')]);

        return 1; 
    }

    public function modifPrefNotif(Request $request) {

        $req = $request->infos;

        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id); 

        $notif_alerte = $req["notif_alerte"] === 'true'? true: false;
        $obj_user->notif_alerte = $notif_alerte;
        $obj_user->save();

        return 1; 
    }

     public function deleteAccount(Request $request) {

        if($request->id == null)
            $id = Auth::user()->id;
        else
            $id = $request->id;

        DB::table('users')
            ->where('id', $id)
            ->delete();

        redirect('/')->with(['message' => Lang::get('Le compte a bien été supprimé !')]);

        return 1;
    }

}
