 <!-- Map -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{asset('css/app.css')}}">



<div class="annonce">

	<div class="modalAnnonce" id={{ $advert->id }}>

	    <section class="icons">
	        <div class="wrap">
	            @include('components.buttonFav', ['id' => $advert->id ])
	            <i class="fa fa-times js-toggleAnnonce"></i>
	        </div>
	    </section>

	    <section class="titres">
	        <div class="wrap">
	            <div class="btnResa">
	                <h1 id="ad-title">{{ $advert->name }}</h1>
	                @include('components.buttonLink', ['link' => '#'], ['text' => 'Réserver'])
	            </div>   
	            <h2>
	            	<span id="ad-price">{{ $advert->price_one_h }}</span>€ / h
		        </h2>
	            <div class="item">
					<i class="fa fa-map-marker"></i>
					<h3 id="ad-location">{{ $advert->place }}</h3>

					<p class="lat" style="display: none">{{ $advert->place_lat }}</p>
					<p class="lng" style="display: none">{{ $advert->place_lng }}</p>

	            </div>
	            <div class="item">
					<i class="fa fa-calendar"></i>
					<h3>
						<span id="ad-dateStart">{{ $advert->date_from }}</span> - <span id="ad-dateEnd">{{ $advert->date_to }}</span>
					</h3>
	            </div>
	        </div>
	    </section>

	    <section class="images">

            <div class="main-carousel">

            	@foreach ($imgs as $img)

                <div class="carousel-cell">
                	<img src={{ $img }}>
                </div>

                @endforeach

            </div>
            
	    </section>

	    <section class="description">
	        <div class="wrap">
	            <label>Description</label>
	            <p id="ad-description">{{ $advert->desc }}</p>
	        </div>
	    </section>

	    <section class="detail">
	        <div class="wrap">

	        	@if($advert->activity != false)
		        <div>
	                <i class="fa fa-users"></i>
	                <label>Activité</label>
	                <p id="ad-nb_pers">{{ $advert->activity }}</p>
	            </div> 
	            @endif 
	            
	            @if($advert->nbPers != false)
	            <div>
	                <i class="fa fa-users"></i>
	                <label>Type de cours</label>
	                <p id="ad-nb_pers">{{ $advert->nbPers }}</p>
	            </div>  
	            @endif              

				@if($advert->duration != false)
	            <div>
					<i class="fa fa-calendar"></i>
	                <label>Durée</label>
	                <p id="ad-duration">{{ $advert->duration }}</p>
	            </div>
	            @endif 

	            @if($advert->loge != false)
		        <div>
	                <i class="fa fa-users"></i>
	                <label>Poste logé</label>
	                @if($advert->loge == 1)
	                	<p id="ad-nb_pers">Oui</p>
	                @else
						<p id="ad-nb_pers">Oui</p>
					@endif
	            </div> 
	            @endif 

	            @if($advert->salaire != false)
	            <div>
	                <i class="fa fa-users"></i>
	                <label>Salaire</label>
	                <p id="ad-salaire">{{ $advert->salaire }} €</p>
	            </div>  
	            @endif 

	            @if($advert->job != false)
	            <div>
	                <i class="fa fa-users"></i>
	                <label>Profession</label>
	                <p id="ad-salaire">{{ $advert->job }}</p>
	            </div> 
	            @endif 

	        </div>
	    </section>

	    <section class="profil">
	    	<div class="wrap">

	    		<div class="img" style="background-image: url('img/user-circle-solid-white.svg');"></div>

	    		<div class="txt">
	        		<p>
	        			<a href=/profil/{{ $user->id }} class="nom">{{ $user->name }}</a>, <span>{{ $user->age }}</span> ans.
	        		</p>      
	          		<p>
	        			<span>{{ $user->job }}</span> - <span>{{ $user->city }}</span>
	        		</p>
	          		<p>
	        			<i class="fa fa-globe"></i>
	        			<span>{{ $user->language }}</span>
	        		</p>
	        		@if($advert->phone_bool == 1)
		        	<p>
		    			<i class="fa fa-phone"></i>
		    			<span>{{ $user->phone }}</span>
		    		</p>
					@endif

	    		</div>
	    	</div>
	    </section>

	    <section class="map">
	    	<div class="wrap titre">
		    	<i class="fa fa-map-marker"></i>
		    	<label><span class="location">{{ $advert->place }} </span> :</label>
	    	</div>
	    	<div id="js-map">
	    		<div id='mapid'></div>
	    	</div>
	    </section>

	    <div class="signal">
	    	<a href=/report/{{ $advert->id }} id="btnReport">Signaler l'annonce</a>
	    </div>

	</div>

	{{ $advert->created_at }}

	<div class="reste js-toggleAnnonce"></div>

</div>