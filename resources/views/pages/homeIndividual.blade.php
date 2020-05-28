@extends('app')

@section('title', 'Accueil')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('attribute', 'homeIndividual')

@section('content')

    <div class="topPro">
        <div class="wrap">
            <h2>Redécouvrez le <span>sport</span> aux côtés de <span>professionnels qualifiés.</span></h2>
            <div>
                <div class="img"></div>
                <p>Lisa</p>
                <p><span></span></p>
                <div>
                    <p>Est nihil videre haec est permittunt haec pendentem memorabile cum dimicationum mirum ad cum infuso innumeram plebem similiaque ardore cum...</p>
                </div>
            </div>
            <div>
                <div class="img"></div>
                <p>Claire</p>
                <p><span></span></p>
                <div>
                    <p>Est nihil videre haec est permittunt haec pendentem memorabile cum dimicationum mirum ad cum infuso innumeram plebem similiaque ardore cum...</p>
                </div>
            </div>
            <div>
                <div class="img"></div>
                <p>Paul</p>
                <p><span></span></p>
                <div>
                    <p>Est nihil videre haec est permittunt haec pendentem memorabile cum dimicationum mirum ad cum infuso innumeram plebem similiaque ardore cum...</p>
                </div>
            </div>
        </div>
    </div>

    {{--<!-- SVG Sprite -->
    <svg width="0" height="0" class="hidden">
        <symbol viewBox="0 0 1280 621" fill="none" xmlns="http://www.w3.org/2000/svg" id="Subtract">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1280 102.881L0 0v621h1280V102.881z" fill="#fff"></path>
        </symbol>
    </svg>
    <!-- SVG References -->
    <svg class="icon">
        <use xlink:href="#Subtract"></use>
    </svg>--}}

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
