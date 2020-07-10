@extends('app')

@section('title', 'Messagerie')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'mailbox')

@section('content')
	<div class="wrap">
		<section id="mailbox">
			<h1>@lang('Votre messagerie')</h1>

			@if(isset($conversations))
				<div id="mail_container">
	<!---------------------- All mails -------------------------->
					<div id="all_mails">
						@include('pages.mailbox_users', ['conversations' => $conversations, 'unread' => $unread, 'last_message' => $last_message])
					</div>

	<!---------------------- The mail --------------------------->
					<div id="the_mail">
						<div id="mail_header">

							<h2>{{ $conversation[0]->from_user_name }}</h2>

							<div id="mail_header_content">
								<div id="the_mail_more">
									<p id="seller">{{ $conversation[0]->ad_name }}</p>
								</div>
							</div>
						</div>

						<div id="the_mail_content">
							@if($messages->hasmorePages())
								<div>
									<a href="{{ $messages->nextPageUrl() }}">Voir les messages précédents</a>
								</div>
							@endif
							@foreach(array_reverse($messages->items()) as $message)
								@if($message->from->id == Auth::user()->id)
								    <p class="message right">{!! nl2br(e($message->content)) !!}</p>
								@else
								    <p class="message">{!! nl2br(e($message->content)) !!}</p>
								@endif
							@endforeach
							@if($messages->previousPageUrl())
								<div>
									<a href="{{ $messages->previousPageUrl() }}">Voir les messages suivants</a>
								</div>
							@endif
						</div>

						<form id="writing_area" action="" method="post">
							{{ csrf_field() }}

<!-- 							<label for="file_input">
								<img src="{{ asset('img/attach_mailbox.svg') }}" alt="">
							</label>
							<input type="file" id="file_input"> -->

							<input name="to" style="display: none" value="{{ $conversation[0]->to[0] }}">
							<input name="conv_id" style="display: none" value="{{ $conversation[0]->conv_id }}">
						
							<textarea name="content" id="" placeholder="Écrivez votre message" required="" wrap="" rows="4"></textarea>
							<input type="submit" value="Envoyer">
						</form>
					</div>
				</div>
			@else
				@lang('Aucune conversation')
			@endif
		</section>
	</div>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush