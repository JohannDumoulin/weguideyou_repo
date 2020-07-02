@extends('app')

@section('title', 'Inscription')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'login')

@section('content')
    <div class="container">
        <div class="wrap">
            <form class="connectionPanel" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label>
                        <input id="email" placeholder="Adresse mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </label>
                </div>
                <div>
                    <label>
                        <input id="password" placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember"><span>Rester connecté</span></label>
                </div>
                <button type="submit" class="buttonLink">Se connecter</button>
                <a href="{{route('password.request')}}">Mot de passe oublié ?</a>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
