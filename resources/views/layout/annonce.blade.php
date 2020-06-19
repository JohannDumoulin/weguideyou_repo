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
                <div class="carousel-cell">
                	<img src="https://www.glisshop.com/Imagestorage/images/0/0/5dd4feb744785_5cadff0d8faa9_ski_alpin_piste.jpg">
                </div>
                <div class="carousel-cell">
                	<img src="https://img.redbull.com/images/c_crop,x_2235,y_0,h_3777,w_3022/c_fill,w_860,h_1075/q_auto,f_auto/redbullcom/2015/09/28/1331750334543_6/construire-piste-ski-val-disere-france">
                </div>
                <div class="carousel-cell">
                	<img src="https://www.canalvie.com/polopoly_fs/1.1360456.1389029380!/image/comment_choisir_son_equipement_de_ski_670.jpg_gen/derivatives/cvlandscape_670_377/comment_choisir_son_equipement_de_ski_670.jpg">
                </div>
                <div class="carousel-cell">
                	<img src="https://www.sancy.com/wp-content/uploads/2017/07/w_14328_ski_montdore.jpg">
                </div>
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
	            
	            <div>
	                <i class="fa fa-users"></i>
	                <label>Type de cours</label>
	                <p id="ad-nb_pers">{{ $advert->nbPers }}</p>
	            </div>                

	            <div>
					<i class="fa fa-calendar"></i>
	                <label>Durée</label>
	                <p id="ad-duration">{{ $advert->duration }}</p>
	            </div>

	        </div>
	    </section>

	    <section class="profil">
	    	<div class="wrap">

	    		<div class="img" style="background-image: url('img/user-circle-solid-white.svg');"></div>

	    		<div class="txt">
	        		<p>
	        			<span class="nom">{{ $user->name }}</span>, <span>{{ $user->age }}</span> ans.
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
		    	<label><span class="firstL" id={{ $advert->place }}>{{ $advert->place }} </span> :</label>
	    	</div>
	    	<div id="js-map">
	    		<div id='mapid'></div>
	    	</div>
	    </section>

	    <div class="signal">
	    	<a href=/report/{{ $advert->id }} id="btnReport">Signaler l'annonce</a>
	    </div>

	</div>

	<div class="reste js-toggleAnnonce"></div>

</div>