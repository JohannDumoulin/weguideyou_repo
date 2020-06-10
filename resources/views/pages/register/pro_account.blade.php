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
            <div class="registration-step registration-middleStep">
                <hr>
                <div class="registration-answer">
                    {!! form_row($formRegister->name) !!}
                    {!! form_row($formRegister->surName) !!}
                    {!! form_row($formRegister->birth) !!}
                    {!! form_row($formRegister->gender) !!}
                </div>
            </div>
            <div class="registration-step registration-middleStep">
                <hr>
                <div class="registration-answer">
                    {!! form_row($formRegister->address) !!}
                    {!! form_row($formRegister->city) !!}
                    {!! form_row($formRegister->postcode) !!}
                    {!! form_row($formRegister->phone) !!}
                </div>
            </div>
            <div class="registration-step registration-finalStep">
                <hr>
                <div class="registration-answer">
                    <div>
                        {!! form_row($formRegister->mailAddress) !!}
                        {!! form_row($formRegister->password) !!}
                    </div>
                    {!! form_row($formRegister->CGU)!!}
                    {!! form_row($formRegister->newsLetter)!!}
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
