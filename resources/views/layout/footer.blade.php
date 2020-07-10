
<footer>
	<div class="footerTop"></div>
	<div class="wrap">
		<div>
            <img src="{{asset('img/logo/logoWeGuideYou.png')}}" alt="Logo de l'agence WeGuideYou">
			<a href="#">We Guide You</a>
		</div>
		<div>

			<div>
				<p><span>@lang('Assistance')</span></p>
				<a href="">@lang('A propos de nous')</a>
				<a href="">@lang('FAQ')</a>
				<a href="">@lang('Conditions Générales d\'Utilisation')</a>
				<a href="">@lang('Charte de Confidentialité')</a>
			</div>
			<div>
				<p><span>@lang('Nous Contacter')</span></p>
				<a href="{{ url('/messagerie') }}">@lang('Messagerie')</a>
				<a href="mailto:contact@we-guide-you.com">contact@we-guide-you.com</a>
				<a href="tel:+33768061295">07 68 06 12 95</a>

				<p><span>@lang('Compte')</span></p>
				<a href="{{route('login')}}">@lang('Connexion')</a>
				<a href="{{route('register')}}">@lang('Inscription')</a>
				<a href="{{route('password.request')}}">@lang('Récupérer son mot de passe')</a>
			</div>
			<div>
				<p><span>@lang('Suivez nous')</span></p>
				<div>
					<a href="">
						<i class="fa fa-facebook-f"></i>
					</a>
					<a href="">
						<i class="fa fa-instagram"></i>
					</a>
					<a href="">
						<i class="fa fa-twitter"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
