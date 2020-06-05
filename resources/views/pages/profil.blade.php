@extends('app')

@section('title', 'Home')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'profil')

@section('content')

    <div class="content">
        <div class="profil-Banner"></div>
        <div class="wrap">
            <div class="mainContainer">
                <div class="mainContent">
                    <div>
                        <div class="profilOverview">
                            <div>
                                <img src="./public/img/christopher-campbell-rDEOVtE7vOs-unsplash.jpg" alt="Photo de profil">
                            </div>
                            <div>
                                <div>
                                    <p>cours effectués</p>
                                    <p>21</p>
                                </div>
                                <div>
                                    <p>cours annulés</p>
                                    <p>1</p>
                                </div>
                                <div>
                                    <p>Avis (14)</p>
                                    <a href="#">4.9/5</a>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h1>Megan, <span>26 ans</span></h1>
                                <p>Guide de haute montagne - <a>Val Thorens</a></p>
                                <i class="fas fa-pen"></i>
                            </div>
                            <div>
                                <i class="fa fa-globe"></i>
                                <p>Français - anglais</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a augue turpis. Aliquam erat volutpat. Aliquam lacus neque, fermentum sit amet magna in, laoreet laoreet neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In viverra lorem eu sapien molestie volutpat.</p>
                            @include('components.buttonLink', ['link' => '#'], ['text' => 'Contacter Megan'])
                        </div>
                    </div>
                    <div>
                        <div>
                            <h2>Annonces</h2>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
