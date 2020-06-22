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
	                @include('components.buttonLink', ['link' => '#'], ['text' => 'Réserver'])
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
	            <textarea id="ad-description">{{$advert->desc }}</textarea>
	        </div>
	    </section>

	    <section class="detail">
	        <div class="wrap">
	            
	            <div>
	                <i class="fa fa-users"></i>
	                <label>Type de cours</label>
	                <input id="ad-nb_pers" value="Collectif"></input>
	            </div>                

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

	</div>

	<div class="reste js-toggleAnnonce"></div>

</div>