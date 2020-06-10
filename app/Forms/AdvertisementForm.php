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
        		'rules' => [
        			'required',
        		]
        	])

        	->add('desc', 'textarea', [
        		'label' => 'Description de l\'annonce',
        		'rules' => [
        			'required',
        		]
        	])

        	->add('type', 'select', [
                'choices' => ['ski' =>'Ski', 'snowboard' =>'Snowboard', 'other' =>'Autres'],
                'selected' => '',
                'label' => 'Type de cours',
                'rules' => [
                	'required',
                ]
            ])

            ->add('place', 'select', [
                'choices' => ['courchevel' =>'Courchevel', 'tignes' =>'Tignes', 'other' =>'Autres'],
                'selected' => '',
                'label' => 'Lieu',
                'rules' => [
                	'required',
                ]
            ])

            ->add('date_from', 'date', [
            	'label' => 'Disponibilité : du',
            	'rules' => [
            		'required',
            	]
            ])

            ->add('date_to', 'date', [
            	'label' => 'au',
            	'rules' => [
            		'required',
            	]
            ])

            ->add('price_one_h', 'number', [
            	'label' => 'Prix pour 1h',
            	'attr' => ['min' => '10'],
            ])

            ->add('price_two_h', 'number', [
            	'label' => 'Prix pour 2h',
            	'attr' => ['min' => '10'],
            ])

            ->add('price_half_day', 'number', [
            	'label' => 'Prix pour la demi-journée',
            	'attr' => ['min' => '10'],
            ])

            ->add('price_day', 'number', [
            	'label' => 'Prix pour la journée',
            	'attr' => ['min' => '10'],
            ])

            ->add('show_phone', 'checkbox', [
            	'value' => '1',
            	'label' => 'Afficher votre numéro sur l\'annonce',
            ])

            ->add('pictures', 'file', [
            	'label' => 'Photos',
            ])

            ->add('submit', 'submit', [
            	'label' => 'Déposer l\'annonce',
            ]);
    }
}
