@extends('app')

@section('title', 'Home')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('attribute', 'home')

@section('content')

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
