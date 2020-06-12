<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = true;
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)){
            return redirect('/')->with('success','Vous êtes bien connecté');
        }
        if (!Auth::attempt(['email_user' => $email,'password' => $password])){
            return redirect('/')->with('error','Erreur de connexion');
        }

        /*$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/register');
        }
        if (!Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/');
        }*/
    }
}
