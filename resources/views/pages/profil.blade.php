@extends('app')

@section('title', 'Home')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'userProfil')

@section('content')

    <div class="content">
        <div class="profil-Banner"></div>
        <div class="wrap">
            <div class="mainContainer">
                <div class="mainContent">
                    <div>
                        <div class="profilOverview">
                            <div>
                                <img src="img/megan1.jpg" alt="Photo de profil">
                            </div>
                            <div>
                                <div>
                                    <p>Avis (14)</p>
                                    <div class="reviewLinkContainer">
                                        <a href="#">4.9/5</a>
                                        <i class="fas fa-chevron-right fa-xs"></i>
                                    </div>
                                </div>
                                <div>
                                    <p>cours effectués</p>
                                    <p>21</p>
                                </div>
                                <div>
                                    <p>cours annulés</p>
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                        <div class="profilDetails">
                            <div>
                                <h1>Megan, <span>26 ans</span></h1>
                                <i class="fas fa-pen fa-lg js-modifyProfil"></i>
                            </div>
                            <div>
                                <p>Guide de haute montagne - <a href="#">Val Thorens</a></p>
                            </div>
                            <div>
                                <p>Français - anglais</p>
                                <i class="fa fa-globe"></i>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a augue turpis. Aliquam erat volutpat. Aliquam lacus neque, fermentum sit amet magna in, laoreet laoreet neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In viverra lorem eu sapien molestie volutpat.</p>
                            </div>
                            @include('components.buttonLink', ['link' => '#'], ['text' => 'Contacter Megan'])
                        </div>
                    </div>
                    <div class="profil-ad">
                        <div>
                            <h2>Annonces</h2>
                        </div>
                        <div class="profil-main-carousel">
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
