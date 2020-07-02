<?php

namespace App\Forms;
use Lang;

use Kris\LaravelFormBuilder\Form;

class NewSOAccount extends Form
{
    public function buildForm()
    {
        $this->formOptions = [
            'method' =>  'POST',
            'url' => route('so-account.store'),
        ];

        $this
            ->add('name', 'text',[
                'label' => Lang::get('Nom de la Structure'),
                'rules' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ],
            ])
            ->add('address', 'text',[
                'label' => Lang::get('Adresse'),
                'rules' => [
                    'required','string','max:50','regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ]
            ])
            ->add('city', 'text',[
                'label' => Lang::get('Ville'),
                'rules' => [
                    'required','string','max:50','regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ]
            ])
            ->add('postcode', 'text',[
                'label' => Lang::get('Code Postal'),
                'rules' => [
                    'required|numeric|digits:5'
                ]
            ])
            ->add('phone', 'text',[
                'label' => 'Téléphone',
                'rules' => [
                    'required|numeric|digits_between:1,15'
                ]
            ])
            ->add('email', 'email',[
                'label' => Lang::get('Adresse mail'),
                'rules' => [
                    'required|string|email|max:255|unique:users',
                ],
            ])
            ->add('password', 'repeated', [
                'wrapper' => ['class' => 'form-group passwordBox'],
                'type' => 'password',
                'second_name' => 'password_confirmation',
                'first_options' => [
                    'label' => Lang::get('Mot de passe'),
                    'rules' => [
                        'required|string|min:6|confirmed'
                    ],
                ],
                'second_options' => [
                    'label' => Lang::get('Confirmation mot de passe'),
                    'rules' => [
                        'required|string|min:6'
                    ],
                ],
            ])
            ->add('CGU', 'checkbox', [
                'value' => 1,
                'wrapper' => ['class' => 'form-group cguLink'],
                'label' => Lang::get('J’accepte les Conditions Générales d\'Utilisation.'),
                'checked' => false,
                'rules' => [
                    'required'
                ],
            ])
            ->add('newsLetter', 'checkbox', [
                'value' => 1,
                'label' => Lang::get('Je souhaite recevoir les dernières nouvelles de la part de We Guide You.'),
                'checked' => false
            ])

            ->add('statusDetail', 'select', [
                'choices' => ['club' =>Lang::get('Club de sport'), 'school' =>Lang::get('Ecole de sport'), 'other' =>Lang::get('Autre')],
                'selected' => '',
                'empty_value' => Lang::get('Choisir'),
                'label' => Lang::get('Statut :'),
                'rules' => [
                    'required|string'
                ],
            ])
            ->add('siret', 'text',[
                'label' => Lang::get('Numéro de Siret'),
                'rules' => [
                    'required|numeric|digits:14'
                ]
            ])
            ->add('submit', 'submit',[
                'label' => Lang::get('Envoyer'),
                'attr' => ['class' => 'buttonLink'],
            ]);
    }
}
