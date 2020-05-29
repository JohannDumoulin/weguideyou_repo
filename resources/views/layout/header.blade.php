<header>
	<h1>Des guides et moniteurs à portée de clic</h1>
	<div id="select">
		<a href="#">Je suis un professionnel</a>
		<a href="#">Je suis un particulier</a>
	</div>
	<form action="">
		<div class="header_filter">
			<label for="activity">ACTIVITÉ</label>
			<select name="" id="activity">
				<option value="">Que voulez vous faire ?</option>
				<option value="">Ski</option>
				<option value="">Snowboard</option>
			</select>
		</div>
		<div class="header_filter">
			<label for="place">LIEU</label>
			<select name="" id="place">
				<option value="">Où voulez vous aller ?</option>
			</select>
		</div>
		<div class="header_filter">
			<label for="dates">DATES</label>
			<select name="" id="dates">
				<option value="">Quand voulez vous partir ?</option>
			</select>
		</div>
		<div class="header_filter">
			<label for="search">RECHERCHE</label>
			<select name="" id="search">
				<option value="">Que cherchez vous ?</option>
			</select>
		</div>
		<img src="{{ asset('img/search_logo.svg') }}" alt="">
		<div id="bottom"></div>
	</form>
</header>