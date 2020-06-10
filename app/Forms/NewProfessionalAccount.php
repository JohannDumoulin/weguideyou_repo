<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class NewProfessionalAccount extends Form
{
    public function buildForm()
    {
        $this->formOptions = [
            'method' =>  'POST',
            /*'url' => route('storePro'),*/
        ];

        $this
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
