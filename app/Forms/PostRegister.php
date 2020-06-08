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
            ->add('name', 'text',[
                'label' => 'Nom'
            ])
            ->add('fullName', 'text',[
                'label' => 'Prénom'
            ])
            ->add('age', 'date',[
                'label' => 'Age'
            ])
            ->add('gender', 'select', [
                'choices' => ['Femme', 'Homme', 'Autre'],
                'selected' => '',
                'empty_value' => 'Choisir',
                'label' => 'Genre : ',
            ])
            ->add('mailAdress', 'email',[
                'label' => 'Adresse mail'
            ])
            ->add('password', 'password',[
                'label' => 'Mot de passe'
            ])
            ->add('passwordConfirm', 'password',[
                'label' => 'Confirmation mot de passe'
            ])
            ->add('languages', 'choice', [
                'choices' => ['en' => 'English', 'fr' => 'French'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => ['en', 'fr'],
                'expanded' => true,
                'multiple' => true
            ]);
            /*->add('status', 'radio', [
            'value' => 'PRO',
            'checked' => false
            ])
            ->add('remember_me', 'radio', [
            'value' => 'SCH1',
            'checked' => false
            ])
            ->add('remember_m', 'radio', [
            'value' => 'SCH2',
            'checked' => false
            ])
            ->add('remember_', 'radio', [
            'value' => 'PAR',
            'checked' => false
            ]);*/

        $this->add('submit', 'submit',[
            'label' => 'Envoyer',
            'class' => 'buttonLink'
            ]);

    }
}
