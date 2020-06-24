@extends('app')

@section('title', 'Déposer une annonce')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'create_advertisement')

@section('content')
	<section>
			<h1>Créer une annonce</h1>

			{!! form_start($adForm) !!}

				<div class="form_container">
					<!-- Fonctionnalités gratuites -->
					{!! form_row($adForm->name) !!}
					{!! form_row($adForm->desc) !!}
					<div class="form_content">
						{!! form_row($adForm->type) !!}

						<!-- Place -->
						<div>
							{!! form_row($adForm->place) !!}
							<div>
								<div class="loader searchCity" id="hidden"></div>
							</div>
							<div>
								<div class="suggestions"></div>
							</div>
							<input type="" name="place_lat" id="place_lat" style="display: none">
							<input type="" name="place_lng" id="place_lng" style="display: none">
						</div>

						<label for="activity">Activité</label>
						<input list="dataActivities" name="activity" id="activity" placeholder="Que voulez-vous faire ?">
						<datalist id="dataActivities">
							<option></option>
						</datalist>

						{!! form_row($adForm->nbPers) !!}
						{!! form_row($adForm->duration) !!}
						{!! form_row($adForm->date_from) !!}
						{!! form_row($adForm->date_to) !!}
					</div>
					<div class="form_content">
						<p>Laissez vide si vous ne souhaitez pas proposer de prix pour cet horaire</p>
						{!! form_row($adForm->price_one_h) !!}
						{!! form_row($adForm->price_two_h) !!}
						{!! form_row($adForm->price_half_day) !!}
						{!! form_row($adForm->price_day) !!}
					</div>
					<div class="form_content">
						{!! form_row($adForm->show_phone) !!}
						{!! form_row($adForm->img) !!}
					</div>
					
					
				</div>

				<!-- Fonctionnalités payantes -->
				<div class="form_container">
					<h2>Fonctionnalités payantes</h2>

					<div class="premium_container">
						<p class="content_title">En tête de liste</p>
						<p class="content_desc">Cette option vous permet de remonter automatiquement votre annonce en haut de la liste de résultats, comme si elle venait d'être mise en ligne.</p>
						{!! form_row($adForm->premium_in_front_week) !!}
						{!! form_row($adForm->premium_in_front_month) !!}
					</div>
					<div class="premium_container">
						<p class="content_title">Bannière de mise en avant</p>
						<p class="content_desc">Le professionnel peut mettre son annonce en avant sur toutes les pages de résultats dans un emplacement privilégié à droite des listes d'annonces, pendant 7 ou 30 jours. Avec cette option, le professionnel pourra également modifier son annonce.</p>
						{!! form_row($adForm->premium_banner_week) !!}
						{!! form_row($adForm->premium_banner_month) !!}
					</div>
					<div class="premium_container">
						<p class="content_title">Annonce urgente</p>
						<p class="content_desc">Le professionnel peut mettre son annonce en avant sur toutes les pages de résultats dans un emplacement privilégié à droite des listes d'annonces, pendant 7 ou 30 jours. Avec cette option, le professionnel pourra également modifier son annonce.</p>
						{!! form_row($adForm->premium_urgent_week) !!}
						{!! form_row($adForm->premium_urgent_month) !!}
					</div>
				</div>

				<div class="form_container">
					<h2>Fonctionnalités payantes</h2>

					<div class="premium_container">
						<p class="content_title">Réservation immédiate</p>
						<p class="content_desc">le client pourra directement réserver l’activité dans le site immédiatement sans passer par la messagerie.</p>
						{!! form_row($adForm->premium_booking) !!}
					</div>
					<div class="premium_container">
						<p class="content_title">Sécurisation du cours</p>
						<p class="content_desc">le client pourra directement réserver l’activité dans le site immédiatement sans passer par la messagerie.</p>
						{!! form_row($adForm->premium_securing) !!}
					</div>
					<div class="premium_container">
						<p class="content_title">Assurance annulation</p>
						<p class="content_desc">Si le professionnel choisit cette option, il pourra annuler le cours réserve dans la plateforme et obtenir un remboursement de 50% par l’assureur sur présentation d’un certificat médical et autres justificatifs nécessaires.</p>
						{!! form_row($adForm->premium_insurance) !!}
					</div>
					{!! form_row($adForm->submit) !!}
				</div>
			{!! form_end($adForm) !!}
			<div class="arrow_container">
				<div id="left">
					<p>Précédent</p>
				</div>
				<div id="right" class="js-active">
					<p>Suivant</p>
				</div>
			</div>
	</section>
	
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush