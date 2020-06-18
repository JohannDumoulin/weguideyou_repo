@extends('app')

@section('title', 'Mes Annonces')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'mes_annonces')

@section('content')

	@if(session('message') != null)

	<div class="msgConfirm">{{session('message')}}</div>

	@endif

	<div id="sectionContent"></div>

	<div class="wrap contentFavoris">

		<h3 class="titre">Mes Annonces</h3>

		<div class="second_filter_child right sort">					
			<p>Trier par :</p>
			<select name="" id="" class="js-order">
				<option value="plusRecent">Plus récentes</option>
				<option value="plusAncien">Plus anciennes</option>
				<option value="prixCroissant">Prix croissants</option>
				<option value="prixDecroissant">Prix décroissants</option>
			</select>
		</div>

		<div class="divOnglet">
			<div class="js-toggleOnglet selected">
				<span>Annonces en ligne</span>
			</div>
			<div class="js-toggleOnglet">
				<span>Annonces expirée</span>
			</div>
		</div>

		<div class="divHead">

			<button class="buttonLink">Ajouter des options</button>
			<button class="buttonLink">Augmenter la visibilité</button>
			<input class="js-checkAll" type="checkbox" title="Tout sélectionner">

		</div>

		<div id="advertisement_section">
			<div>
				<div class="advertisement_container all" id="js-container">
					@include('components.loading')
				</div>

				<div class="divPage"></div>
			</div>
		</div>

	</div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush