<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email_user' => $email,'password' => $password])){
            return redirect('/');
        }
        if (!Auth::attempt(['email_user' => $email,'password' => $password])){
            return redirect('/');
        }

        /*$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/favoris');
        }
        if (!Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/');
        }*/
    }
}
