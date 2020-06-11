@extends('app')

@section('title', 'Déposer une annonce')

@push('style')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'create_advertisement')

@section('content')
	<section>
		<div class="wrap">
			<h1>Créer une annonce</h1>

			{!! form_start($adForm) !!}

				<!-- Fonctionnalités gratuites -->
				{!! form_row($adForm->name) !!}
				{!! form_row($adForm->desc) !!}
				{!! form_row($adForm->type) !!}
				{!! form_row($adForm->place) !!}
				{!! form_row($adForm->date_from) !!}
				{!! form_row($adForm->date_to) !!}
				<p>Laissez vide si vous ne souhaitez pas proposer de prix pour cet horaire</p>
				{!! form_row($adForm->price_one_h) !!}
				{!! form_row($adForm->price_two_h) !!}
				{!! form_row($adForm->price_half_day) !!}
				{!! form_row($adForm->price_day) !!}
				{!! form_row($adForm->show_phone) !!}
				{!! form_row($adForm->img) !!}

				<!-- Fonctionnalités payantes -->
				<!-- <h2>Fonctionnalités payantes</h2>
				<div class="premium_container">
					<p class="content_title">En tête de liste</p>
					<p class="content_desc">Cette option vous permet de remonter automatiquement votre annonce en haut de la liste de résultats, comme si elle venait d'être mise en ligne.</p>
					<input type="checkbox" name="premium_in_front_week" id="premium_in_front_week">
					<label for="premium_in_front_week">Chaque jour pendant 7 jours (35€)</label>
					<input type="checkbox" name="premium_in_front_month" id="premium_in_front_month">
					<label for="premium_in_front_month">Chaque jour pendant 30 jours (110€)</label>
				</div>
				<div class="premium_container">
					<p class="content_title">Bannière de mise en avant</p>
					<p class="content_desc">Le professionnel peut mettre son annonce en avant sur toutes les pages de résultats dans un emplacement privilégié à droite des listes d'annonces, pendant 7 ou 30 jours. Avec cette option, le professionnel pourra également modifier son annonce.</p>
					<input type="checkbox" name="premium_banner_week" id="premium_banner_week">
					<label for="premium_banner_week">Pendant 7 jours (35€)</label>
					<input type="checkbox" name="premium_banner_month" id="premium_banner_month">
					<label for="premium_banner_month">Pendant 30 jours (35€)</label>
				</div>
				<div class="premium_container">
					<p class="content_title">Annonce urgente</p>
					<p class="content_desc">Le professionnel peut mettre son annonce en avant sur toutes les pages de résultats dans un emplacement privilégié à droite des listes d'annonces, pendant 7 ou 30 jours. Avec cette option, le professionnel pourra également modifier son annonce.</p>
					<input type="checkbox" name="premium_urgent_week" id="premium_urgent_week">
					<label for="premium_urgent_week">Pendant 7 jours (35€)</label>
					<input type="checkbox" name="premium_urgent_month" id="premium_urgent_month">
					<label for="premium_urgent_month">Pendant 30 jours (35€)</label>
				</div>
				<div class="premium_container">
					<p class="content_title">Réservation immédiate</p>
					<p class="content_desc">le client pourra directement réserver l’activité dans le site immédiatement sans passer par la messagerie.</p>
					<input type="checkbox" name="premium_booking" id="premium_booking">
					<label for="premium_booking">1€</label>
				</div>
				<div class="premium_container">
					<p class="content_title">Sécurisation du cours</p>
					<p class="content_desc">le client pourra directement réserver l’activité dans le site immédiatement sans passer par la messagerie.</p>
					<input type="checkbox" name="premium_securing" id="premium_securing">
					<label for="premium_securing">1% du prix du cours</label>
				</div>
				<div class="premium_container">
					<p class="content_title">Assurance annulation</p>
					<p class="content_desc">Si le professionnel choisit cette option, il pourra annuler le cours réserve dans la plateforme et obtenir un remboursement de 50% par l’assureur sur présentation d’un certificat médical et autres justificatifs nécessaires.</p>
					<input type="checkbox" name="premium_insurance" id="premium_insurance">
					<label for="premium_insurance">5€</label>
				</div> -->
				{!! form_row($adForm->submit) !!}
			{!! form_end($adForm) !!}
		</div>
	</section>
	
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush