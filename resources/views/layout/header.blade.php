
<header>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-success">
            {{Session::get('error')}}
        </div>
    @endif
	<h1>@lang('Des guides et moniteurs à portée de clic')</h1>
	<div id="select">
		<a href="/">@lang('Je suis un professionnel')</a>
		<a href="/particulier">@lang('Je suis un particulier')</a>
	</div>
	<form action="/annoncesPro" class="first_filter">

		<div class="header_filter">
			<label>@lang('TYPE')</label>
			<select name="type">
				<option value="LookForJob">@lang('Recherche de travail')</option>
				<option value="LookForPeople">@lang('Recherche d\'employé')</option>
			</select>
		</div>

		<div class="header_filter autocomplete">
			<label for="place">@lang('LIEU')</label>
			<input name="place" id="place" placeholder="@lang('Où rechercher-vous ?')" class="js-filter">
			<div>
				<div class="loader searchCity" id="hidden"></div>
			</div>
			<div>
				<div class="suggestions"></div>
			</div>
		</div>

		<div class="header_filter">
			<label for="dates">@lang('DATES')</label>
			<input type="date" id="date" name="date" class="js-filter">
		</div>

		<div class="divSearch">
			<i class="fa fa-search iconSearch"></i>
			<input type="submit" name="" value="">
		</div>
	</form>

	<div id="bottom"></div>
	
</header>