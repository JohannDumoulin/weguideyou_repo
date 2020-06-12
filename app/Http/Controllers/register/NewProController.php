<?php

namespace App\Http\Controllers\register;

use App\Forms\NewProfessionalAccount;
use App\Http\Controllers\Controller;
use App\Register;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;

class NewProController extends Controller
{
    private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    private function getForm(){
        return $this->formBuilder->create(NewProfessionalAccount::class,[

        ]);
    }

    public function create(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        return view('pages.register.pro_account', compact('formRegister'));
    }

    public function store(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        $formRegister->redirectIfNotValid();
        $values = $formRegister->getFieldValues();

        User::create([
            'name' => $values['name'],
            'surname' => $values['surName'],
            'email' => $values['mailAddress'],
            'password' => Hash::make($values['password']),
            'gender' => $values['gender'],
            'birth' => $values['birth'],
            'address' => $values['address'],
            'city' => $values['city'],
            'pc' => $values['postcode'],
            'phone' => $values['phone'],
            'pic' => null,
            'status' => 'PRO',
            'license' => null,
            'urssaf' => null,
            'cgu' => $values['CGU'],
            'news_letter' => $values['newsLetter'],

        ]);

        return redirect('/');
    }
}
