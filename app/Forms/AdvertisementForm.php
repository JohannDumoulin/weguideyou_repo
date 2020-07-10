<?php

namespace App\Forms;
use Lang;

use Kris\LaravelFormBuilder\Form;
use Carbon\Carbon;

class AdvertisementForm extends Form
{
    public function buildForm()
    {
        $this

            // ->add('type', 'select', [
            //     'choices' => ['Cours' =>'Cours', 'LookForJob' =>'Recherche de travail', 'LookForPeople' =>'Recherche d\'employé'],
            //     'selected' => '',
            //     'label' => 'Type d\'annonce',
            //     'rules' => [
            //         'required',
            //     ]
            // ])

        	// ->add('name', 'text', [
        	// 	'label' => 'Titre de l\'annonce',
        	// 	'rules' => [
        	// 		'required',
        	// 	],
        	// ])

        	// ->add('desc', 'textarea', [
        	// 	'label' => 'Description de l\'annonce',
        	// 	'rules' => [
        	// 		'required',
        	// 	]
        	// ])

            // ->add('duration', 'select', [
            //     'choices' => ['1h' =>'1h', '2h' =>'2h', '4h' =>'4h', 'half-day' =>'Demi-journée', 'day' =>'Toute la journée'],
            //     'selected' => '',
            //     'label' => 'Durée du cours',
            //     'rules' => [
            //         'required',
            //     ]
            // ])

            // ->add('nbPers', 'select', [
            //     'choices' => ['Individuel' =>'Individuel', 'Collectif' =>'Collectif'],
            //     'selected' => '',
            //     'label' => 'Nombre de personne',
            //     'rules' => [
            //         'required',
            //     ]
            // ])

            // ->add('date_from', 'date', [
            // 	'label' => 'Disponibilité : du',
            // 	'rules' => [
            // 		'required',
            // 	],
            //     'attr' => ['min' => Carbon::now()->toDateString()],
            // ])

            // ->add('date_to', 'date', [
            // 	'label' => 'au',
            // 	'rules' => [
            // 		'required',
            // 	]
            // ])

            // ->add('price_one_h', 'number', [
            // 	'label' => 'Prix par heure',
            // 	'attr' => ['min' => '10'],
            //     'rules' => [
            //         'required',
            //     ]
            // ])

            // ->add('price_two_h', 'number', [
            // 	'label' => 'Prix pour 2h',
            // 	'attr' => ['min' => '10'],
            // ])

            // ->add('price_half_day', 'number', [
            // 	'label' => 'Prix pour la demi-journée',
            // 	'attr' => ['min' => '10'],
            // ])

            // ->add('price_day', 'number', [
            // 	'label' => 'Prix pour la journée',
            // 	'attr' => ['min' => '10'],
            // ])

            // ->add('show_phone', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => 'Afficher votre numéro sur l\'annonce',
            //     'class' => 'test,'
            // ])

            ->add('img', 'file', [
            	'label' => Lang::get('Images'),
            	'attr' => ['multiple' => 'true'],
                'wrapper' => ['class' => 'form-group Cours LookForJob LookForPeople'],
                'rules' => 'mimes:jpg,jpeg,png',
            ]);

            // Premium

            // ->add('premium_in_front_week', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => 'Chaque jour pendant 7 jours (35€)',
            // ])

            // ->add('premium_in_front_month', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => 'Chaque jour pendant 30 jours (110€)',
            // ])

            // ->add('premium_banner_week', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => 'Chaque jour pendant 7 jours (35€)',
            // ])

            // ->add('premium_banner_month', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => 'Chaque jour pendant 30 jours (110€)',
            // ])

            // ->add('premium_urgent_week', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => 'Chaque jour pendant 7 jours (35€)',
            // ])

            // ->add('premium_urgent_month', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => 'Chaque jour pendant 30 jours (110€)',
            // ])

            // ->add('premium_booking', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => '1€',
            // ])

            // ->add('premium_securing', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => '1% du prix du cours',
            // ])

            // ->add('premium_insurance', 'checkbox', [
            // 	'value' => '1',
            // 	'label' => '5€',
            // ])

            // ->add('submit', 'submit', [
            // 	'label' => 'Déposer l\'annonce',
            // ]);
    }
}
