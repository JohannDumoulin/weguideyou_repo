


@auth
	<div class="buttonFav picto like" id="{{ $id }}" title="Ajouter aux Favoris">
		<i class="fa fa-heart"></i>
	</div>
@endauth

@guest
	<div class="picto like" id="{{ $id }}" title="Connectez vous pour pourvoir utiliser cette fonctionnalité">
		<i class="fa fa-heart"></i>
	</div>
@endguest