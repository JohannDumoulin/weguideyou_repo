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
		<h1>Créer une annonce</h1>

		<form action="{{ route('advertisement-send') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="container">
				<label for="ad_name">Titre de l'annonce</label>
				<input type="text" name="name" id="ad_name">
			</div>
			<div class="container">
				<label for="ad_desc">Description de l'annonce</label>
				<textarea name="desc" id="ad_desc" cols="30" rows="10"></textarea>
			</div>
			<div class="container">
				<label for="ad_type">Type de cours</label>
				<select name="type" id="ad_type">
					<option value="ski">Ski</option>
					<option value="snowboard">Snowboard</option>
				</select>
			</div>
			<div class="container">
				<label for="">Disponibilité : du</label>
				<input type="date">
				<label for="">au</label>
				<input type="date">
			</div>
			<div class="container">
				<label for="">Prix</label>
				<p>Laisser à 0 si vous ne souhaiter pas proposer de prix pour cet horaire</p>
				<div class="price_container">
					<input type="number" value="0" min="0">
					<p>Pour 1h</p>
				</div>
				<div class="price_container">
					<input type="number" value="0" min="0">
					<p>Pour 2h</p>
				</div>
				<div class="price_container">
					<input type="number" value="0" min="0">
					<p>Pour 4h</p>
				</div>
				<div class="price_container">
					<input type="number" value="0" min="0">
					<p>Pour la demi-journée</p>
				</div>
				<div class="price_container">
					<input type="number" value="0" min="0">
					<p>Pour la journée</p>
				</div>
			</div>
			<div class="container">
				<label for="">Afficher votre numéro sur l'annonce</label>
				<input type="checkbox">
			</div>
			<div class="container">
				<label for="">Photos</label>
				<input type="file">
			</div>
			<input type="submit" value="Déposer l'annonce">
		</form>
	</section>
	
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush