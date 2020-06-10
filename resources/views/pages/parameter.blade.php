@extends('app')

@section('title', 'Parametres')

@push('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('attribute', 'parameter')

@section('content')

    <div class="content">

        <div class="menu">
            <a href="#password">Informations de connexion</a>
            <a href="#notif">Notification</a>
            <a href="#alerte">Alertes</a>
            <a href="#payement">Méthodes de payement</a>
            <a href="#sup">Supprimer mon compte</a>
        </div>

        <div>

            <section class="password" id="password">
                <div class="wrap">

                    <div class="inputs">
                         <div>
                            <label for="">Adresse E-mail</label>
                            <input type="text" name="" id placeholder="Adresse E-mail">
                        </div>
                        <div class="mdp">
                            <label for="">Mot de passe</label>
                            <input type="password" name="" id="" placeholder="Mot de passe">
                        </div>
                    </div>

                    <div class="btn">
                        @include('components.buttonLink', ['link' => '#'], ['text' => 'Modifier'])
                    </div>

                </div>
            </section>

            <section class="notif" id="notif">
                <div class="wrap">

                    <div class="titles">
                        <h3>Notifications</h3>
                        <h4>Mail</h4>
                        <h4>Site</h4>
                    </div>

                    <div class="elem">
                        <p>Alerte</p>
                        <label class="switch">
                            <input type="checkbox" id="showOffline">
                            <span class="slider round"></span>
                        </label>
                        <label class="switch">
                            <input type="checkbox" id="showOffline">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div class="elem">
                        <p>Quand une de mes annonces expire</p>
                        <label class="switch">
                            <input type="checkbox" id="showOffline">
                            <span class="slider round"></span>
                        </label>
                        <label class="switch">
                            <input type="checkbox" id="showOffline">
                            <span class="slider round"></span>
                        </label>
                    </div>            

                    <div class="elem">
                        <p>Quand un utilisateur m'envoie un message</p>
                        <label class="switch">
                            <input type="checkbox" id="showOffline">
                            <span class="slider round"></span>
                        </label>
                        <label class="switch">
                            <input type="checkbox" id="showOffline">
                            <span class="slider round"></span>
                        </label>
                    </div>            

                    <div class="elem">
                        <p>Quand une utilisateur réserve un de mes offres</p>
                        <label class="switch">
                            <input type="checkbox" id="showOffline">
                            <span class="slider round"></span>
                        </label>
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

                <div class="first_filter">
                    <div class="header_filter">
                        <label>Type d'annonce</label>
                        <select id="inpType" class="js-example-basic">
                            <option>Cours</option>
                            <option>Recherche de travail</option>
                            <option>Recherche d'employé</option>
                        </select>
                    </div>
                    <div class="header_filter">
                        <label for="activity">Activité</label>
                        <select id="activities" class="js-example-basic"></select>
                    </div>
                    <div class="header_filter">
                        <label for="place">Lieu</label>
                        <select id="place" class="js-example-basic"></select>
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

            <section class="sup" id="sup">
                <div class="wrap">
                    
                    <button>Supprimer mon compte</button>

                </div>  
            </section>

        </div>
    </div>

@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.js-example-basic').select2();
        $('.js-example-basic').select2({
            placeholder: "-",
            allowClear: true
        });
    </script>

    <script src="{{asset('js/app.js')}}"></script>
@endpush

