<?php

namespace App\Http\Controllers\register;

use App\Forms\NewProfessionalAccount;
use App\Http\Controllers\Controller;
use App\Register;
use Illuminate\Http\Request;
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

        /*dd($values);*/

        $user = new Register;
        $user-> name_user = $values['name'];
        $user-> surname_user = $values['surName'];
        $user-> email_user = $values['mailAddress'];
        $user-> password_user = $values['password'];
        $user-> gender_user = $values['gender'];
        $user-> birth_user = $values['birth'];
        $user-> address_user = $values['address'];
        $user-> city_user = $values['city'];
        $user-> pc_user = $values['postcode'];
        $user-> phone_user = $values['phone'];
        $user-> pic_user = null;
        $user-> status_user = 'PRO';
        $user-> license_user = $values['licence'];
        $user-> urssaf_user = null;
        $user-> cgu = $values['CGU'];
        $user-> news_letter = $values['newsLetter'];

        $user->save();

        return redirect('/');
    }
}
