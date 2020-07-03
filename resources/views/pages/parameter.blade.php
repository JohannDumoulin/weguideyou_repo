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
            <a href="#infosLogin">@lang('Informations de connexion')</a>
            <a href="#notif">@lang('Notifications')</a>
            <a href="#alerte">@lang('Alertes')</a>
            <!-- <a href="#payement">@lang('Méthodes de paiement')</a> -->
            <a href="#infos">@lang('Infos')</a>
            <a href="#sup">@lang('Supprimer mon compte')</a>
        </div>

        <div class="cc">

            <section class="password" id="infosLogin">
                <div class="wrap">

                    <div class="inputs">
                        <div class="">
                            <label for="">@lang('Mot de passe actuel')</label>
                            <input type="password" name="" id="oldMdp" placeholder="Confirmer votre mot de passe">
                        </div>
                        <p class="msgErreurOld"></p>
                         <div>
                            <label for="">@lang('Adresse E-mail')</label>
                            <input type="text" name="" id="mail" placeholder="Adresse E-mail">
                        </div>
                        <div class="">
                            <label for="">@lang('Nouveau Mot de passe')</label>
                            <div class="divMdp">
                                <i class="fa fa-eye js-visiPassword"></i>
                                <input type="password" name="" id="mdp" placeholder="Mot de passe">
                            </div>
                            <p class="msgErreurNew"></p>
                        </div>
                    </div>

                    <div class="btn">
                        <button class="js-btnModifyInfos buttonLink">@lang('Modifier')</button>
                    </div>

                </div>
            </section>

            <section class="notif" id="notif">
                <div class="wrap">

                    <div class="titles">
                        <h3>@lang('Notifications')</h3>
                        <h4>@lang('E-mail')</h4>
                    </div>

                    <div class="elem">
                        <p>@lang('Alertes')</p>
                        <label class="switch switch_alerte">
                            <input type="checkbox" id="notif_alerte">
                            <span class="slider round"></span>
                        </label>
                    </div>
<!-- 
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
                    -->
                </div>
            </section>

            <section class="alerte" id="alerte">
                <div class="wrap">

                 <h3>@lang('Alertes')</h3>

                <div class="divElemAlertes">

                </div>

                <h3 id="titreCritere">@lang('Critères')</h3>

                <div class="first_filter ">

                    <div class="divInp">
                        <label>@lang('Type d\'annonce')</label>
                        <input list="dataType" name="" id="type" placeholder="Que recherchez-vous ?">
                        <datalist id="dataType">
                            <option>@lang('Cours')</option>7
                            <option>@lang('Recherche de travail')</option>7
                            <option>@lang('Recherche d\'employé')</option>7
                        </datalist>
                    </div>
                    <div class="divInp">
                        <label for="activity">@lang('ACTIVITÉ')</label>
                        <input list="dataActivities" name="activity" id="activity" placeholder="Que voulez-vous faire ?">
                        <datalist id="dataActivities">
                            <option></option>
                        </datalist>
                    </div>
                    <div class="divInp">
                        <label for="place">@lang('LIEU')</label>
                        <input name="place" id="place" placeholder="Où voulez-vous partir ?" type="text">
                        <div>
                            <div class="loader searchCity" id="hidden"></div>
                        </div>
                        <div>
                            <div class="suggestions"></div>
                        </div>
                    </div>
                    <button class="btnAddAlerte">@lang('Ajouter')</button>
                </div>
                    
            </section>
<!-- 
            <section class="payement" id="payement">
                <div class="wrap">
                    
                    <h3>@lang('Méthodes de paiement')</h3>

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
        -->

            <section class="payement" id="infos">
                <div class="wrap">
                    
                    <h3>@lang('Infos')</h3>

                    <div class="content">

                        <div class="inputs">
                             <div>
                                <label for="">IBAN</label>
                                <input id="IBAN" placeholder="IBAN">
                            </div>
                            <div>
                                <label for="">@lang('Numéro de SIRET')</label>
                                <input id="siret" placeholder="Numéro de Siret">
                            </div>
                            <div>
                                <label for="">@lang('Carte moniteur')</label>
                                <input id="num_licence" placeholder="Carte moniteur">
                            </div>
                        </div>

                        <div class="btn">
                            <button class="js-btnModifyInfosA buttonLink">@lang('Modifier')</button>
                        </div>

                    </div>

                </div>
            </section>

            <section class="sup" id="sup">
                <div class="wrap">
                    
                    <button class="js-btnDeleteAccount">@lang('Supprimer mon compte')</button>

                </div>  
            </section>

        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush

