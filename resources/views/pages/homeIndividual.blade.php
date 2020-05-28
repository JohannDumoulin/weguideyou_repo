@extends('app')

@section('title', 'Accueil')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'homeIndividual')

@section('content')



@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
