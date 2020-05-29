<nav>
	<div class="wrap">
        <div class="navLogo">
            <img src="{{asset('img/logo/logoWeGuideYou.png')}}" alt="Logo de l'agence WeGuideYou">
            <a href="#">WeGuideYou</a>
        </div>
		<div class="navMain">
			<a href="#">
				<i class="fa fa-globe"></i>
				<i class="fa fa-chevron-down arrow"></i>
			</a>
			<a href="#">Poster une annonce</a>
			<a href="#">Favoris</a>
			<a href="#">Connexion</a>
			@include('components.buttonLink', ['link' => '#'], ['text' => 'Inscription'])
<!--
			<span class="toggleModalProfil">
				<div class="img"></div>
				<p>Megan</p>
				<i class="fa fa-chevron-down arrow"></i>
			</span>
 -->
		</div>
	</div>
</nav>
