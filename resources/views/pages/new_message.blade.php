@extends('app')

@section('title', 'Nouveau Message')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'new_message')

@section('content')
	<div class="wrap">
		<section>
			{!! form_start($NewMessageForm) !!}
				<h1>Envoyer un message à {{ $user->name }}</h1>
				<h2>A propos de l'annonce : {{ $ad->name_ad }}</h2>
			{!! form_end($NewMessageForm) !!}
		</section>
	</div>
@endsection

@push('script')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush