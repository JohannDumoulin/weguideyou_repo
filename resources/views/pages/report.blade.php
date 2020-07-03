@extends('app')

@section('title', 'Signaler')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'report')

@section('content')

	<div class="wrap report">

		<form method="post" action="{{url('/report')}}"> {{ csrf_field() }}

			<div>

				<input name="id" value={{ $id }} style="display:none">

				<label>@lang('Motif :')</label>
				<div>
					<input type="radio" name="motif" value="Fraude" required>
					<label>@lang('Fraude')</label>
				</div>
				<div>
					<input type="radio" name="motif" value="Contenue inapproprié" required>
					<label>@lang('Contenue inapproprié')</label>
				</div>				
				<div>
					<input type="radio" name="motif" value="Autre" required>
					<label>@lang('Autre')</label>
				</div>
			</div>
			
			<div class="msg">
				<label>@lang('Message :')</label>
				<textarea name="content"></textarea>
			</div>
			
			<input type="submit" value="@lang('Signaler l\'annonce')">

		</form>

	</div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
