<?php

namespace App\Http\Controllers\register;

use App\Forms\NewParticularAccount;
use App\Http\Controllers\Controller;
use App\Register;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;

class NewParController extends Controller
{
    private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    private function getForm(){
        return $this->formBuilder->create(NewParticularAccount::class,[

        ]);
    }

    public function create(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        return view('pages.register.par_account', compact('formRegister'));
    }

    public function store(FormBuilder $formBuilder){
        $formRegister = $this->getForm();
        $formRegister->redirectIfNotValid();
        $values = $formRegister->getFieldValues();

        User::create([
            'name_user' => $values['name'],
            'surname_user' => $values['surName'],
            'email_user' => $values['mailAddress'],
            'password_user' => Hash::make($values['password']),
            'gender_user' => $values['gender'],
            'birth_user' => $values['birth'],
            'address_user' => $values['address'],
            'city_user' => $values['city'],
            'pc_user' => $values['postcode'],
            'phone_user' => $values['phone'],
            'pic_user' => null,
            'status_user' => 'PRO',
            'license_user' => null,
            'urssaf_user' => null,
            'cgu' => $values['CGU'],
            'news_letter' => $values['newsLetter'],

        ]);

        return redirect('/');
    }
}
