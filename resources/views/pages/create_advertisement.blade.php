@extends('app')

@section('title', 'Déposer une annonce')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'create_advertisement')

@section('content')

@if(session('message') != null)

<div class="msgConfirm">{{session('message')}}</div>

@endif

	<section class="wrap">
			<h1>@lang('Créer une annonce')</h1>

			{!! form_start($adForm) !!}

				<div class="form_container">

					<div class="divType">
						<label>Type</label>
						<select class="inpType" name="type" id="type" required>

							<option value="-">-</option>
							@if(Auth::user()->status == "PRO" || Auth::user()->status == "SOA")
								<option value="Cours">@lang('Cours')</option>
							@endif
							@if(Auth::user()->status == "PRO" || Auth::user()->status == "SOA")
								<option value="LookForJob">@lang('Recherche de travail')</option>
							@endif
							<option value="LookForPeople">@lang('Recherche d\'employé')</option>
							
						</select>
					</div>

					<div class="form-group Cours LookForJob LookForPeople">
						<label>@lang('Titre')</label>
						<input type="text" class="required" name="name" id="name" required>
					</div>

					<div class="form-group Cours LookForJob LookForPeople">
						<label>@lang('Description')</label>
						<textarea id="desc" name="desc" class="required" maxlength="10000" required></textarea>
					</div>

					<div class="form_content">

						<!-- Place -->
						<div class="divPlace form-group Cours LookForJob LookForPeople">
							<label>@lang('Lieu')</label>
							<input name="place" id="place" class="required" required>
							<span class="msgPlace">@lang('Veuillez sélectionner un des lieux suggéré ci-dessous.')</span>
							<div>
								<div class="loader searchCity" id="hidden"></div>
							</div>
							<div>
								<div class="suggestions"></div>
							</div>
							<input type="" name="place_lat" id="place_lat" required>
							<input type="" name="place_lng" id="place_lng" required>
						</div>

						<div class="form-group Cours">
							<label for="activity">@lang('Activité')</label>
							<input list="dataActivities" name="activity" id="activity" class="required" required>
							<datalist id="dataActivities">
								<option></option>
							</datalist>
						</div>

						<div class="form-group LookForPeople LookForJob">
							<label for="activity">@lang('Profession')</label>
							<input list="dataJob" name="job" id="job" class="required" required>
							<datalist id="dataJob">
								<option></option>
							</datalist>
						</div>

						<div class="form-group Cours">
							<label>@lang('Durée')</label>
							<select name="duration" id="duration" class="required" required>
								<option value="-">-</option>
								<option value="1h">@lang('1h')</option>
								<option value="2h">@lang('2h')</option>
								<option value="4h">@lang('4h')</option>
								<option value="half-day">@lang('Demi-journée')</option>
								<option value="day">@lang('Journée')</option>
							</select>
						</div>

						<div class="form-group Cours">
							<label>@lang('Nombre de personne(s)')</label>
							<select name="nbPers" id="nbPers" class="required" required>
								<option value="-">-</option>
								<option value="Individuel">@lang('Individuel')</option>
								<option value="Collectif">@lang('Collectif')</option>
								<option value="Individuel ou Collectif">@lang('Individuel ou Collectif')</option>
							</select>
						</div>

						<div class="divDispo form-group Cours LookForJob LookForPeople">
							<label>@lang('Disponibilité')</label>
							<div class="content">
								<div>
									<span>@lang('Du :')</span>
									<input type="date" name="date_from" id="date_from" class="required" required>
								</div>
								<div>
									<span>@lang('Au :')</span>
									<input type="date" name="date_to" id="date_to" class="required" required>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group Cours">
						<label>@lang('Prix')</label>
						<input type="number" name="price_one_h" id="price_one_h" class="required" required>
					</div>

					<div class="form-group LookForPeople">
						<label>@lang('Salaire')</label>
						<input type="number" name="salaire" id="salaire" class="required" required>
					</div>

					<div class="form-group LookForJob LookForPeople">
						<label>@lang('Poste logé')</label>
						<select name="loge" id="loge" class="required" required>
							<option value="-">@lang('-')</option>
							<option value="0">@lang('Non')</option>
							<option value="1">@lang('Oui')</option>
						</select>
					</div>

					<div class="form-group LookForJob LookForPeople">
						<label>@lang('Sexe')</label>
						<select name="sexe" id="sexe" class="required" required>
							<option value="-">@lang('-')</option>
							<option value="f">@lang('Femme')</option>
							<option value="h">@lang('Homme')</option>
						</select>
					</div>

					<div class="form-group LookForJob LookForPeople">
						<label>@lang('Urgent')</label>
						<select name="urgent" id="urgent" class="required" required>
							<option value="-">@lang('-')</option>
							<option value="0">@lang('Non')</option>
							<option value="1">@lang('Oui')</option>
						</select>
					</div>

					<div class="form-group Cours LookForJob LookForPeople">
						<div class="divPhone">
							<input type="checkbox" name="show_phone" id="show_phone">
							<label>@lang('Afficher votre numéro de téléphone sur l\'annonce')</label>
						</div>
					</div>

					{!! form_row($adForm->img) !!}
					{!! Session::has('msg') ? Session::get("msg") : '' !!}
					<span class="msgFiles" style="display: none">Vous ne pouvez télécharger qu'un maximum de 5 fichiers</span>

					<div class="form-group Cours LookForJob LookForPeople">
						<input type="submit" name="submit" id="submit" value="@lang('Déposer l\'annonce')"></submit>
					</div>
					<!-- Déposer lannonce -->
				</div>

			{!! form_end($adForm) !!}

	</section>
	
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush