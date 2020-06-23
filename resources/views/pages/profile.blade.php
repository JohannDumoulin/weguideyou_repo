@extends('app')

@section('title', 'Home')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'userProfile')

@section('content')

    <div class="content">
        <div class="profile-updatePanel js-profile-updatePanel hidden">
            <div class="wrap">
                <form class="updatePanel-main" method="POST" action="{{--{{ route('login') }}--}}">
                    @csrf
                    <div class="updatePanel-identity">
                        <div>
                            <label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" autofocus>
                            </label>
                        </div>
                        @if($status === 'PAR' || $status === 'PRO')
                            <div>
                                <label>
                                    <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ Auth::user()->surname }}" autofocus>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ Auth::user()->birth }}" autofocus>
                                </label>
                            </div>
                        @endif
                    </div>
                    @if($status === 'NSO' || $status === 'SO' || $status === 'PRO')
                        <div>
                            {{--job choice--}}
                        </div>
                    @endif
                    <div class="updatePanel-lang">
                        <div class="updatePanel-langContainer"></div>
                    </div>
                    {{--<div>
                        <h3>@lang('default.field_language')</h3>
                        <p class="sous_item" id="langueuser">
                            --}}{{--@foreach($languages_user ?? '' as $l)
                                {{$l->name_language}}<br/>
                            @endforeach--}}{{--
                        </p>
                        <input type="hidden" id="languages" name="languages" value="">
                        <button class="button sous_item edit_button" type="button" id="buttonlang" onclick="language()">@lang('default.adding_language_add')</button>
                        <p id= "languep" class="sous_item">
                            <select id="langues" name="name_language">
                                <option value="" selected>--</option>
                                --}}{{--@foreach ($language as $lang)
                                    <option value="{{$lang->name_language}}">{{$lang->name_language}}</option>
                                @endforeach--}}{{--
                            </select>
                            <button type="button" id="buttonajoutlang" class="button" onclick="addLanguage()">@lang('default.adding')</button>
                        </p>
                    </div>--}}
                    <div class="updatePanel-description">
                        <label>
                            <textarea name="desc" class="profile-description" rows="5" cols="30">{{Auth::user()->description ?? 'Aucune description'}}</textarea>
                        </label>
                    </div>
                    <button type="submit" class="buttonLink">Valider</button>
                </form>
                <svg id="close-profile-updatePanel" class="js-back-profile-updatePanel" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px"><g><g> <g> <g> <path d="M256,0C114.844,0,0,114.844,0,256s114.844,256,256,256s256-114.844,256-256S397.156,0,256,0z M256,490.667 C126.604,490.667,21.333,385.396,21.333,256S126.604,21.333,256,21.333S490.667,126.604,490.667,256S385.396,490.667,256,490.667 z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/> <path d="M359.542,152.458c-4.167-4.167-10.917-4.167-15.083,0L256,240.917l-88.458-88.458c-4.167-4.167-10.917-4.167-15.083,0 c-4.167,4.167-4.167,10.917,0,15.083L240.917,256l-88.458,88.458c-4.167,4.167-4.167,10.917,0,15.083 c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125L256,271.083l88.458,88.458c2.083,2.083,4.813,3.125,7.542,3.125 c2.729,0,5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083L271.083,256l88.458-88.458 C363.708,163.375,363.708,156.625,359.542,152.458z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/> </g> </g> </g></g> </svg><g><g><g><path d="M256,0C114.844,0,0,114.844,0,256s114.844,256,256,256s256-114.844,256-256S397.156,0,256,0z M256,490.667C126.604,490.667,21.333,385.396,21.333,256S126.604,21.333,256,21.333S490.667,126.604,490.667,256S385.396,490.667,256,490.667z"/><path d="M359.542,152.458c-4.167-4.167-10.917-4.167-15.083,0L256,240.917l-88.458-88.458c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083L240.917,256l-88.458,88.458c-4.167,4.167-4.167,10.917,0,15.083c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125L256,271.083l88.458,88.458c2.083,2.083,4.813,3.125,7.542,3.125c2.729,0,5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083L271.083,256l88.458-88.458C363.708,163.375,363.708,156.625,359.542,152.458z"/></g></g></g></svg>
            </div>
        </div>
        <div class="profile-Banner">
            <div>
                @include('components.buttonLink', ['link' => '#'], ['text' => 'Modifier'])
            </div>
        </div>
        <div class="wrap">
            <div class="mainContainer">
                <div class="mainContent">
                    <div>
                        <div class="profileOverview">
                            <div class="profileImg">
                                <div>
                                    @include('components.buttonLink', ['link' => '#'], ['text' => 'Modifier'])
                                </div>
                                <img src="{{Auth::user()->pic ?? asset('/img/user-regular.svg')}}" alt="Image de profil">
                            </div>
                            <div>
                                <div>
                                    <p>Avis (14)</p>
                                    <div class="reviewLinkContainer">
                                        <a href="#">4.9/5</a>
                                        <i class="fas fa-chevron-right fa-xs"></i>
                                    </div>
                                </div>
                                <div>
                                    <p>cours effectués</p>
                                    <p>21</p>
                                </div>
                                <div>
                                    <p>cours annulés</p>
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                        <div class="profileDetails">
                            @if($status === 'PRO' || $status === 'PAR')
                                <div>
                                    <h1>{{Auth::user()->name ?? 'undefined' }}, <span>{{$years ?? 'undefined'}} ans</span></h1>
                                    <i id="js-modifyProfile" class="fas fa-pen fa-lg"></i>
                                </div>
                            @endif
                            @if($status === 'NSO' || $status === 'SO')
                                <div>
                                    <h1>{{Auth::user()->name ?? 'undefined' }}</h1>
                                    <i id="js-modifyProfile" class="fas fa-pen fa-lg"></i>
                                </div>
                            @endif
                            @if($status === 'NSO' || $status === 'SO' || $status === 'PRO')
                                <div class="profile-job">
                                    <p>{{ Auth::user()->job ?? 'A compléter'}} - <a href="#">{{ Auth::user()->city ?? 'A compléter'}}</a></p>
                                </div>
                            @endif
                            <div class="profile-lang">
                                <p>Français - anglais</p>
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="profile-desc">
                                <p>{{Auth::user()->status_detail ?? 'A compléter'}}</p>
                            </div>
                            <a href="#" class="buttonLink">Contacter {{Auth::user()->name ?? 'undefined' }}</a>
                        </div>
                    </div>
                    <div class="profile-ad">
                        <div>
                            <h2>Annonces</h2>
                        </div>
                        <div class="profile-main-carousel">
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                            <div class="carousel-cell">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
