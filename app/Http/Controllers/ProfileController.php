<?php

namespace App\Http\Controllers;

use App\Language;
use App\Sectors;
use App\UserLanguage;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class ProfileController extends Controller
{

    public function index(){
        $view = "profile";
        $user = Auth::user();

        return $this->displayProfil($view, $user);
    }

    public function indexPublic($id) {
        $view = "profilePublic";

        $user = DB::table('users')
            ->where("id", "=", $id)
            ->select('*')
            ->get();
        $user = (array) $user[0];

        return $this->displayProfil($view, $user);
    }

    public function displayProfil($view, $user) {

        $UserLanguages = UserLanguage::all();
        $languages = Language::all();
        $sectors = Sectors::all();

        $adverts = DB::table('advertisement')
            ->where("advertisement.user_id", "=", $user['id'])
            ->select('advertisement.*')
            ->get();

        if ($user["status"] === 'PAR'){
            $dateOfBirth = $user["birth"];
            $years = Carbon::createFromDate($dateOfBirth)->age;
            return view('pages/'.$view, ['years'=>$years, 'status'=>$user["status"], 'UserLanguages'=>$UserLanguages, 'languages'=>$languages, 'user'=>$user, 'adverts'=>$adverts]);
        }
        if ($user["status"] === 'PRO'){
            $dateOfBirth = $user["birth"];
            $years = Carbon::createFromDate($dateOfBirth)->age;
            return view('pages/'.$view, ['sectors'=>$sectors, 'years'=>$years, 'status'=>$user["status"], 'UserLanguages'=>$UserLanguages, 'languages'=>$languages, 'user'=>$user, 'adverts'=>$adverts]);
        }
        if ($user["status"] === 'NSO'){
            return view('pages/'.$view, ['sectors'=>$sectors, 'status'=>$user["status"], 'UserLanguages'=>$UserLanguages, 'languages'=>$languages, 'user'=>$user, 'adverts'=>$adverts]);
        }
        if ($user["status"] === 'SO'){
            return view('pages/'.$view, ['sectors'=>$sectors, 'status'=>$user["status"], 'UserLanguages'=>$UserLanguages, 'languages'=>$languages, 'user'=>$user, 'adverts'=>$adverts]);
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
                            'string',
                            'max:50',
                            'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                        ],
                        'description' => [
                            'string',
                            'max:280',
                            'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                        ],
                    ]);



                    if ($validate){
                        if (!empty($request['sector'])){
                            $this->updateSector($request['sector'], $user);
                        }
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
    private function updateSector($request, $user){

        $sector_id_max = Sectors::max('id');

        $options = array(
            'options' => array(
                'min_range' => 1,
                'max_range' => $sector_id_max,
            )
        );
        if (!empty($request)){
            if (filter_var($request, FILTER_VALIDATE_INT, $options) !== FALSE) {
                $test = Sectors::where('id',$request)->sector_name;
                dd($test);
                $user->sector = Sectors::where('id',$request)->sector_name;
                $user->save();
            }
        }
    }
}
