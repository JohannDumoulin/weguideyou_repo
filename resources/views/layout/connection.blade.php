<div class="connectionContainer js-ConnectionContainer hidden">
    <div class="wrap">
        <form class="connectionPanel" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="loginNav">
                <a href="" class="is-selected">@lang('Connexion')</a>
                <a href="{{route('register')}}">@lang('Inscription')</a>
            </div>
            <div>
                <label>
                    <input id="email" placeholder="@lang('Adresse mail')" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </label>
            </div>
            <div>
                <label>
                    <input id="password" placeholder="@lang('Mot de passe')" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember"><span>@lang('Rester connecté')</span></label>
            </div>
            <button type="submit" class="buttonLink">@lang('Se connecter')</button>
            <a href="{{route('password.request')}}">@lang('Mot de passe oublié ?')</a>
        </form>
        <svg id="close-connection" class="js-back" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px"><g><g> <g> <g> <path d="M256,0C114.844,0,0,114.844,0,256s114.844,256,256,256s256-114.844,256-256S397.156,0,256,0z M256,490.667 C126.604,490.667,21.333,385.396,21.333,256S126.604,21.333,256,21.333S490.667,126.604,490.667,256S385.396,490.667,256,490.667 z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/> <path d="M359.542,152.458c-4.167-4.167-10.917-4.167-15.083,0L256,240.917l-88.458-88.458c-4.167-4.167-10.917-4.167-15.083,0 c-4.167,4.167-4.167,10.917,0,15.083L240.917,256l-88.458,88.458c-4.167,4.167-4.167,10.917,0,15.083 c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125L256,271.083l88.458,88.458c2.083,2.083,4.813,3.125,7.542,3.125 c2.729,0,5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083L271.083,256l88.458-88.458 C363.708,163.375,363.708,156.625,359.542,152.458z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/> </g> </g> </g></g> </svg><g><g><g><path d="M256,0C114.844,0,0,114.844,0,256s114.844,256,256,256s256-114.844,256-256S397.156,0,256,0z M256,490.667C126.604,490.667,21.333,385.396,21.333,256S126.604,21.333,256,21.333S490.667,126.604,490.667,256S385.396,490.667,256,490.667z"/><path d="M359.542,152.458c-4.167-4.167-10.917-4.167-15.083,0L256,240.917l-88.458-88.458c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083L240.917,256l-88.458,88.458c-4.167,4.167-4.167,10.917,0,15.083c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125L256,271.083l88.458,88.458c2.083,2.083,4.813,3.125,7.542,3.125c2.729,0,5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083L271.083,256l88.458-88.458C363.708,163.375,363.708,156.625,359.542,152.458z"/></g></g></g></svg>
    </div>
</div>
