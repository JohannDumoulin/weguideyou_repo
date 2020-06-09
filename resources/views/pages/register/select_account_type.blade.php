@extends('app')

@section('title', 'Inscription')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'select_account_type')

@section('content')
    <section>
        <div class="wrap">
            <h1>Choix du type de compte</h1>
            <div><a href="">Professionnel indépendant</a></div>
            <div><a href="">Organisme non sportif</a></div>
            <div><a href="">Organisme sportif</a></div>
            <div><a href="">Particulier</a></div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
