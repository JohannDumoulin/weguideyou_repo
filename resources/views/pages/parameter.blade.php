@extends('app')

@section('title', 'Parametres')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endpush

@section('attribute', 'parameters')

@section('content')

@if(session('message') != null)

<div class="msgConfirm">{{session('message')}}</div>

@endif

    <div class="content">

        <div class="menu">
            <a href="#infosLogin">Informations de connexion</a>
            <a href="#notif">Notifications</a>
            <a href="#alerte">Alertes</a>
            <a href="#payement">Méthodes de payement</a>
            <a href="#infos">Infos</a>
            <a href="#sup">Supprimer mon compte</a>
        </div>

        <div>

            <section class="password" id="infosLogin">
                <div class="wrap">

                    <div class="inputs">
                        <div class="">
                            <label for="">Mot de passe actuel</label>
                            <input type="password" name="" id="oldMdp" placeholder="Confirmer votre mot de passe">
                        </div>
                        <p class="msgErreurOld"></p>
                         <div>
                            <label for="">Adresse E-mail</label>
                            <input type="text" name="" id="mail" placeholder="Adresse E-mail">
                        </div>
                        <div class="">
                            <label for="">Nouveau Mot de passe</label>
                            <div class="divMdp">
                                <i class="fa fa-eye js-visiPassword"></i>
                                <input type="password" name="" id="mdp" placeholder="Mot de passe">
                            </div>
                            <p class="msgErreurNew"></p>
                        </div>
                    </div>

                    <div class="btn">
                        <button class="js-btnModifyInfos buttonLink">Modifier</button>
                    </div>

                </div>
            </section>

            <section class="notif" id="notif">
                <div class="wrap">

                    <div class="titles">
                        <h3>Notifications</h3>
                        <h4>Mail</h4>
                    </div>

                    <div class="elem">
                        <p>Alerte</p>
                        <label class="switch switch_alerte">
                            <input type="checkbox" id="notif_alerte">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div class="elem">
                        <p>Quand une de mes annonces expire</p>
                        <label class="switch">
                            <input type="checkbox" id="">
                            <span class="slider round"></span>
                        </label>
                    </div>            

                    <div class="elem">
                        <p>Quand un utilisateur m'envoie un message</p>
                        <label class="switch">
                            <input type="checkbox" id="">
                            <span class="slider round"></span>
                        </label>
                    </div>            

                    <div class="elem">
                        <p>Quand une utilisateur réserve un de mes offres</p>
                        <label class="switch">
                            <input type="checkbox" id="showOffline">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    
                </div>
            </section>

            <section class="alerte" id="alerte">
                <div class="wrap">

                 <h3>Alertes</h3>

                <div class="divElemAlertes">

                </div>

                <h3 id="titreCritere">Critères</h3>

                <div class="first_filter ">

                    <div class="divInp">
                        <label>Type d'annonce</label>
                        <input list="dataType" name="" id="type" placeholder="Que recherchez-vous ?">
                        <datalist id="dataType">
                            <option>Cours</option>7
                            <option>Recherche de travail</option>7
                            <option>Recherche d'employé</option>7
                        </datalist>
                    </div>
                    <div class="divInp">
                        <label for="activity">ACTIVITÉ</label>
                        <input list="dataActivities" name="activity" id="activity" placeholder="Que voulez-vous faire ?">
                        <datalist id="dataActivities">
                            <option></option>7
                        </datalist>
                    </div>
                    <div class="divInp">
                        <label for="place">LIEU</label>
                        <input name="place" id="place" placeholder="Où voulez-vous partir ?" type="text">
                        <div>
                            <div class="loader searchCity" id="hidden"></div>
                        </div>
                        <div>
                            <div class="suggestions"></div>
                        </div>
                    </div>
                    <button class="btnAddAlerte">Ajouter</button>
                </div>
                    
            </section>

            <section class="payement" id="payement">
                <div class="wrap">
                    
                    <h3>Méthodes de payement</h3>

                    <div class="content">

                        <div class="inputs">
                             <div>
                                <label for="">Numéro de carte</label>
                                <input type="text" name="" id="" placeholder="Numéro de carte">
                            </div>
                            <div>
                                <label for="">Date d'expiration</label>
                                <input type="date" name="" id="">
                            </div>
                            <div>
                                <label for="">CVV</label>
                                <input type="" name="" id="" placeholder="CVV">
                            </div>
                        </div>

                        <div class="btn">
                            @include('components.buttonLink', ['link' => '#'], ['text' => 'Modifier'])
                        </div>

                    </div>

                </div>
            </section>

            <section class="payement" id="infos">
                <div class="wrap">
                    
                    <h3>Infos</h3>

                    <div class="content">

                        <div class="inputs">
                             <div>
                                <label for="">IBAN</label>
                                <input id="IBAN" placeholder="IBAN">
                            </div>
                            <div>
                                <label for="">Numéro de Siret</label>
                                <input id="siret" placeholder="Numéro de Siret">
                            </div>
                            <div>
                                <label for="">Carte moniteur</label>
                                <input id="num_licence" placeholder="Carte moniteur">
                            </div>
                        </div>

                        <div class="btn">
                            <button class="js-btnModifyInfosA buttonLink">Modifier</button>
                        </div>

                    </div>

                </div>
            </section>

            <section class="sup" id="sup">
                <div class="wrap">
                    
                    <button class="js-btnDeleteAccount">Supprimer mon compte</button>

                </div>  
            </section>

        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush

