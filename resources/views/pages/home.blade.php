@extends('app')

@section('title', 'Home')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'home')

@section('content')

@include('layout.header')

@if(session('message') != null)

<div class="msgConfirm">{{session('message')}}</div>

@endif

    <section class="recruitingPro">
        <div class="wrap">
            <div><img src="{{asset('/img/nate-johnston-2gBpsNuHcyA-unsplash.jpg')}}" alt=""></div>
            <div>
                <div>
                    <h2>
                        @lang('default.homePro1')
                    </h2>
                    @include('components.buttonLink', ['link' => '/annoncesPro?type=LookForPeople'], ['text' => Lang::get('Recruter un professionnel')])
                </div>
            </div>
        </div>
    </section>
    <section class="findJob">
        <div class="wrap">
            <div>
                <div>
                    <h2>
                        @lang('default.homePro2')
                    </h2>
                    @include('components.buttonLink', ['link' => '/annoncesPro?type=LookForJob'], ['text' => Lang::get('Trouver un job')])
                </div>
            </div>
            <div><img src="{{asset('/img/dmitrii-vaccinium-ByUAo3RpA6c-unsplash.jpg')}}" alt=""></div>
        </div>
    </section>
    <section class="catchBanner">
        <img class="backgroundBanner" src="{{asset('/img/christopher-campbell-kFCdfLbu6zA-unsplash.jpg')}}" alt="Professionnel fitness">
        <div class="wrap">
            <h2>
                @lang('default.homePro3')
            </h2>
            @include('components.buttonLink', ['link' => '/deposer-une-annonce'], ['text' => Lang::get('Proposer un cours')])
        </div>
    </section>
    @include('components.weGuideNews')
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
