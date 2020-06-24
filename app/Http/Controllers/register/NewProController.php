<?php

namespace App\Http\Controllers\register;

use App\Forms\NewProfessionalAccount;
use App\Http\Controllers\Controller;
use App\Register;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;
use MercurySeries\Flashy\Flashy;

class NewProController extends Controller
{
    use RegistersUsers;
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

        $user = User::create([
            'name' => $values['name'],
            'surname' => $values['surName'],
            'email' => $values['email'],
            'password' => Hash::make($values['password']),
            'gender' => $values['gender'],
            'birth' => $values['birth'],
            'address' => $values['address'],
            'city' => $values['city'],
            'pc' => $values['postcode'],
            'phone' => $values['phone'],
            'status' => 'PRO',
            'license' => $values['licence'],
            'license_date' => $values['licenceDate'],
            'siret' => $values['siret'],
            'cgu' => $values['CGU'],
            'news_letter' => $values['newsLetter'],

        ]);
        $this->guard()->login($user);
        if (Auth::check()){
            Flashy::success('Bienvenue chez WeGuideYou !!!');
            return redirect('/');
        }
        else{
            Flashy::error('Une erreur c\'est produite, veuillez vous connecter manuellement.');
            return redirect('/');
        }
    }
}
