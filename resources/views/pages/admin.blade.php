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
                <span class="is-selected">Utilisateurs</span>
                <span>Annonces</span>
                <span>Reviews</span>
                <span>Signalements</span>
                <span>Questions</span>
                <span>Emails</span>
            </div>
            <div class="user_data">
                <div class="data-categories">
                    <div>
                        <div><span>Nom</span></div>
                        <div><span>Statut</span></div>
                        <div><span>Age</span></div>
                        <div><span>Genre</span></div>
                        <div><span>Ville</span></div>
                        {{--<li>Création du compte</li>--}}
                        {{--<li>Email</li>
                        <li>Téléphone</li>
                        <li>Licence</li>
                        <li>siret</li>--}}
                    </div>
                </div>
                <div class="data-content">
                    @foreach($users as $user)
                       <div>
                        <div>
                            <img src="{{$user->pic ?? asset('img/user-circle-solid-black.svg')}}" alt="photo de profil">
                        </div>
                        <div>
                            <div><span>{{$user->name}} {{$user->surname}}</span></div>
                            <div><span class="userStatus">{{$user->status}}</span></div>
                            <div><span>{{$user->birth}}</span></div>
                            <div><span>{{$user->gender}}</span></div>
                            <div><span>{{$user->city}}</span></div>
                        </div>
                        <div>
                            <i class="fas fa-ellipsis-v fa-lg"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
