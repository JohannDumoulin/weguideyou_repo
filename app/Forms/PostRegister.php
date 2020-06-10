<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PostRegister extends Form
{
    public function buildForm()
    {
        $this->formOptions = [
            'method' =>  'POST',
            //'url' => route('/'),
        ];

        $this
            ->add('typeAccount', 'select', [
                'choices' => ['PRO' => 'Professionnel indépendant', 'NSO' => 'Organisme non sportif', 'SO' => 'Organisme sportif', 'PAR' => 'Particulier'],
                'selected' => '',
                'empty_value' => 'Choisir',
                'label' => 'Compte : ',
            ])
            ->add('name', 'text',[
                'label' => 'Prénom',
            ])
            ->add('surName', 'text',[
                'label' => 'Nom',
            ])
            ->add('age', 'date',[
                'label' => 'Age',
            ])
            ->add('gender', 'select', [
                'choices' => ['f' =>'Femme', 'h' =>'Homme', 'a' =>'Autre'],
                'selected' => '',
                'empty_value' => 'Choisir',
                'label' => 'Genre : ',
            ])
            ->add('organizationName', 'text',[
                'label' => 'Nom de l\'organisme',
                'rules' => [
                    'required',
                ],
            ])
            ->add('organizationStatus', 'text',[
                'label' => 'Statut'
            ])
            ->add('address', 'text')
            ->add('city', 'text')
            ->add('postcode', 'text')
            ->add('phone', 'text')
            ->add('mailAddress', 'email',[
                'label' => 'Adresse mail',
            ])
            ->add('password', 'password',[
                'label' => 'Mot de passe'
            ])
            ->add('passwordConfirm', 'password',[
                'label' => 'Confirmation mot de passe'
            ])
            ->add('CGU', 'checkbox', [
                'value' => 1,
                'wrapper' => ['class' => 'form-group cguLink'],
                'label' => 'J’accepte les Conditions Générales d\'Utilisation.',
                'checked' => false
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
