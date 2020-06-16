<?php

namespace App\Http\Controllers\register;

use App\Forms\NewParticularAccount;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;

class NewParController extends Controller
{
    use RegistersUsers;
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

        $user = User::create([
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
            'status' => 'PAR',
            'status_detail' => null,
            'license' => null,
            'license_date' => null,
            'siret' => null,
            'cgu' => $values['CGU'],
            'news_letter' => $values['newsLetter'],

        ]);

        $this->guard()->login($user);

        //$email = $values['mailAddress'];
        //$password = $values['password'];
        return redirect('/');
        //$this->authenticate($email, $password);
    }

    /*private function authenticate($email, $password)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        }
    }*/
}
