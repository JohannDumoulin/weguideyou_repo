@extends('app')

@section('title', 'Annonces')

@push('style')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


@endpush

@section('attribute', 'advertisement')

@section('content')

@if(session('message') != null)

<div class="msgConfirm">{{session('message')}}</div>

@endif

	<div id="sectionContent"></div>

	<section>
		<div class="wrap">

<!---------------------- First Filters --------------------->
			<form action="" class="first_filter">
				<div class="header_filter">
					<label for="activity">ACTIVITÉ</label>
					<select name="activity" id="activities" class="js-filter js-example-basic-multiple" multiple>
					</select>
				</div>
				<div class="header_filter">
					<label for="place">LIEU</label>
					<select name="place" id="place" class="js-filter js-example-basic">
					</select>
				</div>
				<div class="header_filter">
					<label for="dates">DATES</label>
<!-- 					<select name="dates" id="dates" class="js-filter">
						<option value="">Quand voulez vous partir ?</option>
					</select> -->
					<input type="date" id="date" class="js-filter">
				</div>
				<!--  
				<div class="header_filter">
					<label for="search">RECHERCHE</label>
					<select name="search" id="search" class="js-filter">
						<option value="">Que cherchez vous ?</option>
					</select>
				</div>-->
				<img src="{{ asset('img/search_logo.svg') }}" alt="">
			</form>
			
			<div class="more_filter js-active js-more_filter">
				<img src="{{ asset('img/plus_filter.svg') }}" alt="">
				<p>Plus de filtres</p>
			</div>

			<!-- More filters -->
			<form action="" class="first_filter_more js-first_filter_more">
				<div class="first_filter_more_content">
					<p>Choix du prestataire :</p>
					<input type="checkbox" id="organization" name="organization" checked>
					<label for="organization">Structure (école, ...)</label>
					<input type="checkbox" id="freelance" name="freelance">
					<label for="freelance">Indépendant</label>
				</div>
				<div class="first_filter_more_content">
					<p>Nombre de personne(s) :</p>
					<select name="nb_pers" id="nb_pers" class="js-filter">
						<option value="">-</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7+">7+</option>
					</select>
				</div>
				<div class="first_filter_more_content">
					<p>Durée :</p>
					<select name="duration" id="duration" class="js-filter">
						<option value="">-</option>
						<option value="1h">1h</option>
						<option value="2h">2h</option>
						<option value="4h">4h</option>
						<option value="half-day">Demi-journée</option>
						<option value="day">Journée complète</option>
					</select>
				</div>

				<div class="less_filter js-less_filter">
					<img src="{{ asset('img/minus_filter.svg') }}" alt="">
					<p>Moins de filtres</p>
				</div>
			</form>
			
<!---------------------- Second Filters -------------------->
			<div id="second_filter">
				<div class="second_filter_child left">
					<p><span class="nbrAdverts"></span> Annonce(s) :</p>
					<div class="advertisement all">

						<input type="radio" name="t" checked class="js-inpTout">
						<p>Toutes les annonces</p>

					</div>
					<div class="advertisement urgent">

						<input type="radio" name="t" class="js-inpUrgent">
						<svg id="filter_skier" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0)">
							<path d="M19.0805 18.7104C18.7836 18.6308 18.4783 18.8071 18.3988 19.104C18.0528 20.3953 16.7207 21.1644 15.4294 20.8184L9.64724 19.2691L13.5189 16.2703C14.0197 15.8771 14.2513 15.2455 14.1233 14.6224C13.9957 13.9986 13.5344 13.5088 12.9197 13.344L12.8877 13.3355L15.5768 11.4239C16.1005 11.0504 16.3652 10.4002 16.251 9.76734C16.1367 9.13411 15.6612 8.61737 15.0397 8.45084L9.28066 6.90771C8.39124 6.66939 7.47379 7.19912 7.23547 8.08854C6.99715 8.97796 7.52688 9.89537 8.41627 10.1337L10.7518 10.7595L8.06277 12.6711C7.53865 13.0448 7.27423 13.6953 7.38903 14.3275C7.50307 14.9608 7.97832 15.4776 8.59984 15.6442L8.8144 15.7017L7.14806 16.9804C7.14647 16.9816 7.14487 16.9828 7.14326 16.9841C6.68772 17.3416 6.4686 17.8903 6.50987 18.4285L1.0317 16.9606C0.734756 16.881 0.429518 17.0572 0.349953 17.3542C0.270388 17.6511 0.446618 17.9564 0.743557 18.0359L15.1413 21.8938C17.0255 22.3987 18.9692 21.2764 19.4741 19.3922C19.5537 19.0952 19.3775 18.79 19.0805 18.7104Z" fill="#29ABE2"/>
							<path d="M17.8538 3.93794C16.6047 3.60324 15.3161 4.34717 14.9814 5.59629C14.6467 6.84545 15.3907 8.13403 16.6398 8.46874C17.889 8.80345 19.1775 8.05948 19.5122 6.81032C19.8469 5.56119 19.103 4.27265 17.8538 3.93794Z" fill="#29ABE2"/>
							</g>
							<defs>
							<clipPath id="clip0">
							<rect x="5" width="19" height="19" transform="rotate(15 5 0)" fill="white"/>
							</clipPath>
							</defs>
						</svg>


						<p>Urgentes</p>
					</div>
				</div>
				<div class="second_filter_child right">					
					<p>Trier par :</p>
					<select name="" id="" class="js-order">
						<option value="plusRecent">Plus récentes</option>
						<option value="plusAncien">Plus anciennes</option>
						<option value="prixCroissant">Prix croissants</option>
						<option value="prixDecroissant">Prix décroissants</option>
					</select>
				</div>
			</div>


<!-------------------- Advertisement List --------------------->


			<div id="advertisement_section">

				<div>
					<div class="advertisement_container all" id="js-container">
						@include('components.loading')
					</div>

					@if(Request::is('a/*'))
					<div class="divAllAdvert">
						<a class="bonjour" href="/annonces">Voir toutes les annonces</a>
					</div>
					@endif

				</div>

				<div class="advertisement_container premium">
					<div class="advertisement_content_premium">
						<div class="profil_picture_container_premium">
							<img src="{{ asset('img/advertisement.jpg') }}" alt="">
						</div>
						<div class="infos_premium">
							<h3>Cours Snowboard / Courchevel 1850</h3>
							<div class="info_content_premium">
								<p class="price">450€</p>
								<p>ESF</p>
								<img src="{{ asset('img/esf.png') }}" alt="">
							</div>
							<p class="desc">L’ESF vous propose des cours de ski et snowboard, en groupe ou individuel. 1h, 2h, la demi-journée ou la journée complète à partir de 450 € par personne.</p>
						</div>

						<svg class="picto like" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.5 22.6648C12.1441 22.6648 11.8009 22.541 11.5335 22.3162C10.5236 21.4684 9.54988 20.6717 8.69082 19.9689L8.68643 19.9653C6.16778 17.9048 3.99284 16.1254 2.47955 14.3725C0.787924 12.4129 0 10.5549 0 8.52521C0 6.55316 0.704382 4.73383 1.98326 3.4021C3.27739 2.05463 5.05313 1.3125 6.98393 1.3125C8.42703 1.3125 9.74863 1.75049 10.9119 2.6142C11.499 3.05017 12.0311 3.58374 12.5 4.20612C12.969 3.58374 13.5009 3.05017 14.0882 2.6142C15.2515 1.75049 16.5731 1.3125 18.0162 1.3125C19.9468 1.3125 21.7227 2.05463 23.0169 3.4021C24.2958 4.73383 25 6.55316 25 8.52521C25 10.5549 24.2122 12.4129 22.5206 14.3723C21.0073 16.1254 18.8326 17.9046 16.3143 19.9649C15.4537 20.6688 14.4785 21.4667 13.4662 22.3165C13.199 22.541 12.8557 22.6648 12.5 22.6648ZM6.98393 2.71838C5.46702 2.71838 4.07352 3.29956 3.05976 4.35498C2.03094 5.42633 1.46427 6.90729 1.46427 8.52521C1.46427 10.2323 2.12516 11.759 3.60698 13.4755C5.03921 15.1346 7.16952 16.8774 9.6361 18.8954L9.64067 18.899C10.503 19.6046 11.4805 20.4044 12.4979 21.2584C13.5214 20.4027 14.5004 19.6016 15.3644 18.895C17.8308 16.877 19.9609 15.1346 21.3932 13.4755C22.8748 11.759 23.5357 10.2323 23.5357 8.52521C23.5357 6.90729 22.969 5.42633 21.9402 4.35498C20.9266 3.29956 19.5329 2.71838 18.0162 2.71838C16.905 2.71838 15.8847 3.0575 14.9839 3.7262C14.1811 4.32239 13.6219 5.07605 13.294 5.60339C13.1254 5.87457 12.8286 6.03644 12.5 6.03644C12.1713 6.03644 11.8746 5.87457 11.7059 5.60339C11.3783 5.07605 10.819 4.32239 10.016 3.7262C9.1152 3.0575 8.09496 2.71838 6.98393 2.71838Z" fill="#C4C4C4"/>
						</svg>
						<svg class="picto urgent" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0)">
							<path d="M19.0805 18.7104C18.7836 18.6309 18.4783 18.8071 18.3988 19.104C18.0528 20.3953 16.7207 21.1644 15.4294 20.8184L9.64724 19.2691L13.5189 16.2704C14.0197 15.8771 14.2513 15.2456 14.1233 14.6224C13.9957 13.9986 13.5344 13.5088 12.9197 13.3441L12.8877 13.3355L15.5768 11.4239C16.1005 11.0504 16.3652 10.4002 16.251 9.76737C16.1367 9.13414 15.6612 8.6174 15.0397 8.45087L9.28066 6.90774C8.39124 6.66942 7.47379 7.19915 7.23547 8.08857C6.99715 8.97799 7.52688 9.8954 8.41627 10.1337L10.7518 10.7595L8.06277 12.6711C7.53865 13.0448 7.27423 13.6953 7.38903 14.3276C7.50307 14.9608 7.97832 15.4777 8.59984 15.6442L8.8144 15.7017L7.14806 16.9804C7.14647 16.9816 7.14487 16.9829 7.14326 16.9841C6.68772 17.3416 6.4686 17.8903 6.50987 18.4285L1.0317 16.9606C0.734756 16.881 0.429518 17.0573 0.349953 17.3542C0.270388 17.6512 0.446618 17.9564 0.743557 18.036L15.1413 21.8938C17.0255 22.3987 18.9692 21.2765 19.4741 19.3922C19.5537 19.0952 19.3775 18.79 19.0805 18.7104Z" fill="#29ABE2"/>
							<path d="M17.8538 3.93797C16.6047 3.60327 15.3161 4.3472 14.9814 5.59632C14.6467 6.84548 15.3907 8.13406 16.6398 8.46877C17.889 8.80348 19.1775 8.05951 19.5122 6.81035C19.8469 5.56122 19.103 4.27268 17.8538 3.93797Z" fill="#29ABE2"/>
							</g>
							<defs>
							<clipPath id="clip0">
							<rect x="5" width="19" height="19" transform="rotate(15 5 0)" fill="white"/>
							</clipPath>
							</defs>
						</svg>
					</div>

					<div class="advertisement_content_premium">
						<div class="profil_picture_container_premium">
							<img src="{{ asset('img/advertisement.jpg') }}" alt="">
						</div>
						<div class="infos_premium">
							<h3>Cours Snowboard / Courchevel 1850</h3>
							<div class="info_content_premium">
								<p class="price">450€</p>
								<p>ESF</p>
								<img src="{{ asset('img/esf.png') }}" alt="">
							</div>
							<p class="desc">L’ESF vous propose des cours de ski et snowboard, en groupe ou individuel. 1h, 2h, la demi-journée ou la journée complète à partir de 450 € par personne.</p>
						</div>

						<svg class="picto like" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.5 22.6648C12.1441 22.6648 11.8009 22.541 11.5335 22.3162C10.5236 21.4684 9.54988 20.6717 8.69082 19.9689L8.68643 19.9653C6.16778 17.9048 3.99284 16.1254 2.47955 14.3725C0.787924 12.4129 0 10.5549 0 8.52521C0 6.55316 0.704382 4.73383 1.98326 3.4021C3.27739 2.05463 5.05313 1.3125 6.98393 1.3125C8.42703 1.3125 9.74863 1.75049 10.9119 2.6142C11.499 3.05017 12.0311 3.58374 12.5 4.20612C12.969 3.58374 13.5009 3.05017 14.0882 2.6142C15.2515 1.75049 16.5731 1.3125 18.0162 1.3125C19.9468 1.3125 21.7227 2.05463 23.0169 3.4021C24.2958 4.73383 25 6.55316 25 8.52521C25 10.5549 24.2122 12.4129 22.5206 14.3723C21.0073 16.1254 18.8326 17.9046 16.3143 19.9649C15.4537 20.6688 14.4785 21.4667 13.4662 22.3165C13.199 22.541 12.8557 22.6648 12.5 22.6648ZM6.98393 2.71838C5.46702 2.71838 4.07352 3.29956 3.05976 4.35498C2.03094 5.42633 1.46427 6.90729 1.46427 8.52521C1.46427 10.2323 2.12516 11.759 3.60698 13.4755C5.03921 15.1346 7.16952 16.8774 9.6361 18.8954L9.64067 18.899C10.503 19.6046 11.4805 20.4044 12.4979 21.2584C13.5214 20.4027 14.5004 19.6016 15.3644 18.895C17.8308 16.877 19.9609 15.1346 21.3932 13.4755C22.8748 11.759 23.5357 10.2323 23.5357 8.52521C23.5357 6.90729 22.969 5.42633 21.9402 4.35498C20.9266 3.29956 19.5329 2.71838 18.0162 2.71838C16.905 2.71838 15.8847 3.0575 14.9839 3.7262C14.1811 4.32239 13.6219 5.07605 13.294 5.60339C13.1254 5.87457 12.8286 6.03644 12.5 6.03644C12.1713 6.03644 11.8746 5.87457 11.7059 5.60339C11.3783 5.07605 10.819 4.32239 10.016 3.7262C9.1152 3.0575 8.09496 2.71838 6.98393 2.71838Z" fill="#C4C4C4"/>
						</svg>
						<svg class="picto urgent" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0)">
							<path d="M19.0805 18.7104C18.7836 18.6309 18.4783 18.8071 18.3988 19.104C18.0528 20.3953 16.7207 21.1644 15.4294 20.8184L9.64724 19.2691L13.5189 16.2704C14.0197 15.8771 14.2513 15.2456 14.1233 14.6224C13.9957 13.9986 13.5344 13.5088 12.9197 13.3441L12.8877 13.3355L15.5768 11.4239C16.1005 11.0504 16.3652 10.4002 16.251 9.76737C16.1367 9.13414 15.6612 8.6174 15.0397 8.45087L9.28066 6.90774C8.39124 6.66942 7.47379 7.19915 7.23547 8.08857C6.99715 8.97799 7.52688 9.8954 8.41627 10.1337L10.7518 10.7595L8.06277 12.6711C7.53865 13.0448 7.27423 13.6953 7.38903 14.3276C7.50307 14.9608 7.97832 15.4777 8.59984 15.6442L8.8144 15.7017L7.14806 16.9804C7.14647 16.9816 7.14487 16.9829 7.14326 16.9841C6.68772 17.3416 6.4686 17.8903 6.50987 18.4285L1.0317 16.9606C0.734756 16.881 0.429518 17.0573 0.349953 17.3542C0.270388 17.6512 0.446618 17.9564 0.743557 18.036L15.1413 21.8938C17.0255 22.3987 18.9692 21.2765 19.4741 19.3922C19.5537 19.0952 19.3775 18.79 19.0805 18.7104Z" fill="#29ABE2"/>
							<path d="M17.8538 3.93797C16.6047 3.60327 15.3161 4.3472 14.9814 5.59632C14.6467 6.84548 15.3907 8.13406 16.6398 8.46877C17.889 8.80348 19.1775 8.05951 19.5122 6.81035C19.8469 5.56122 19.103 4.27268 17.8538 3.93797Z" fill="#29ABE2"/>
							</g>
							<defs>
							<clipPath id="clip0">
							<rect x="5" width="19" height="19" transform="rotate(15 5 0)" fill="white"/>
							</clipPath>
							</defs>
						</svg>
					</div>

				</div>
			</div>
		</div>
	</section>
@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script type="text/javascript">
		$('.js-example-basic-multiple').select2();
		$('.js-example-basic').select2();
		$("#activities").select2({
		    placeholder: "Que voulez-vous faire ?",
		    allowClear: true
		});
		$("#place").select2({
		    placeholder: "Où voulez-vous partir ?",
		    allowClear: true
		}); 
	</script>

    <script src="{{asset('js/app.js')}}"></script>
  
@endpush