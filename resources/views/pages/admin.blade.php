@extends('app')

@section('title', 'Administrateur')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'admin')

@section('content')
    <section class="main-admin">
        <div class="wrap">
            <h1>Page d'administration</h1>
            <div class="nav-admin">
                <a href="#" class="is-selected">Utilisateurs</a>
                <a href="#">Annonces</a>
                <a href="#">Reviews</a>
                <a href="#">Signalements</a>
                <a href="#">Questions</a>
                <a href="#">Emails</a>
            </div>
            <div class="user_data">
                <div class="data-categories">
                    <ul>
                        <li>Nom</li>
                        <li>Genre</li>
                        <li>Age</li>
                        <li>Ville</li>
                        <li>Statut</li>
                        {{--<li>Création du compte</li>--}}
                        {{--<li>Email</li>
                        <li>Téléphone</li>
                        <li>Licence</li>
                        <li>siret</li>--}}
                    </ul>
                </div>
                <div class="data-content">
                    <div>
                        <ul>
                            <li>
                                <div><img src="{{asset('img/megan1.jpg')}}" alt="photo test"></div>
                                Megan Durant
                            </li>
                            <li>F</li>
                            <li>26</li>
                            <li>Paris</li>
                            <li>PRO</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
