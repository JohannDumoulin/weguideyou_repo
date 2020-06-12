<div class="menuProfil js-menuProfil hidden">
	<div class="modal">

		<div class="head">
			<div class="img"></div>
			<p>{{ $user['name'] ?? 'undefined' }}</p>
		</div>

		<div class="content">
            <div class="modalNav">
                <hr>
                <a href="/profil">Profil</a>
                <a href="#">Messagerie</a>
                <a href="#">Mes Annonces</a>
                <hr>
                <a href="#" id="premium">Premium</a>
                <hr>
                <a href="#">Historique des cours effectués</a>
                <a href="#">Virement en cours</a>
                <a href="#">Payements et remboursements</a>
                <hr>
                <a href="#" id="parametres">Paramètres</a>
                <hr>
            </div>
            <div class="logout">
                <hr>
                <a href="/logout">Déconnexion</a>
                <hr>
            </div>
		</div>
	</div>
    <div class="reste js-reste toggleModalProfil"></div>
</div>
