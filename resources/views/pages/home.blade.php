@extends('app')

@section('title', 'Home')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'home')

@section('content')

    <section class="recruitingPro">
        <div class="wrap">
            <div><img src="{{asset('/img/nate-johnston-2gBpsNuHcyA-unsplash.jpg')}}" alt=""></div>
            <div>
                <div>
                    <h2>Recrutez des <span>professionnels</span> à tous moment.</h2>
                    @include('components.buttonLink', ['link' => '#'], ['text' => 'Recruter un professionnel'])
                </div>
            </div>
        </div>
    </section>
    <section class="findJob">
        <div class="wrap">
            <div>
                <div>
                    <h2>Trouvez un <span>job</span> près de chez vous qui <span>vous correspond.</span></h2>
                    @include('components.buttonLink', ['link' => '#'], ['text' => 'Trouver un job'])
                </div>
            </div>
            <div><img src="{{asset('/img/dmitrii-vaccinium-ByUAo3RpA6c-unsplash.jpg')}}" alt=""></div>
        </div>
    </section>
    <section class="catchBanner">
        <img class="backgroundBanner" src="{{asset('/img/christopher-campbell-kFCdfLbu6zA-unsplash.jpg')}}" alt="Professionnel fitness">
        <div class="wrap">
            <h2>Partagez votre <span>passion</span> en proposant vos cours en toute <span>sécurité</span> et <span>gratuitement.</span></h2>
            @include('components.buttonLink', ['link' => '#'], ['text' => 'Proposer un cours'])
        </div>
    </section>
    @include('components.weGuideNews')
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
