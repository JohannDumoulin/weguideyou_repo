<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }










   /* public function authenticate(Request $request)
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

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/register');
        }
        if (!Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/');
        }
    }*/
}
