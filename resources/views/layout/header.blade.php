<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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
	<form action="" class="first_filter">

<!-- 		<div class="header_filter">
			<label for="activity">ACTIVITÉ</label>
			<select name="activity" id="activity">
				<option value="">Que voulez vous faire ?</option>
				<option value="">Ski</option>
				<option value="">Snowboard</option>
			</select>
		</div>
		<div class="header_filter">
			<label for="place">LIEU</label>
			<select name="place" id="place">
				<option value="">Où voulez vous aller ?</option>
			</select>
		</div>
		<div class="header_filter">
			<label for="dates">DATES</label>
			<select name="dates" id="dates">
				<option value="">Quand voulez vous partir ?</option>
			</select>
		</div>
		<img src="{{ asset('img/search_logo.svg') }}" alt=""> -->
	
		<div class="header_filter">
			<label for="activity">ACTIVITÉ</label>
			<select name="activity" id="activities" class="js-filter js-example-basic">
				<option></option>
			</select>
		</div>
		<div class="header_filter">
			<label for="place">LIEU</label>
			<select name="place" id="place" class="js-filter js-example-basic">
			</select>
		</div>
		<div class="header_filter">
			<label for="dates">DATES</label>
			<input name="dateStart" type="date" id="date" class="js-filter">
		</div>
		
		<img src="{{ asset('img/search_logo.svg') }}" alt="">

	</form>

	<div id="bottom"></div>
	
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
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
