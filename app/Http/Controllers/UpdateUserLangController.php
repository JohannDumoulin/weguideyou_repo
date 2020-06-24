<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateUserLangController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            dd('Ajax request');
            /*$this->validate($request, [
                'email' => 'bail|required|email',
                'message' => 'bail|required|max:250'
            ]);*/

            return response()->json();
        }
        abort(404);
    }
}
