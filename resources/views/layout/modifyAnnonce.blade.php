 <!-- Map -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="annonce modify">

	<div class="modalAnnonce" id={{ $advert->id }}>

	    <section class="icons">
	        <div class="wrap">
	        	<button class="js-btnSaveModif">Enregister les modifications</button>
	            <i class="fa fa-times js-toggleAnnonce"></i>
	        </div>
	    </section>
	
	    <section class="titres">
	        <div class="wrap">
	            <div class="btnResa">
	                <input id="ad-title" value="{{ $advert->name }}"></input>
	            </div>   

	            <input id="ad-price" value="{{ $advert->price_one_h }}"></input>€ / h

	            <div class="item">
					<i class="fa fa-map-marker"></i>
					<input id="ad-place" value="{{ $advert->place }}"></input>
	            </div>
	            <div class="item">
					<i class="fa fa-calendar"></i>
						
					<input id="ad-dateStart" value="{{ $advert->date_from }}"></input> - <input id="ad-dateEnd" value="{{ $advert->date_to }}"></input>
	            </div>
	        </div>
	    </section>

	    <section class="images modifImg">

        	@foreach ($imgs as $img)

			<input class="ad-img" value={{ $img }}>

            @endforeach

	    </section>


	    <section class="description">
	        <div class="wrap">
	            <label>Description</label>
	            <textarea id="ad-description">{{$advert->desc }}</textarea>
	        </div>
	    </section>

	    <section class="detail">
	        <div class="wrap">              

	            @if($advert->activity != false)
		        <div>
	                <i class="fas fa-running"></i>
	                <label>Activité</label>
	                <input id="ad-activity" value={{ $advert->activity }}></input>
	            </div> 
	            @endif 
	            
	            @if($advert->nbPers != false)
	            <div>
	                <i class="fa fa-users"></i>
	                <label>Type de cours</label>
	                <input id="ad-nbPers" value={{ $advert->nbPers }}></input>
	            </div>  
	            @endif              

				@if($advert->duration != false)
	            <div>
					<i class="fa fa-calendar"></i>
	                <label>Durée</label>
	                <select id="ad-duration">
	                	<option value="{{ $advert->duration }}" selected disabled hidden>{{ $advert->duration }}</option>
						<option value="1h">1h</option>
						<option value="2h">2h</option>
						<option value="4h">4h</option>
						<option value="Demi-journée">Demi-journée</option>
						<option value="Toute la journée">Journée</option>
	                </select>
	            </div>
	            @endif 

	            @if($advert->loge != false)
		        <div>
	                <i class="fas fa-house-user"></i>
	                <label>Poste logé</label>
	                <select id="ad-loge">
	    		     	@if($advert->loge == 1)
		                	<option value="{{ $advert->loge }}" selected disabled hidden>Oui</option>
		                @else
							<option value="{{ $advert->loge }}" selected disabled hidden>Non</option>
						@endif
	                	<option value="1">Oui</option>
	                	<option value="0">Non</option>
	                </select>
	            </div> 
	            @endif 

	            @if($advert->salaire != false)
	            <div>
	                <i class="far fa-money-bill-alt"></i>
	                <label>Salaire</label>
	                <input id="ad-salaire" value={{ $advert->salaire }}></input> €
	            </div>  
	            @endif 

	            @if($advert->job != false)
	            <div>
	                <i class="fas fa-running"></i>
	                <label>Profession</label>
	                <input id="ad-job" value={{ $advert->job }}></input>
	            </div> 
	            @endif

	        </div>
	    </section>

	</div>

	<div class="reste js-toggleAnnonce"></div>

</div>