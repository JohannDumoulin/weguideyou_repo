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
				<p>Envoyer un message à {{ $user->name }}</p>
				<p>A propos de l'annonce : {{ $ad->name }}</p>

				<input name="to" style="display: none" value="{{ $user->id }}">

				<textarea name="content" required=""></textarea>
				<button type="submit" class="buttonLink">Envoyer</button>
			{!! form_end($NewMessageForm) !!}

		</section>
	</div>
@endsection

@push('script')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush