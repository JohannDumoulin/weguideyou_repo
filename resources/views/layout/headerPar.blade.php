 
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
	<h1>Des guides et moniteurs à portée de clic</h1>
	<div id="select">
		<a href="/">Je suis un professionnel</a>
		<a href="/particulier">Je suis un particulier</a>
	</div>
	<form action="/annonces" class="first_filter">

		<input name="type" value="Cours" style="display: none">

		<div class="header_filter">
			<label for="activity">ACTIVITÉ</label>
			<input list="dataActivities" name="activity" id="activity" placeholder="Que voulez-vous faire ?" class="js-filter">
			<datalist id="dataActivities">
				<option></option>
			</datalist>
		</div>

		<div class="header_filter autocomplete">
			<label for="place">LIEU</label>
			<input list="dataPlaces" name="place" id="place" placeholder="Où voulez-vous partir ?" class="js-filter">
		</div>

		<div class="header_filter">
			<label for="dates">DATES</label>
			<input type="date" id="date" name="date" class="js-filter">
		</div>

		<div class="divSearch">
			<i class="fa fa-search iconSearch"></i>
			<input type="submit" name="" value="">
		</div>
	</form>

	<div id="bottom"></div>
	
</header>