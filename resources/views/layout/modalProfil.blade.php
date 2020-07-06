<div class="menuProfil js-menuProfil hidden">
	<div class="modal">

		<div class="head">
			<div class="img">
                @if(Auth::user()->pic != null)
                    <img class="imgp" src={{ asset('storage/'.Auth::user()->pic)}} />
                @else
                    <img class="imgp" src={{ asset('/img/user-regular.svg')}} />
                @endif
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
                    <a href="/messagerie">@lang('Messagerie')</a>
                    @if(Auth::user()->admin!==1)
                        <a href="/mes_annonces">@lang('Mes Annonces')</a>
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
                    <a href="/parametres" id="parametres">@lang('Paramètres')</a>
                    <hr>
                </div>
                <div class="logout">
                    <hr>
                    <a href="/logout">@lang('Déconnexion')</a>
                    <hr>
                </div>
            @endauth
		</div>
	</div>
    <div class="reste js-reste toggleModalProfil"></div>
</div>
