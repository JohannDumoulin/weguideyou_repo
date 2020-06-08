@extends('app')

@section('title', 'Inscription')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'register')

@section('content')

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
