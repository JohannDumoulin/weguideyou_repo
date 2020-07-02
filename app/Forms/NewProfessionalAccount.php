<?php

namespace App\Forms;
use Lang;

use Kris\LaravelFormBuilder\Form;

class NewProfessionalAccount extends Form
{
    public function buildForm()
    {
        $this->formOptions = [
            'method' =>  'POST',
            'url' => route('professional-account.store'),
        ];

        $this
            ->add('name', 'text',[
                'label' => Lang::get('Prénom'),
                'rules' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ],
            ])
            ->add('surName', 'text',[
                'label' => Lang::get('Nom'),
                'rules' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ],
            ])
            ->add('birth', 'date',[
                'label' => Lang::get('Date de naissance'),
                'rules' => [
                    'required|date'
                ],
            ])
            ->add('gender', 'select', [
                'choices' => ['f' =>Lang::get('Femme'), 'h' =>Lang::get('Homme'), 'o' =>Lang::get('Autre')],
                'selected' => '',
                'empty_value' => Lang::get('Choisir'),
                'label' => Lang::get('Genre : '),
                'rules' => [
                    'required|string|size:1'
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
                'label' => Lang::get('Téléphone'),
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
                    'label' => Lang::get('Confirmation du mot de passe'),
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
            ->add('siret', 'text',[
                'label' => 'Numéro de Siret',
                'rules' => [
                    'required|numeric|digits:14'
                ]
            ])
            ->add('licence', 'text',[
                'label' => Lang::get('Numéro de carte pro'),
                'rules' => [
                    'required|numeric|digits:14'
                ]
            ])
            ->add('licenceDate', 'date',[
                'label' => Lang::get('Expiration de carte pro'),
                'rules' => [
                    'required|date'
                ],
            ])
            ->add('submit', 'submit',[
                'label' => Lang::get('Envoyer'),
                'attr' => ['class' => 'buttonLink'],
            ]);
    }
}
