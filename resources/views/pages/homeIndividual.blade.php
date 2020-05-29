@extends('app')

@section('title', 'Accueil')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('attribute', 'homeIndividual')

@section('content')

    <section class="topPro">
        <div class="wrap">
            <h1>Redécouvrez le <span>sport</span> aux côtés de <span>professionnels qualifiés.</span></h1>
            <div>
                <div>
                    <div class="img">
                        {{--<img src="" alt="Image d'un professionnel">--}}
                    </div>
                    <p>Lisa</p>
                    <p>Moniteur de ski - <span>Val thorens</span></p>
                    <div class="comment">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left" class="svg-inline--fa fa-quote-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z"></path></svg>
                        <p>Est nihil videre haec est permittunt haec pendentem memorabile cum dimicationum mirum ad cum infuso innumeram plebem similiaque ardore cum...</p>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left" class="svg-inline--fa fa-quote-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z"></path></svg>
                    </div>
                </div>
                <div>
                    <div class="img">
                        {{--<img src="" alt="Image d'un professionnel">--}}
                    </div>
                    <p>Claire</p>
                    <p>Moniteur de ski - <span>Val thorens</span></p>
                    <div class="comment">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left" class="svg-inline--fa fa-quote-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z"></path></svg>
                        <p>Esse debeo quidem liberius in patiebatur illum nostro in esse licentiam versari moderatur adulescentis potissimum...</p>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left" class="svg-inline--fa fa-quote-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z"></path></svg>
                    </div>
                </div>
                <div>
                    <div class="img">
                        {{--<img src="" alt="Image d'un professionnel">--}}
                    </div>
                    <p>Paul</p>
                    <p>Moniteur de ski - <span>Val thorens</span></p>
                    <div class="comment">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left" class="svg-inline--fa fa-quote-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z"></path></svg>
                        <p>In gravitatem gravitatem omni in remissior autem proclivior sed quidem sed in dulcior debet huc comitatem remissior liberior sermonum Tristitia...</p>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left" class="svg-inline--fa fa-quote-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="topSport">
        {{--<div class="splitterBanner"> </div>--}}
        <div class="wrap">
            <h1>Le top des <span>sport</span> les plus <span>consultés</span></h1>
            <div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
            </div>
        </div>
    </section>
    <section class="catchBanner">
        <img class="backgroundBanner" src="{{asset('/img/christopher-campbell-kFCdfLbu6zA-unsplash.jpg')}}" alt="Professionnel fitness">
        <div class="wrap">
            <h1>Rejoignez <span>WeGuideYou</span> et réservez <br>vos cours en toute <span>sécurité</span> et <br> <span>gratuitement.</span></h1>
            @include('components.buttonLink', ['link' => '#'], ['text' => 'Trouver un cours'])
        </div>
    </section>
    <section class="weGuideNews">
        <div class="wrap">
            <h1>WeGuide<span>News</span></h1>
            <div>
                <div>
                    <div><img src="{{asset('/img/dane-wetton-t1NEMSm1rgI-unsplash.jpg')}}" alt="exemple article"></div>
                    <h2>Istum ipsum sic quem cave.
                    </h2>
                    <p>Tempus formidatam veri inopiam ad interpellata haut sine ne ventum respiratione liberalium tenerentur alimentorum ob tempus id extrusis sectatoribus.</p>
                </div>
                <div>
                    <div><img src="{{asset('/img/dane-wetton-t1NEMSm1rgI-unsplash.jpg')}}" alt="exemple article"></div>
                    <h2>Iste modo putat omne sublatum.</h2>
                    <p>Recte recte Ennius inventu videntur difficiles qui honoribus non qui istum Quid est graves suo facile istum calamitatum suo omittam.</p>
                </div>
                <div>
                    <div><img src="{{asset('/img/dane-wetton-t1NEMSm1rgI-unsplash.jpg')}}" alt="exemple article"></div>
                    <h2>Gratiam faeneramur sed expetendam fructus.</h2>
                    <p>Per iam nefanda fines hiscere nefanda iam cum Clematius cum permissus Alexandrini repentina ut idem Clematius contactus palatii oblato per mors mors loqui cuius non cuius nec nec.</p>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
