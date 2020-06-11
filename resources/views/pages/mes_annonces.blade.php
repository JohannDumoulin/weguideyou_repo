@extends('app')

@section('title', 'Mes Annonces')

@push('style')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'mes_annonces')

@section('content')

	<div id="sectionContent"></div>

	<div class="wrap contentFavoris">

		<h3 class="titre">Mes Annonces</h3>

		<div class="divOnglet">
			<div class="js-toggleOnglet selected">Annonces en ligne</div>
			<div class="js-toggleOnglet">Annonces expirée</div>
		</div>

		<div class="divHead">

			<button class="buttonLink">Ajouter des options</button>
			<button class="buttonLink">Augmenter la visibilité</button>
			<input class="js-checkAll" type="checkbox" title="Tout sélectionner">

		</div>

		<div id="advertisement_section">
			<div class="advertisement_container all" id="js-container">
				@include('components.loading')
			</div>
		</div>

	</div>

@endsection

@push('script')

    <script src="{{asset('js/app.js')}}"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush