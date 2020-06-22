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
            <div class="admin-nav">
                <span class="is-selected">Utilisateurs</span>
                <span>Annonces</span>
                <span>WeGuideNews</span>
                {{--<span>Reviews</span>
                <span>Signalements</span>
                <span>Questions</span>
                <span>Emails</span>--}}
            </div>
            <div class="admin-data user_data data-nth-0">
                <div class="data-categories">
                    <div>
                        <div><span>Nom</span></div>
                        <div><span>Statut</span></div>
                        <div><span>Naissance</span></div>
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
                        <div class="data-content-container">
                            <div class="data-content-main">
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
                            <div class="data-content-hidden js-dataDetail is-hidden">
                                <div>
                                    <div><span>Compte créé le :</span> <span>{{$user->created_at}}</span></div>
                                    <div><span>Téléphone :</span> <span>{{$user->phone}}</span></div>
                                    <div><span>Email :</span> <span>{{$user->email}}</span></div>
                                    <div><span>Adresse :</span> <span>{{$user->address}}  {{$user->pc}} {{$user->city}}</span></div>
                                    <div><span>Siret :</span> <span>{{$user->siret ?? 'Inconnu'}}</span></div>
                                    <div><span>Licence :</span> <span>{{$user->licence ?? 'Inconnu'}}</span></div>
                                </div>
                                <div>
                                    <div><span>Description :</span> <span>{{$user->desc ?? 'Inconnu'}}</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="admin-data advertisement_data data-nth-1 hidden">
                <div class="data-categories">
                    <div>
                        <div><span>Annonceur</span></div>
                        <div><span>Type</span></div>
                        <div><span>Titre</span></div>
                        <div><span>Activité</span></div>
                        <div><span>Lieu</span></div>
                    </div>
                </div>
                <div class="data-content">
                    {{--@foreach($ads as $ad)
                        <div>
                            <div>
                                <img src="{{$ad->user->pic ?? asset('img/user-circle-solid-black.svg')}}" alt="photo de profil">
                            </div>
                            <div>
                                <div><span>{{$ad->user->name}} {{$ad->user->surname}}</span></div>
                                <div><span>{{$ad->type}}</span></div>
                                <div><span>{{$ad->name}}</span></div>
                                <div><span>{{$ad->activity}}</span></div>
                                <div><span>{{$ad->place}}</span></div>
                            </div>
                            <div>
                                <i class="fas fa-ellipsis-v fa-lg"></i>
                            </div>
                        </div>
                    @endforeach--}}
                    @foreach($ads as $ad)
                        <div class="data-content-container">
                            <div class="data-content-main">
                                <div>
                                    <img src="{{$ad->user->pic ?? asset('img/user-circle-solid-black.svg')}}" alt="photo de profil">
                                </div>
                                <div>
                                    <div><span>{{$ad->user->name}} {{$ad->user->surname}}</span></div>
                                    <div><span>{{$ad->type}}</span></div>
                                    <div><span>{{$ad->name}}</span></div>
                                    <div><span>{{$ad->activity}}</span></div>
                                    <div><span>{{$ad->place}}</span></div>
                                </div>
                                <div>
                                    <i class="fas fa-ellipsis-v fa-lg"></i>
                                </div>
                            </div>
                            <div class="data-content-hidden js-dataDetail is-hidden">
                                <div>
                                    <div><span>Cours :</span> <span>{{$ad->nbPers}}</span></div>
                                    <div><span>Durée :</span> <span>{{$ad->duration}}</span></div>
                                    <div><span>Prix :</span> <span>{{$ad->price_one_h}}</span> <span>€/h</span></div>
                                    <div><span>Créé le :</span> <span>{{$ad->created_at}}</span></div>
                                    <div><span>Modifié le :</span> <span>{{$ad->updated_at}}</span></div>
                                </div>
                                <div>
                                    <div><span>Description :</span> <span>{{$ad->desc ?? 'Inconnu'}}</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="admin-data advertisement_data data-nth-2 hidden">
                <div class="data-content">
                    @foreach($users as $user)
                        <div class="data-content-container">
                            <div class="data-content-main">
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
                            <div class="data-content-hidden js-dataDetail is-hidden">
                                <div>
                                    <div><span>Compte créé le :</span> <span>{{$user->created_at}}</span></div>
                                    <div><span>Téléphone :</span> <span>{{$user->phone}}</span></div>
                                    <div><span>Email :</span> <span>{{$user->email}}</span></div>
                                    <div><span>Adresse :</span> <span>{{$user->address}}  {{$user->pc}} {{$user->city}}</span></div>
                                    <div><span>Siret :</span> <span>{{$user->siret ?? 'Inconnu'}}</span></div>
                                    <div><span>Licence :</span> <span>{{$user->licence ?? 'Inconnu'}}</span></div>
                                </div>
                                <div>
                                    <div><span>Description :</span> <span>{{$user->desc ?? 'Inconnu'}}</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="admin-data advertisement_data data-nth-3 hidden">
                <div class="data-categories">
                    <div>
                        <div><span>Nom</span></div>
                        <div><span>Statut</span></div>
                        <div><span>Age</span></div>
                        <div><span>Genre</span></div>
                        <div><span>Ville</span></div>
                    </div>
                </div>
                <div class="data-content">
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
                </div>
            </div>
            <div class="admin-data advertisement_data data-nth-4 hidden">
                <div class="data-categories">
                    <div>
                        <div><span>Nom</span></div>
                        <div><span>Statut</span></div>
                        <div><span>Age</span></div>
                        <div><span>Genre</span></div>
                        <div><span>Ville</span></div>
                    </div>
                </div>
                <div class="data-content">
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
                </div>
            </div>
            <div class="admin-data advertisement_data data-nth-5 hidden">
                <div class="data-categories">
                    <div>
                        <div><span>Nom</span></div>
                        <div><span>Statut</span></div>
                        <div><span>Age</span></div>
                        <div><span>Genre</span></div>
                        <div><span>Ville</span></div>
                    </div>
                </div>
                <div class="data-content">
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
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
