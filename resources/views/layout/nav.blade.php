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
			<a href="#">Poster une annonce</a>
			<a href="/favoris">Favoris</a>
            @if(auth()->check() === false)
                <a href="#" class="toggleModalProfil js-toggleConnectionContainer">Connexion</a>
                @include('components.buttonLink', ['newId' => 'js-registrationBtn','link' => '/register','text' => 'Inscription'])
            @endif
            @if(auth()->check() === true)
                <span class="toggleModalProfil hidden">
                    <div class="img"></div>
                    <p>Megan</p>
                    <i class="fa fa-chevron-down arrow"></i>
                </span>
            @endif
		</div>
	</div>
</nav>
