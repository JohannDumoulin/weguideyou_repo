@extends('app')

@section('title', 'Messagerie')

@push('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'mailbox')

@section('content')
	<div class="wrap">
		<section id="mailbox">
			<h1>Votre messagerie</h1>

			<div id="mail_container">
<!---------------------- All mails -------------------------->
				<div id="all_mails">
					<div class="mail_content">
						<div class="advertisement_picture_container">
							<img src="{{ asset('img/advertisement.jpg') }}" alt="">
						</div>
						<div class="advertisement_content">
							<div class="seller_infos">
								<p>ESF</p>
								<img src="{{ asset('img/esf.png') }}" alt="">
							</div>
							<p class="title">Cours Snowboard / Courchevel 1850</p>
							<p class="last_msg">20h24 Vous : Oui bien sûr pas...</p>
						</div>
					</div>
					<div class="mail_content">
						<div class="advertisement_picture_container">
							<img src="{{ asset('img/advertisement.jpg') }}" alt="">
						</div>
						<div class="advertisement_content">
							<div class="seller_infos">
								<p>ESF</p>
								<img src="{{ asset('img/esf.png') }}" alt="">
							</div>
							<p class="title">Cours Snowboard / Courchevel 1850</p>
							<p class="last_msg">20h24 Vous : Oui bien sûr pas...</p>
						</div>
					</div>
					<div class="mail_content">
						<div class="advertisement_picture_container">
							<img src="{{ asset('img/advertisement.jpg') }}" alt="">
						</div>
						<div class="advertisement_content">
							<div class="seller_infos">
								<p>ESF</p>
								<img src="{{ asset('img/esf.png') }}" alt="">
							</div>
							<p class="title">Cours Snowboard / Courchevel 1850</p>
							<p class="last_msg">20h24 Vous : Oui bien sûr pas...</p>
						</div>
					</div>
				</div>

<!---------------------- The mail --------------------------->
				<div id="the_mail">
					<div id="mail_header">
						<h2>Cours Snowboard / Courchevel 1850</h2>
						<div id="mail_header_content">
							<div id="the_mail_more">
								<p id="seller">ESF</p>
								<p id="price">450 €</p>
							</div>
							<img src="{{ asset('img/esf.png') }}" alt="">
						</div>
					</div>

					<div id="the_mail_content">
						<div class="msg_infos">
							<p class="day">20 Juin 2020</p>
							<p class="date">17h45</p>
						</div>
						<p class="message right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut quis iaculis est. Vestibulum facilisis ullamcorper aliquam. Praesent ac ipsum risus. Vivamus mauris nibh, aliquam eget cursus sed, bibendum sit amet mauris. Suspendisse bibendum tellus id aliquam maximus. Fusce ultricies, leo ornare ultrices lobortis, nibh odio blandit quam, a ultricies lectus arcu ut mauris.</p>
						
						<p class="message left">Pellentesque dignissim, quam ut auctor iaculis, nulla mauris bibendum nisi, ut euismod eros eros bibendum tellus. Etiam at dignissim nulla. Sed sagittis imperdiet nisl, non consequat erat egestas in. Nullam ultrices nulla nec orci rhoncus posuere. Morbi orci neque, suscipit id ligula sit amet, laoreet ullamcorper enim.</p>
						
						<p class="message left">Aenean imperdiet tortor risus, id hendrerit.</p>
						
						<p class="message right">Aenean ac orci vehicula, cursus sapien sit amet, malesuada felis. Nulla placerat, arcu eget suscipit laoreet, turpis turpis imperdiet quam, et laoreet quam est eu libero.</p>
					</div>

					<form id="writing_area">
						<label for="file_input">
							<img src="{{ asset('img/attach_mailbox.svg') }}" alt="">
						</label>
						<input type="file" id="file_input">
					
						<textarea name="" id="" placeholder="Écrivez votre message" required="" wrap="" rows="4"></textarea>
						<input type="submit" value="Envoyer">
					</form>
				</div>
			</div>
		</section>
	</div>
@endsection

@push('script')
	<!-- Google Map -->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXqNHvLl6Xm9StLAO9WoYv3r-H_pVcr_M&callback=initMap"></script>
    <script src="{{asset('js/app.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush