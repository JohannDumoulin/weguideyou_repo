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
            @auth
                <a href="{{ route('create_ad') }}">Poster une annonce</a>
                <a href="/favoris">Favoris</a>
            @endauth
            @guest
                <a href="#" class="js-toggleConnectionContainer">Connexion</a>
                @include('components.buttonLink', ['newId' => 'js-registrationBtn','link' => '/register','text' => 'Inscription'])
            @endguest
            @auth
                <div class="js-toggleModalProfil">
                    <div>
                        <img src="{{ Auth::user()->pic ?? asset('img/user-circle-solid-white.svg')}}" alt="Image de profil">
                    </div>
                    <span>{{ Auth::user()->name ?? 'undefined' }}</span>
                    <i class="fa fa-chevron-down arrow"></i>
                </div>
            @endauth
		</div>
	</div>
</nav>
