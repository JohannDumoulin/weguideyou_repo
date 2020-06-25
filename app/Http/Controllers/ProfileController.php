<?php

namespace App\Http\Controllers;

use App\Language;
use App\UserLanguage;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;
use MercurySeries\Flashy\Flashy;

class ProfileController extends Controller
{
    public function index(){
        $status = Auth::user()->status;
        $UserLanguages = UserLanguage::all();
        $languages = Language::all();

        if ($status === 'PAR'){
            $dateOfBirth = Auth::user()->birth;
            $years = Carbon::createFromDate($dateOfBirth)->age;
            return view('pages/profile', ['years'=>$years, 'status'=>$status, 'UserLanguages'=>$UserLanguages, 'languages'=>$languages]);
        }
        if ($status === 'PRO'){
            $dateOfBirth = Auth::user()->birth;
            $years = Carbon::createFromDate($dateOfBirth)->age;
            return view('pages/profile', ['years'=>$years, 'status'=>$status, 'UserLanguages'=>$UserLanguages, 'languages'=>$languages]);
        }
        if ($status === 'NSO'){
            return view('pages/profile', ['status'=>$status, 'UserLanguages'=>$UserLanguages, 'languages'=>$languages]);
        }
        if ($status === 'SO'){
            return view('pages/profile', ['status'=>$status, 'UserLanguages'=>$UserLanguages, 'languages'=>$languages]);
        }
    }

    public function update(Request $request){
        if (Auth::user()){
            $user = User::find(Auth::user()->id);

            if (Auth::user()->status === 'PAR'){
                if ($user){
                    $validate = null;
                    $validate = $request->validate([
                        'name' => [
                            'required',
                            'string',
                            'max:50',
                            'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u',
                        ],
                        'surname' => [
                            'required',
                            'string',
                            'max:50',
                            'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u',
                        ],
                        'address' => [
                            'required',
                            'string',
                            'max:50',
                            'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                        ],
                        'city' => [
                            'required',
                            'string',
                            'max:50',
                            'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                        ],
                        'pc' => [
                            'required',
                            'numeric',
                            'digits:5',
                        ],
                        'description' => [
                            'required',
                            'string',
                            'max:280',
                            'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                        ],
                    ]);

                    if ($validate){
                        $user->name = $request['name'];
                        $user->surname = $request['surname'];
                        $user->address = $request['address'];
                        $user->city = $request['city'];
                        $user->pc = $request['pc'];
                        $user->description = $request['description'];

                        $user->save();
                        Flashy::success('Modification enregistré');
                        return redirect()->back();
                    }else{
                        Flashy::error('Modification non valide');
                        return redirect()->back();
                    }
                }else{
                    Flashy::error('Modification non valide');
                    return redirect()->back();
                }
            }
            if (Auth::user()->status === 'PRO'){

            }
            if (Auth::user()->status === 'NSO'){

            }
            if (Auth::user()->status === 'SO'){

            }

            Flashy::error('Modification non valide');
            return redirect()->back();
        }else{
            Flashy::error('Vous devez d\'abord vous connecter');
            return redirect('login');
        }
    }

    public function profilePublic($id) {

    	$user = DB::select('select * from users where id ='.$id);
    	$user = $user[0];

        $dateOfBirth = $user->birth;
        $years = Carbon::createFromDate($dateOfBirth)->age;

    	return view('pages/profilePublic', ['user'=>$user, "years"=> $years]);
    }
}
