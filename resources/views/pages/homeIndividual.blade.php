@extends('app')

@section('title', 'Accueil')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('attribute', 'homeIndividual')

@section('content')



@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
