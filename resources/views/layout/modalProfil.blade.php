<div class="menuProfil js-menuProfil hidden">
	<div class="modal">

		<div class="head">
			<div class="img">
                <img src="{{Auth::user()->pic ?? asset('img/user-circle-solid-black.svg')}}" alt="Image de profil">
            </div>
			<p>{{ Auth::user()->name ?? 'undefined' }}</p>
		</div>

		<div class="modal-content">
            @auth
                <div class="modalNav">
                    <hr>
                    @if(Auth::user()->admin===1)
                        <a href="{{route('admin.index')}}">Administration</a>
                    @endif
                    <a href="{{route('profile.index')}}">Profil</a>
                    <a href="/messagerie">Messagerie</a>
                    @if(Auth::user()->admin!==1)
                        <a href="/mes_annonces">Mes Annonces</a>
                        <hr>
                        <a href="#" id="premium">Premium</a>
                        <hr>
                        <a href="#">Historique des cours effectués</a>
                        <a href="#">Virement en cours</a>
                        <a href="#">Payements et remboursements</a>
                    @endif
                    <hr>
                    <a href="/parametres" id="parametres">Paramètres</a>
                    <hr>
                </div>
                <div class="logout">
                    <hr>
                    <a href="/logout">Déconnexion</a>
                    <hr>
                </div>
            @endauth
		</div>
	</div>
    <div class="reste js-reste toggleModalProfil"></div>
</div>
