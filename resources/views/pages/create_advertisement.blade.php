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

		<form action="{{ route('advertisement-send') }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
				<label for="ad_date_from">Disponibilité : du</label>
				<input type="date" name="date_from" id="ad_date_from">
				<label for="ad_date_to">au</label>
				<input type="date" name="date_to" id="ad_date_to">
			</div>
			<div class="container">
				<label for="price_container">Prix</label>
				<div id="price_container">
					<p>Laisser à 0 si vous ne souhaiter pas proposer de prix pour cet horaire</p>
					<div class="price_content">
						<input type="number" id="ad_one_h" name="price_one_h" value="1h" min="0">
						<label for="ad_one_h">Pour 1h</label>
					</div>
					<div class="price_content">
						<input type="number" id="ad_two_h" name="price_two_h" value="2h" min="0">
						<label for="ad_two_h">Pour 2h</label>
					</div>
					<div class="price_content">
						<input type="number" id="ad_four_h" name="price_four_h" value="4h" min="0">
						<label for="ad_four_h">Pour 4h</label>
					</div>
					<div class="price_content">
						<input type="number" id="ad_half_day" name="price_half_day" value="half_day" min="0">
						<label for="ad_half_day">Pour la demi-journée</label>
					</div>
					<div class="price_content">
						<input type="number" id="ad_day" name="price_day" value="day" min="0">
						<label for="ad_day">Pour la journée</label>
					</div>
				</div>
			</div>
			<div class="container">
				<label for="ad_phone">Afficher votre numéro sur l'annonce</label>
				<input type="checkbox" id="ad_phone" name="phone_bool">
			</div>
			<div class="container">
				<label for="ad_pictures">Photos</label>
				<input type="file" id="ad_pictures" name="pictures">
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