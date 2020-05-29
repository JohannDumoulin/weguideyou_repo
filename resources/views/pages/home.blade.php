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
                    <h1>Recrutez des <span>professionnels</span> à tous moment.</h1>
                    @include('components.buttonLink', ['link' => '#'], ['text' => 'Recruter un professionnel'])
                </div>
            </div>
        </div>
    </section>
    <section class="findJob">
        <div class="wrap">
            <div>
                <div>
                    <h1>Trouvez un <span>job</span> près de chez vous qui <span>vous correspond.</span></h1>
                    @include('components.buttonLink', ['link' => '#'], ['text' => 'Trouver un job'])
                </div>
            </div>
            <div><img src="{{asset('/img/dmitrii-vaccinium-ByUAo3RpA6c-unsplash.jpg')}}" alt=""></div>
        </div>
    </section>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
