@extends('app')

@section('title', 'Favoris')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'favorites')

@section('content')

	<div id="sectionContent"></div>

	<div class="wrap contentFavoris">

		<h3 class="titre">@lang('Favoris')</h3>

		<div class="second_filter_child right sort">					
			<p>@lang('Trier par :')</p>
			<select name="" id="" class="js-order">
				<option value="plusRecent">@lang('Plus récentes')</option>
				<option value="plusAncien">@lang('Plus anciennes')</option>
				<option value="prixCroissant">@lang('Prix croissants')</option>
				<option value="prixDecroissant">@lang('Prix décroissants')</option>
			</select>
		</div>

		<div id="advertisement_section">
			<div class="advertisement_container all" id="js-container">

			</div>

			<div class="msgNoAd" style="display:none">
				@lang('Aucune offres à afficher')
			</div>
					
			<div class="js-divLoading">
				@include('components.loading')
			</div>
		</div>
	</div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush