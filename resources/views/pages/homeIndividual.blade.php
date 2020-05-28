@extends('app')

@section('title', 'Accueil')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('attribute', 'homeIndividual')

@section('content')

    <svg width="0" height="0" class="hidden">
        <symbol viewBox="0 0 1280 621" fill="none" xmlns="http://www.w3.org/2000/svg" id="Subtract">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1280 102.881L0 0v621h1280V102.881z" fill="#fff"></path>
        </symbol>
    </svg>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
