<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateUserLangController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $test = $request->checkbox0;
            return response($test);
        }
        abort(404);
    }
}
