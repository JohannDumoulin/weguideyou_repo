<?php

namespace App\Http\Controllers;

use App\Forms\PostRegister;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class RegisterController extends Controller
{
    public function index(){
        /*return view('pages/register');*/
    }

    public function create(FormBuilder $formBuilder){
        $formRegister = $formBuilder->create(PostRegister::class);
        return view('pages.register.register', compact('formRegister'));
    }
}
