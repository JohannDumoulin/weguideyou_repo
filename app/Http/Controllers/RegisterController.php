<?php

namespace App\Http\Controllers;

use App\Forms\PostRegister;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.register.select_account_type');
    }

    private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    private function getForm(){
        return $this->formBuilder->create(PostRegister::class,[

        ]);
    }

    public function create(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        return view('pages.register.register', compact('formRegister'));
    }

    public function store(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        $formRegister->redirectIfNotValid();
        dd($formRegister->getFieldValues());
    }
}
