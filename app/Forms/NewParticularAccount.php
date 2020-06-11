<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class NewParticularAccount extends Form
{
    public function buildForm()
    {
        $this->formOptions = [
            'method' =>  'POST',
            'url' => route('particular-account.store'),
        ];

        $this
            ->add('name', 'text',[
                'label' => 'Prénom',
                'rules' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ],
            ])
            ->add('surName', 'text',[
                'label' => 'Nom',
                'rules' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/(^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._ -]+)/u'
                ],
            ])
            ->add('birth', 'date',[
                'label' => 'Birth',
                'rules' => [
                    'required|date'
                ],
            ])
            ->add('gender', 'select', [
                'choices' => ['f' =>'Femme', 'h' =>'Homme', 'o' =>'Autre'],
                'selected' => '',
                'empty_value' => 'Choisir',
                'label' => 'Genre : ',
                'rules' => [
                    'required|string|size:1'
                ],
            ])
            ->add('address', 'text',[
                'label' => 'Adresse',
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
                'label' => 'Poste code',
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
            ->add('submit', 'submit',[
                'label' => 'Envoyer',
                'attr' => ['class' => 'buttonLink'],
            ]);
    }
}