<nav {{--class="js-onMoveNav"--}}>
	<div class="wrap">
        <div class="navLogo">
            <img src="{{asset('img/logo/logoWeGuideYou.png')}}" alt="Logo de l'agence WeGuideYou">
            <a href="/">WeGuideYou</a>
        </div>
		<div class="navMain">

            @if (App::isLocale('en'))
    			<a href={{ url('setlocale/fr') }}>
                    <img src="{{ asset('/img/icon_Flag_Fr.png') }}">
    			</a>
            @else
                <a href={{ url('setlocale/en') }}>
                    <img src="{{ asset('/img/icon_Flag_En.png') }}">
                </a>
            @endif


            @auth

                @if(Auth::user()->status == "PRO")
                    <a href="/annonces?type=Cours">@lang('Annonces Particuliers')</a>
                    <a href="/annoncesPro?type=LookForJob">@lang('Annonces Professionnels')</a>
                @endif

                @if(Auth::user()->status == "PAR")
                    <a href="/annonces?type=Cours">@lang('Annonces')</a>
                @endif

                <a href="{{ route('create_ad') }}">@lang('Poster une annonce')</a>
                <a href="/favoris">@lang('Favoris')</a>
            @endauth
            @guest
                <a href="/annonces?type=Cours">@lang('Annonces')</a>
                <a href="#" class="js-toggleConnectionContainer">@lang('Connexion')</a>
                <a href="{{route('register')}}" id="js-registrationBtn" class="buttonLink">@lang('Inscription')</a>
                {{--@include('components.buttonLink', ['newId' => 'js-registrationBtn','link' => '/register','text' => 'Inscription'])--}}
            @endguest
            @auth
                <div class="js-toggleModalProfil">
                    <div>
                        @auth
                            @if(Auth::user()->pic)
                                <img src="{{ asset('storage/'.Auth::user()->pic) ?? asset('/img/user-circle-solid-white.svg') }}" alt="Image de profil">
                            @else
                                <img src="{{ asset('/img/user-circle-solid-white.svg') }}" alt="Image de profil">
                            @endif
                        @endauth
                        @guest
                            <img src="{{ asset('/img/user-circle-solid-white.svg') }}" alt="Image de profil">
                        @endguest
                    </div>
                    <span>{{ Auth::user()->name ?? 'undefined' }}</span>
                    <i class="fa fa-chevron-down arrow"></i>
                </div>
            @endauth
		</div>
	</div>
</nav>
