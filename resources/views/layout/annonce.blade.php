 <!-- Map -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>

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
	                <a href="nouveau-message/{{ $user->id }}/{{ $advert->id }}" class="buttonLink">Contacter</a>
	            </div>   
	            <h2>
	            	@if($advert->price_one_h != null)
	            		<span id="ad-price">{{ $advert->price_one_h }}</span>€
	            	@elseif($advert->salaire != null)
	            		<span id="ad-price">{{ $advert->salaire }}</span>€
	            	@endif
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

            	@if ($advert->img != 0)
	            	@foreach ($advert->img as $img)

	                <div class="carousel-cell">
	                	<img src={{ asset('storage/'.$img) }} />
	                </div>
	                
	                @endforeach
		        @else
        	        <div class="carousel-cell">
	                	<img class="imgp" src={{ asset('/img/noPic.jpg')}} />
	                </div>
				@endif
            </div>
            
	    </section>

	    <section class="description">
	        <div class="wrap">
	            <label>@lang('Description')</label>
	            <p id="ad-description">{{ $advert->desc }}</p>
	        </div>
	    </section>

	    <section class="detail">
	        <div class="wrap">

	        	@if($advert->activity != null)
		        <div>
	                <i class="fas fa-running"></i>
	                <label>@lang('Activité')</label>
	                <p id="ad-nb_act">{{ $advert->activity }}</p>
	            </div> 
	            @endif 
	            
	            @if($advert->nbPers != null)
	            <div>
	                <i class="fa fa-users"></i>
	                <label>@lang('Type de cours')</label>
	                <p id="ad-nb_pers">{{ $advert->nbPers }}</p>
	            </div>  
	            @endif              

				@if($advert->duration != null)
	            <div>
					<i class="fa fa-calendar"></i>
	                <label>@lang('Durée')</label>
					@if($advert->duration == "day")
	                	<p id="ad-nb_pers">@lang('Journée')</p>
	                @elseif($advert->duration == "half-day")
						<p id="ad-nb_pers">@lang('Demi-journée')</p>
					@else
						<p id="ad-duration">{{ $advert->duration }}</p>
					@endif
	            </div>
	            @endif 

	            @if($advert->loge != null)
		        <div>
	                <i class="fas fa-house-user"></i>
	                <label>@lang('Poste logé')</label>
	                @if($advert->loge == 1)
	                	<p id="ad-nb_pers">@lang('Oui')</p>
	                @else
						<p id="ad-nb_pers">@lang('Non')</p>
					@endif
	            </div> 
	            @endif 

	            @if($advert->salaire != null)
	            <div>
	                <i class="far fa-money-bill-alt"></i>
	                <label>@lang('Salaire')</label>
	                <p id="ad-salaire">{{ $advert->salaire }} €</p>
	            </div>  
	            @endif 

	            @if($advert->job != null)
	            <div>
	                <i class="fas fa-running"></i>
	                <label>@lang('Profession')</label>
	                <p id="ad-salaire">{{ $advert->job }}</p>
	            </div> 
	            @endif 

	            @if($advert->sexe == 'f'|| $advert->sexe == 'h')
	            <div>
	                <i class="fas fa-user"></i>
	                <label>@lang('Sexe')</label>
	                @if($advert->sexe == 'f')
	                	<p id="ad-nb_pers">@lang('Femme')</p>
	                @else
						<p id="ad-nb_pers">@lang('Homme')</p>
					@endif
	            </div> 
	            @endif 

	        </div>
	    </section>

	    <section class="profil">
	    	<div class="wrap">

	    		<div class="img">
		            @if($user->pic != null)
	                    <img class="imgp" src={{ asset('storage/'.$user->pic)}} />
	                @else
	                    <img class="imgp" src={{ asset('/img/user-regular.svg')}} />
	                @endif
	            </div>

	    		<div class="txt">
	        		<p>
	        			<a href=profil/{{$user->id}} class="nom">{{ $user->name }}</a>, <span>{{ $user->age }}</span> @lang('ans').
	        		</p>      
	          		<p>
	        			<span>{{ $user->title }}</span> - <span>{{ $user->city }}</span>
	        		</p>
	          		<p>
                        @if($userActiveLangs)
                            <span>
                                @foreach($userActiveLangs as $key => $userActiveLang)
                                    @if($key === 0)
                                        <span>{{$userActiveLang}}</span>
                                    @else
                                        <span> - {{$userActiveLang}}</span>
                                    @endif
                                @endforeach
                            </span>
                        @endif
                        <i class="fa fa-globe"></i>
	        		</p>
	        		@if($advert->phone_bool == 1)
		        	<p>
		    			<i class="fa fa-phone"></i>
		    			<span>{{ $user->phone }}</span>
		    		</p>
					@endif

		        	@if($user->license == 1)
		        	<p>
		    			<i class="fa fa-id-badge"></i>
		    			<span>@lang('Diplome certifié')</span>
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
	    	<a href=report/{{$advert->id}} id="btnReport">@lang('Signaler l\'annonce')</a>
	    </div>

	</div>

	{{ $advert->created_at }}

	<div class="reste js-toggleAnnonce"></div>


</div>