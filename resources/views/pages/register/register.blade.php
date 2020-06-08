@extends('app')

@section('title', 'Inscription')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'register')

@section('content')
<section class="register">
    <div class="wrap">
        <div>
            <h1>Inscription</h1>
        </div>

        {!! form_start($formRegister) !!}
            <div class="registration-step registration-step1">
                <div class="registration-request">
                    <h2>Quel type de compte souhaitez vous créer ?</h2>
                </div>
                <div class="registration-answer">
                    {!! form_row($formRegister->languages) !!}
                    {{--<div>
                        <input type="radio" name="status-account" value="pro1">
                        <label for="vehicle1"> Professionnel indépendant</label>
                    </div>
                    <div>
                        <input type="radio" name="status-account" value="pro2">
                        <label for="vehicle2"> Agence (Immobilière, hôtellerie...)</label>
                    </div>
                    <div>
                        <input type="radio" name="status-account" value="pro3">
                        <label for="vehicle3"> Club</label>
                    </div>
                    <div>
                        <input type="radio" name="status-account" value="par">
                        <label for="vehicle3"> Particulier</label>
                    </div>--}}
                </div>
            </div>
            <div class="registration-step registration-step2">
                <div class="registration-request">
                    <h2>Comment devons nous vous appeller ?</h2>
                </div>
                <div class="registration-answer">
                    {!! form_row($formRegister->name) !!}
                    {!! form_row($formRegister->fullName) !!}
                    {!! form_row($formRegister->age) !!}
                    {!! form_row($formRegister->gender) !!}
                </div>
            </div>
            <div class="registration-step registration-step3">
                <div class="registration-request">
                    <h2>Dernière étape, vous y êtes presque !</h2>
                </div>
                <div class="registration-answer">
                    <div>
                        {!! form_row($formRegister->mailAdress) !!}
                        {!! form_row($formRegister->password) !!}
                        {!! form_row($formRegister->passwordConfirm) !!}
                    </div>
                    <div>
                        <input type="checkbox" id="CGU" name="CGU" required="">
                        <label for="CGU">J’accepte les <a href="#">Conditions Générales d'Utilisation</a>.</label>
                    </div>
                    <div>
                        <input type="checkbox" id="newsLetter" name="newsLetter">
                        <label for="newsLetter">Je souhaite recevoir les dernières nouvelles de la part de We Guide You.</label>
                    </div>
                </div>
            </div>
            {!! form_row($formRegister->submit) !!}
        {!! form_rest($formRegister) !!}
        {!! form_end($formRegister) !!}
    </div>
</section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
