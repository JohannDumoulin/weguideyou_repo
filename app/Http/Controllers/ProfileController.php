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
            if ($user){
                if (Auth::user()->status === 'PAR'){
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

                        $this->updateLang($request->input('checkbox'));

                        Flashy::success('Modification enregistré');
                        return redirect()->back();
                    }else{
                        Flashy::error('Modification non valide');
                        return redirect()->back();
                    }
                }
                if (Auth::user()->status === 'PRO'){
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
                        'title' => [
                            'required',
                            'string',
                            'max:50',
                            'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
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
                        $user->title = $request['title'];
                        $user->description = $request['description'];

                        $user->save();

                        $this->updateLang($request->input('checkbox'));

                        Flashy::success('Modification enregistré');
                        return redirect()->back();
                    }else{
                        Flashy::error('Modification non valide');
                        return redirect()->back();
                    }
                }
                if (Auth::user()->status === 'NSO'){

                }
                if (Auth::user()->status === 'SO'){

                }
            }

            Flashy::error('Modification non valide');
            return redirect()->back();
        }else{
            Flashy::error('Vous devez d\'abord vous connecter');
            return redirect('login');
        }
    }




    private function updateLang($request){
        UserLanguage::where('user_id',Auth::user()->id)->delete();

        $language_id_max = Language::max('language_id');

        $options = array(
            'options' => array(
                'min_range' => 1,
                'max_range' => $language_id_max,
            )
        );
        if (!empty($request)){
            foreach ($request as $value) {
                if (filter_var($value, FILTER_VALIDATE_INT, $options) !== FALSE) {
                    if (!empty($value)){
                        $lang = new UserLanguage();
                        $lang->language_id = $value;
                        $lang->user_id = Auth::user()->id;
                        $lang->save();
                    }
                }
            }
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
