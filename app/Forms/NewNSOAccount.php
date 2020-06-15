<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class NewNSOAccount extends Form
{
    public function buildForm()
    {
        $this->formOptions = [
            'method' =>  'POST',
            'url' => route('nso-account.store'),
        ];

        $this
            ->add('name', 'text',[
                'label' => 'Nom de la Structure',
                'rules' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ],
            ])
            ->add('address', 'text',[
                'label' => 'required','string','max:100','regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u',
                'rules' => [
                    'required','string','max:50','regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ]
            ])
            ->add('city', 'text',[
                'label' => 'City',
                'rules' => [
                    'required','string','max:50','regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ]
            ])
            ->add('postcode', 'text',[
                'label' => 'Post code',
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
            ->add('mailAddress', 'email',[
                'label' => 'Adresse mail',
                'rules' => [
                    'required|string|email|max:255',
                ],
            ])
            ->add('password', 'repeated', [
                'wrapper' => ['class' => 'form-group passwordBox'],
                'type' => 'password',
                'second_name' => 'password_confirmation',
                'first_options' => [
                    'label' => 'Mot de passe',
                    'rules' => [
                        'required|string|min:6|confirmed'
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmation mot de passe',
                    'rules' => [
                        'required|string|min:6'
                    ],
                ],
            ])
            ->add('CGU', 'checkbox', [
                'value' => 1,
                'wrapper' => ['class' => 'form-group cguLink'],
                'label' => 'J’accepte les Conditions Générales d\'Utilisation.',
                'checked' => false,
                'rules' => [
                    'required'
                ],
            ])
            ->add('newsLetter', 'checkbox', [
                'value' => 1,
                'label' => 'Je souhaite recevoir les dernières nouvelles de la part de We Guide You.',
                'checked' => false
            ])

            ->add('statusDetail', 'text',[
                'label' => 'Statut de la structure',
                'rules' => [
                    'required',
                    'string',
                    'max:200',
                    'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ],
            ])
            ->add('siret', 'text',[
                'label' => 'Numéro de Siret',
                'rules' => [
                    'required|numeric|digits:14'
                ]
            ])
            ->add('submit', 'submit',[
                'label' => 'Envoyer',
                'attr' => ['class' => 'buttonLink'],
            ]);
    }
}
