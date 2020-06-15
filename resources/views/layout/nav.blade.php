<nav {{--class="js-onMoveNav"--}}>
	<div class="wrap">
        <div class="navLogo">
            <img src="{{asset('img/logo/logoWeGuideYou.png')}}" alt="Logo de l'agence WeGuideYou">
            <a href="/">WeGuideYou</a>
        </div>
		<div class="navMain">
			<a href="#">
				<i class="fa fa-globe"></i>
				<i class="fa fa-chevron-down arrow"></i>
			</a>
            @if(Auth::check())
			<a href="{{ route('create_ad') }}">Poster une annonce</a>
			<a href="/favoris">Favoris</a>
            @endif

            @if(!Auth::check())
                <a href="#" class="js-toggleConnectionContainer">Connexion</a>
                @include('components.buttonLink', ['newId' => 'js-registrationBtn','link' => '/register','text' => 'Inscription'])
            @endif

            @if(Auth::check())
                <div class="js-toggleModalProfil">
                    <div>
                        <img src="{{asset('img/megan1.jpg')}}" alt="Image de profil">
                    </div>
                    <span>{{ $user['name'] ?? 'undefined' }}</span>
                    <i class="fa fa-chevron-down arrow"></i>
                </div>
            @endif
		</div>
	</div>
</nav>
