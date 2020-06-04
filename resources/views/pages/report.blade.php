@extends('app')

@section('title', 'Signaler')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'report')

@section('content')

	<div class="wrap report">

		<form method="post" action="{{url('annonce/report')}}"> {{ csrf_field() }}

			<div>
				<label>Motif :</label>
				<div>
					<input type="radio" name="motif" value="Fraude" required>
					<label>Fraude</label>
				</div>
				<div>
					<input type="radio" name="motif" value="Contenue inapproprié" required>
					<label>Contenue inapproprié</label>
				</div>				
				<div>
					<input type="radio" name="motif" value="Autre" required>
					<label>Autre</label>
				</div>
			</div>
			
			<div class="msg">
				<label>Message :</label>
				<textarea name="content"></textarea>
			</div>
			
			<input type="submit" value="Signaler l'annonce">

		</form>

	</div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
