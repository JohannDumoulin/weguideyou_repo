
@foreach ($adverts as $advert)

<div class="mAdvert {{ $advert['id'] }}">

    <div class="advertisement_content js-toggleAnnonce" id=/annonce/{{$advert['id']}}>
        <div class="profil_picture_container">
            @if($advert["img"] != 0)
                <img src={{ asset('storage/'.$advert["img"][0]) }} />
            @else
                <img class="imgp" src={{ asset('/img/noPic.jpg')}} />
            @endif
        </div>
        <div class="content">
            <div class="infos">
                <h3> {{ $advert['name'] }}</h3>
                <div class="info_content">
                    <div class="more">
                        @if($advert['price_one_h'] != null)
                            <p> {{ $advert['price_one_h'] }} €</p>
                        @elseif($advert['salaire'] != null)
                            <p> {{ $advert['salaire'] }} €</p>
                        @endif
                        <div class="seller_infos">
                            <p>{{ $advert['user_name'] }}</p>
                        </div>
                    </div>
                    <p class="desc"> {{ $advert['desc'] }}</p>
                </div>
            </div>
            @include('components.buttonFav', ['id' => $advert['id'] ])

            @if($advert['premium_urgent_week'] == 1)

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

    <div class="divBtns">

        <div>
            <button class="buttonLink js-btnModifyAdvert js-toggleAnnonce" id=modifyAnnonce/{{ $advert['id'] }}>@lang('Modifier')</button>
            <button data-confirm="{{ trans('default.conf_delete_annonce') }}" class="buttonLink js-btnDeleteAdvert" id={{ $advert['id'] }}>@lang('Supprimer')</button>
        </div>
<!--         <div>
            <input type="checkbox" name="">
        </div> -->
        
    </div>
</div>

@endforeach