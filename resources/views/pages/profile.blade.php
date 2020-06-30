@extends('app')

@section('title', 'Profil')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/d678efe89e.js" crossorigin="anonymous"></script>
@endpush

@section('attribute', 'userProfile')

@section('content')

    <div class="content">
        <div class="profile-updatePanel js-profile-updatePanel hidden">
            <div class="wrap">
                <form class="updatePanel-main" method="POST" action="{{route('profile.update', Auth::user()->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="updatePanel-title">
                        <h2>Modifier son profil</h2>
                    </div>
                    <div class="updatePanel-identity">
                        @if($status === 'NSO' || $status === 'SO')
                            <div>
                                <label>
                                    <input type="text" required placeholder="Nom de la structure" class="form-control @error('name') is-invalid @enderror" name="name" maxlength="50" minlength="2" value="{{ Auth::user()->name }}" autofocus>
                                </label>
                            </div>
                        @endif
                        @if($status === 'PAR' || $status === 'PRO')
                            <div>
                                <label>
                                    <input name="name" required type="text" placeholder="Prénom" class="form-control @error('name') is-invalid @enderror" maxlength="50" minlength="2" value="{{ Auth::user()->name }}" autofocus>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input name="surname" required type="text" placeholder="Nom" class="form-control @error('surname') is-invalid @enderror" maxlength="50" minlength="2" value="{{ Auth::user()->surname }}" autofocus>
                                </label>
                            </div>
                        @endif
                    </div>
                    <div class="updatePanel-address">
                        <div>
                            <label>
                                <input name="address" required type="text" placeholder="Adresse" class="form-control @error('address') is-invalid @enderror" maxlength="200" value="{{ Auth::user()->address }}" autofocus>
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="pc" required type="text" placeholder="Code postal" class="form-control @error('pc') is-invalid @enderror" maxlength="5" value="{{ Auth::user()->pc }}" autofocus>
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="city" required type="text" placeholder="Ville" class="form-control @error('city') is-invalid @enderror" maxlength="50" value="{{ Auth::user()->city }}" autofocus>
                            </label>
                        </div>
                    </div>
                    @if($status === 'NSO' || $status === 'SO' || $status === 'PRO')
                        <div class="updatePanel-sector">
                            <div>
                                <label>
                                    <input name="title" required type="text" placeholder="Titre" class="form-control @error('city') is-invalid @enderror" maxlength="50" value="{{ Auth::user()->title ?? 'Titre' }}" autofocus>
                                </label>
                            </div>
                            <div>
                                <label for="sector" class="control-label required">Secteur :</label>
                                <select class="form-control" required="required" id="sector" name="sector">
                                    <option value="" selected="selected">Choisir</option>
                                    <option value="mountain">Sport de montagne</option>
                                    <option value="aquatic">Sport aquatique</option>
                                    <option value="extreme">Sport extrême</option>
                                    <option value="other">Autre</option></select>
                            </div>
                        </div>
                    @endif
                    <div class="updatePanel-lang">
                        <div class="updatePanel-langContainer">
                            <div class="lang-boxContainer">
                                <ul class="lang-box">
                                    @foreach($languages as $language)
                                        @foreach($UserLanguages as $UserLanguage)
                                            @if($UserLanguage->user_id === Auth::user()->id)
                                                @php
                                                $validate = true;
                                                @endphp
                                                @if($UserLanguage->language_id === $language->language_id)
                                                    <li><input type="checkbox" checked class="data-checkbox" name="checkbox[{{$language->language_id}}]" id="checkbox-{{$language->language_id}}" value="{{$language->language_id}}"><label for="checkbox-{{$language->language_id}}">{{$language->language_name}}</label></li>
                                                @break;
                                                @endif
                                                @php
                                                    $validate = false;
                                                @endphp
                                            @endif
                                        @endforeach
                                            @if(isset($validate))
                                                @if($validate === false)
                                                    <li><input type="checkbox" class="data-checkbox" name="checkbox[{{$language->language_id}}]" id="checkbox-{{$language->language_id}}" value="{{$language->language_id}}"><label for="checkbox-{{$language->language_id}}">{{$language->language_name}}</label></li>
                                                @endif
                                            @else
                                                <li><input type="checkbox" class="data-checkbox" name="checkbox[{{$language->language_id}}]" id="checkbox-{{$language->language_id}}" value="{{$language->language_id}}"><label for="checkbox-{{$language->language_id}}">{{$language->language_name}}</label></li>
                                            @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="updatePanel-description">
                        <label>
                            <textarea name="description" required class="profile-description" rows="5" cols="30" maxlength="280">{{Auth::user()->description ?? 'Aucune description'}}</textarea>
                        </label>
                    </div>
                    <button type="submit" class="buttonLink js-userLangUpdate">Valider</button>
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
                            <div>
                                @if($status === 'PRO' || $status === 'PAR')
                                    <h1>{{Auth::user()->name ?? 'undefined' }}, <span>{{$years ?? 'undefined'}} ans</span></h1>
                                @endif
                                @if($status === 'NSO' || $status === 'SO')
                                    <h1>{{Auth::user()->name ?? 'undefined' }}</h1>
                                @endif
                                <i id="js-modifyProfile" class="fas fa-pen fa-lg"></i>
                            </div>
                            @if($status === 'NSO' || $status === 'SO' || $status === 'PRO')
                                <div class="profile-title">
                                    <h2>{{ Auth::user()->title ?? 'A compléter'}}</h2>
                                </div>
                                {{--<div class="profile-job">
                                    <p>{{ Auth::user()->job ?? 'A compléter'}} - <a href="#">{{ Auth::user()->city ?? 'A compléter'}}</a></p>
                                </div>--}}
                            @endif
                            <div class="profile-lang">
                                <p>Français - anglais</p>
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="profile-desc">
                                <p>{{Auth::user()->description ?? 'A compléter'}}</p>
                            </div>
                            <a href="#" class="buttonLink">Contacter {{Auth::user()->name ?? 'undefined' }}</a>
                        </div>
                    </div>
                    @if($status === 'PRO' || $status === 'SO' || $status === 'NSO')
                    <div class="profile-ad">
                        <div>
                            <h2>Annonces</h2>
                        </div>
                        <div class="profile-main-carousel">

                            @foreach ($adverts as $advert)

                            <div class="carousel-cell">

                                <div class="advertisement_content" id=/annonce/{{ $advert->id }}>
                                    <div class="profil_picture_container">
                                        <img src="{{ asset('img/advertisement.jpg') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="infos">
                                            <h3> {{ $advert->name }}</h3>
                                            <div class="info_content">
                                                <div class="more">
                                                    <p> {{ $advert->price_one_h }} €</p>
                                                    <div class="seller_infos">
                                                        <p>ESF</p>
                                                        <img src="{{ asset('img/esf.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <p class="desc">{{ $advert->desc }}</p>
                                            </div>
                                        </div>
                                        @include('components.buttonFav', ['id' => $advert->id ])

                                        @if($advert->premium_urgent_week == 1)

                                        <svg class="picto urgent" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" title="Urgent">
                                            <g clip-path="url(#clip0)">
                                            <path d="M19.0805 18.7104C18.7836 18.6309 18.4783 18.8071 18.3988 19.104C18.0528 20.3953 16.7207 21.1644 15.4294 20.8184L9.64724 19.2691L13.5189 16.2704C14.0197 15.8771 14.2513 15.2456 14.1233 14.6224C13.9957 13.9986 13.5344 13.5088 12.9197 13.3441L12.8877 13.3355L15.5768 11.4239C16.1005 11.0504 16.3652 10.4002 16.251 9.76737C16.1367 9.13414 15.6612 8.6174 15.0397 8.45087L9.28066 6.90774C8.39124 6.66942 7.47379 7.19915 7.23547 8.08857C6.99715 8.97799 7.52688 9.8954 8.41627 10.1337L10.7518 10.7595L8.06277 12.6711C7.53865 13.0448 7.27423 13.6953 7.38903 14.3276C7.50307 14.9608 7.97832 15.4777 8.59984 15.6442L8.8144 15.7017L7.14806 16.9804C7.14647 16.9816 7.14487 16.9829 7.14326 16.9841C6.68772 17.3416 6.4686 17.8903 6.50987 18.4285L1.0317 16.9606C0.734756 16.881 0.429518 17.0573 0.349953 17.3542C0.270388 17.6512 0.446618 17.9564 0.743557 18.036L15.1413 21.8938C17.0255 22.3987 18.9692 21.2765 19.4741 19.3922C19.5537 19.0952 19.3775 18.79 19.0805 18.7104Z" fill="#29ABE2"/>
                                            <path d="M17.8538 3.93797C16.6047 3.60327 15.3161 4.3472 14.9814 5.59632C14.6467 6.84548 15.3907 8.13406 16.6398 8.46877C17.889 8.80348 19.1775 8.05951 19.5122 6.81035C19.8469 5.56122 19.103 4.27268 17.8538 3.93797Z" fill="#29ABE2"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0">
                                            <rect x="5" width="19" height="19" transform="rotate(15 5 0)" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>

                                        @endif
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
