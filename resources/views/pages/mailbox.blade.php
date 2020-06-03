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
						
					</div>

					<div id="writing_area">
						
					</div>
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