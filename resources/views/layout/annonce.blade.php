 <!-- Map -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>


<div class="annonce">

	<div class="modalAnnonce" id={{ $advert->id }}>

	    <section class="icons">
	        <div class="wrap">
	            <i class="fa fa-heart"></i>
	            <i class="fa fa-chevron-left"></i>
	            <i class="fa fa-chevron-right"></i>
	            <i class="fa fa-times js-toggleAnnonce"></i>
	        </div>
	    </section>

	    <section class="titres">
	        <div class="wrap">
	            <div class="btnResa">
	                <h1 id="ad-title">{{ $advert->title }}</h1>
	                @include('components.buttonLink', ['link' => '#'], ['text' => 'Réserver'])
	            </div>   
	            <h2>
	            	<span id="ad-price">{{ $advert->price }}</span>€ / h
		        </h2>
	            <div class="item">
					<i class="fa fa-map-marker"></i>
					<h3 id="ad-location">{{ $advert->locations }}</h3>
	            </div>
	            <div class="item">
					<i class="fa fa-calendar"></i>
					<h3>
						<span id="ad-dateStart">{{ $advert->dateStart }}</span> - <span id="ad-dateEnd">{{ $advert->dateEnd }}</span>
					</h3>
	            </div>
	        </div>
	    </section>

	    <section class="images">
	        <div class="wrap">
	            <div class="container">
				  <br>
				  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				    <!-- Indicators -->
				    <ol class="carousel-indicators">
				      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				      <li data-target="#myCarousel" data-slide-to="1"></li>
				      <li data-target="#myCarousel" data-slide-to="2"></li>
				      <li data-target="#myCarousel" data-slide-to="3"></li>
				    </ol>

				    <!-- Wrapper for slides -->
				    <div class="carousel-inner" role="listbox">

				      <div class="item active">
				        <img src="https://www.glisshop.com/Imagestorage/images/0/0/5dd4feb744785_5cadff0d8faa9_ski_alpin_piste.jpg">
				      </div>

				      <div class="item">
				        <img src="https://img.redbull.com/images/c_crop,x_2235,y_0,h_3777,w_3022/c_fill,w_860,h_1075/q_auto,f_auto/redbullcom/2015/09/28/1331750334543_6/construire-piste-ski-val-disere-france">
				      </div>
				    
				      <div class="item">
				        <img src="https://www.canalvie.com/polopoly_fs/1.1360456.1389029380!/image/comment_choisir_son_equipement_de_ski_670.jpg_gen/derivatives/cvlandscape_670_377/comment_choisir_son_equipement_de_ski_670.jpg">
				      </div>

				      <div class="item">
				        <img src="https://www.sancy.com/wp-content/uploads/2017/07/w_14328_ski_montdore.jpg">
				      </div>
				  
				    </div>

				    <!-- Left and right controls -->
				    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				      <span class="sr-only">Previous</span>
				    </a>
				    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				      <span class="sr-only">Next</span>
				    </a>
				  </div>
				</div>
	        </div>
	    </section>

	    <section class="description">
	        <div class="wrap">
	            <label>Description</label>
	            <p id="ad-description">{{ $advert->description }}</p>
	        </div>
	    </section>

	    <section class="detail">
	        <div class="wrap">
	            
	            <div>
	                <i class="fa fa-users"></i>
	                <label>Type de cours</label>
	                <p id="ad-nb_pers">Collectif</p>
	            </div>                

	            <div>
					<i class="fa fa-calendar"></i>
	                <label>Période de la journée</label>
	                <p id="ad-duration">Toute la journée</p>
	            </div>

	        </div>
	    </section>

	    <section class="profil">
	    	<div class="wrap">
	    		<div class="img"></div>
	    		<div class="txt">
	        		<p>
	        			<span class="nom">Megan</span>, <span>26</span> ans.
	        		</p>      
	          		<p>
	        			<span>Guide de haute montagne</span> - <span>Val Thorens</span>
	        		</p>
	          		<p>
	        			<i class="fa fa-globe"></i>
	        			<span>Francais</span> - <span>Anglais</span>
	        		</p>
	    		</div>
	    	</div>
	    </section>

	    <section class="map">
	    	<div class="wrap titre">
		    	<i class="fa fa-map-marker"></i>
		    	<label><span class="firstL" id={{ $advert->firstLocation }}>{{ $advert->firstLocation }} </span> :</label>
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
