<?php

namespace App\Http\Controllers\register;

use App\Forms\NewSOAccount;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;

class NewSoController extends Controller
{
    private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    private function getForm(){
        return $this->formBuilder->create(NewSOAccount::class,[

        ]);
    }

    public function create(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        return view('pages.register.so_account', compact('formRegister'));
    }

    public function store(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        $formRegister->redirectIfNotValid();
        $values = $formRegister->getFieldValues();

        User::create([
            'name' => $values['name'],
            'surname' => null,
            'email' => $values['mailAddress'],
            'password' => Hash::make($values['password']),
            'gender' => null,
            'birth' =>null,
            'address' => $values['address'],
            'city' => $values['city'],
            'pc' => $values['postcode'],
            'phone' => $values['phone'],
            'pic' => null,
            'status' => 'SO',
            'status_detail' => $values['statusDetail'],
            'license' => null,
            'license_date' => null,
            'siret' => $values['siret'],
            'cgu' => $values['CGU'],
            'news_letter' => $values['newsLetter'],

        ]);

        return redirect('/');
    }
}
