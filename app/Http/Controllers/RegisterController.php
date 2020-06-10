<?php

namespace App\Http\Controllers;

use App\Forms\NewNSOAccount;
use App\Forms\NewParticularAccount;
use App\Forms\NewProfessionalAccount;
use App\Forms\NewSOAccount;
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

    private function getForm($accountType){
        if ($accountType === 'par'){
            return $this->formBuilder->create(NewParticularAccount::class,[

            ]);
        }
        if ($accountType === 'pro'){
            return $this->formBuilder->create(NewProfessionalAccount::class,[

            ]);
        }
        if ($accountType === 'nso'){
            return $this->formBuilder->create(NewNSOAccount::class,[

            ]);
        }
        if ($accountType === 'so'){
            return $this->formBuilder->create(NewSOAccount::class,[

            ]);
        }
    }

    public function create(FormBuilder $formBuilder){
        $accountType = request('accountType');
        $formRegister = $this->getForm($accountType);
        return view('pages.register.'.$accountType.'_account', compact('formRegister'));
    }

    /*public function store(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        $formRegister->redirectIfNotValid();
        dd($formRegister->getFieldValues());
    }*/



    /*private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    private function getForm(){
        return $this->formBuilder->create(PostRegister::class,[

        ]);
    }

    private function create(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        return view('pages.register.register', compact('formRegister'));
    }

    public function store(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        $formRegister->redirectIfNotValid();
        dd($formRegister->getFieldValues());
    }*/
}
