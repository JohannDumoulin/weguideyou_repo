<div class="menuProfil js-menuProfil hidden">
	<div class="modal">

		<div class="head">
			<div class="img">
                @auth
                    @if(Auth::user()->pic)
                        <img src="{{ asset('storage/'.Auth::user()->pic) ?? asset('/img/user-circle-solid-black.svg') }}" alt="Image de profil">
                    @else
                        <img src="{{ asset('/img/user-circle-solid-black.svg') }}" alt="Image de profil">
                    @endif
                @endauth
                @guest
                    <img src="{{ asset('/img/user-circle-solid-black.svg') }}" alt="Image de profil">
                @endguest
            </div>
			<p>{{ Auth::user()->name ?? 'undefined' }}</p>
		</div>

		<div class="modal-content">
            @auth
                <div class="modalNav">
                    <hr>
                    @if(Auth::user()->admin===1)
                        <a href="{{route('admin.index')}}">@lang('Administration')</a>
                    @endif
                    <a href="{{route('profile.index')}}">@lang('Profil')</a>
                    <a href="{{ url('/messagerie') }}">@lang('Messagerie')</a>
                    @if(Auth::user()->status != "PAR")
                        <a href="{{ url('/mes_annonces') }}">@lang('Mes Annonces')</a>
                    <!--
                        <hr>
                        <a href="#" id="premium">Premium</a>
                        <hr>
                        <a href="#">Historique des cours effectués</a>
                        <a href="#">Virement en cours</a>
                        <a href="#">Payements et remboursements</a>
                    -->
                    @endif
                    <hr>
                    <a href="{{ url('/parametres') }}" id="parametres">@lang('Paramètres')</a>
                    <hr>
                </div>
                <div class="logout">
                    <hr>
                    <a href="{{route('logout')}}">@lang('Déconnexion')</a>
                    <hr>
                </div>
            @endauth
		</div>
	</div>
    <div class="reste js-reste toggleModalProfil"></div>
</div>
