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
                'placeholder' => 'azev',
            ])
            ->add('fullName', 'text')
            ->add('age', 'date')
            ->add('sex', 'select', [
            'choices' => ['English', 'French'],
            'selected' => 'en',
            'empty_value' => '=== Select sex ==='
            ]);

        $this->add('submit', 'submit',[
            'label' => 'Envoyer',
            'class' => 'buttonLink'
            ]);

    }
}
