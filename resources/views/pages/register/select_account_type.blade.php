@extends('app')

@section('title', 'Inscription')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'select_account_type')

@section('content')
    <section class="main">
        <div class="wrap">
            <h1>Choix du type de compte</h1>
            <div class="selectTypeAccount">
                <div>
                    <h2>Professionnel indépendant</h2>
                    @include('components.buttonLink', ['link' => 'new-account/pro'], ['text' => 'Choisir'])
                </div>
                <div>
                    <h2>Organisme non sportif</h2>
                    @include('components.buttonLink', ['link' => 'new-account/nso'], ['text' => 'Choisir'])
                </div>
                <div>
                    <h2>Organisme sportif</h2>
                    @include('components.buttonLink', ['link' => 'new-account/so'], ['text' => 'Choisir'])
                </div>
                <div>
                    <h2>Particulier</h2>
                    @include('components.buttonLink', ['link' => 'new-account/par'], ['text' => 'Choisir'])
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
