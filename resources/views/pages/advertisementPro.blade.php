@extends('app')

@section('title', 'Annonces')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'advertisementPro')

@section('content')

@if(session('message') != null)

<div class="msgConfirm">{{session('message')}}</div>

@endif

	<div id="sectionContent"></div>

	<section>
		<div class="wrap">

<!---------------------- First Filters --------------------->
			<form action="/annoncesPro" class="first_filter">

				<div class="header_filter">
					<label>Type</label>
					<select name="type" id="type" class="js-filter">
						<option value="LookForJob">Recherche de travail</option>
						<option value="LookForPeople">Recherche d'employé</option>
					</select>
				</div>

				<div class="header_filter">
					<label for="place">LIEU</label>
					<input name="place" id="place" placeholder="Où voulez-vous partir ?" class="js-filter" type="text">
					<div class="loader searchCity" id="hidden"></div>
					<div>
						<div class="suggestions"></div>
					</div>
				</div>

				<div class="header_filter">
					<label for="date">DATES</label>
					<input name="date" type="date" id="date" class="js-filter">
				</div>
  
				<div class="divSearch">
					<i class="fa fa-search iconSearch"></i>
					<input type="submit" name="" value="">
				</div>

			</form>

			<div class="more_filter js-active js-more_filter">
				<img src="{{ asset('img/plus_filter.svg') }}" alt="">
				<p>Plus de filtres</p>
			</div>

			<div class="effaceFilters">
				<a href="/annoncesPro?type=LookForJob">Effacer tous les filtres</a>
			</div>

			<!-- More filters -->
			<form action="" class="first_filter_more js-first_filter_more">
				<div class="first_filter_more_content">
					<p>Choix du prestataire :</p>
					<input type="checkbox" id="organization" name="organization" checked>
					<label for="organization">Structure (école, ...)</label>
					<input type="checkbox" id="freelance" name="freelance" checked>
					<label for="freelance">Indépendant</label>
				</div>
				<div class="first_filter_more_content">
					<p>Profession :</p>
					<input list="dataJob" name="job" id="job" class="js-filter">
					<datalist id="dataJob">
						<option value="">Guide</option>
						<option value="">Moniteur</option>
					</datalist>
				</div>
				<div class="first_filter_more_content">
					<p>Poste logé</p>
					<select name="loge" id="loge" class="js-filter">
						<option value="">-</option>
						<option value="1">Oui</option>
						<option value="0">Non</option>
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

				<div class="divLeft">

					<!-- toutes les annonces -->
					<div class="advertisement_container all" id="js-container">
						
					</div>

					<div class="js-divLoading">
						@include('components.loading')
					</div>

					@if(Request::is('a/*'))
					<div class="divAllAdvert">
						<a href="/annonces">Voir toutes les annonces</a>
					</div>
					@endif

					<div class="divPage">

					</div>
				</div>

				<!-- Annonce en avant -->
				<div class="divRight">
					<div class="titre">
						<span>Mise en avant</span>
					</div>
					<div class="advertisement_container premium" id="js-container-premium"></div>
				</div>
				

			</div>
		</div>
	</section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush