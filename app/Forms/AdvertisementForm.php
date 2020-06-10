<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AdvertisementForm extends Form
{
    public function buildForm()
    {
        $this
        	->add('name', 'text', [
        		'label' => 'Titre de l\'annonce',
        	])

        	->add('desc', 'textarea', [
        		'label' => 'Description de l\'annonce',
        	])

        	->add('type', 'select', [
                'choices' => ['ski' =>'Ski', 'snowboard' =>'Snowboard'],
                'selected' => '',
                'label' => 'Type de cours',
            ])

            ->add('date_from', 'date',  [
            	'label' => 'Disponibilité : du',
            ])

            ->add('date_to', 'date',  [
            	'label' => 'au',
            ])

            ->add('show_phone', 'checkbox', [
            	'value' => 'true',
            	'label' => 'Afficher votre numéro sur l\'annonce',
            ])

            ->add('pictures', 'file', [
            	'label' => 'Photos'
            ])

            ->add('submit', 'submit', [
            	'label' => 'Déposer l\'annonce',
            ]);
    }
}
