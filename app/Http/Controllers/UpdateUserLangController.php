<?php

namespace App\Http\Controllers;

use App\UserLanguage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UpdateUserLangController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            UserLanguage::where('user_id',Auth::user()->id)->delete();

            foreach ($request->all() as $value){
                $lang = new UserLanguage();
                $lang-> language_id = $value;
                $lang-> user_id = Auth::user()->id;

                $lang->save();
            }



            return redirect('home');
        }
        abort(404);
    }
}
