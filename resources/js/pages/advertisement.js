import $ from 'jquery';


export default class AdvertisementPage {
    constructor() {
        this.initEls();
        this.initEvents();

        if ($('body').data('content') === "advertisement"){
            this.initEventsAdverts();
        }
    }

    initEls(){
        this.$els ={
            more_filter_btn: $('.js-more_filter'),
            less_filter_btn: $('.js-less_filter'),
            order_btn: $('.js-order'),
            filter_btn: $('.js-filter'),
            filter_on: {},
            adverts: "",
        }
    }

    initEvents(){
        this.getAdvertisementPage();
    }

    initEventsAdverts() {
        this.filter();
        this.getAdverts();
        this.getCities();
        this.getActs();
    }

    getAdvertisementPage(){
        this.$els.more_filter_btn.click(function(){
            $(this).removeClass("js-active");
            $('.js-first_filter_more').addClass("js-active");
        });

        this.$els.less_filter_btn.click(function(){
            $('.js-first_filter_more').removeClass("js-active");
            $('.js-more_filter').addClass("js-active");
        });
    }

    getAdverts() {
        $.ajax({
            method: "get",
            url: "/getAdverts"
        })
        .done((adverts) => {
            this.$els.adverts = adverts
            this.displayAdverts();
            this.changeOrder();

            
        })
    }

    displayAdverts() {
        var adverts = this.$els.adverts;

        var container = document.querySelector("#js-container");
        container.innerHTML = "";
        for(let advert of adverts) {
            container.innerHTML += `
                <div class="advertisement_content js-toggleAnnonce" id='/annonce/`+advert.id+`'>
                    <div class="profil_picture_container">
                        <img src="{{ asset('img/advertisement.jpg') }}" alt="">
                    </div>
                    <div class="infos">
                        <h3>`+advert.title+`</h3>
                        <div class="info_content">
                            <div class="more">
                                <p>`+advert.price+` €</p>
                                <div class="seller_infos">
                                    <p>ESF</p>
                                    <img src="{{ asset('img/esf.png') }}" alt="">
                                </div>
                            </div>
                            <p class="desc">`+advert.description+`</p>
                        </div>
                    </div>
                    <svg class="picto like" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 22.6648C12.1441 22.6648 11.8009 22.541 11.5335 22.3162C10.5236 21.4684 9.54988 20.6717 8.69082 19.9689L8.68643 19.9653C6.16778 17.9048 3.99284 16.1254 2.47955 14.3725C0.787924 12.4129 0 10.5549 0 8.52521C0 6.55316 0.704382 4.73383 1.98326 3.4021C3.27739 2.05463 5.05313 1.3125 6.98393 1.3125C8.42703 1.3125 9.74863 1.75049 10.9119 2.6142C11.499 3.05017 12.0311 3.58374 12.5 4.20612C12.969 3.58374 13.5009 3.05017 14.0882 2.6142C15.2515 1.75049 16.5731 1.3125 18.0162 1.3125C19.9468 1.3125 21.7227 2.05463 23.0169 3.4021C24.2958 4.73383 25 6.55316 25 8.52521C25 10.5549 24.2122 12.4129 22.5206 14.3723C21.0073 16.1254 18.8326 17.9046 16.3143 19.9649C15.4537 20.6688 14.4785 21.4667 13.4662 22.3165C13.199 22.541 12.8557 22.6648 12.5 22.6648ZM6.98393 2.71838C5.46702 2.71838 4.07352 3.29956 3.05976 4.35498C2.03094 5.42633 1.46427 6.90729 1.46427 8.52521C1.46427 10.2323 2.12516 11.759 3.60698 13.4755C5.03921 15.1346 7.16952 16.8774 9.6361 18.8954L9.64067 18.899C10.503 19.6046 11.4805 20.4044 12.4979 21.2584C13.5214 20.4027 14.5004 19.6016 15.3644 18.895C17.8308 16.877 19.9609 15.1346 21.3932 13.4755C22.8748 11.759 23.5357 10.2323 23.5357 8.52521C23.5357 6.90729 22.969 5.42633 21.9402 4.35498C20.9266 3.29956 19.5329 2.71838 18.0162 2.71838C16.905 2.71838 15.8847 3.0575 14.9839 3.7262C14.1811 4.32239 13.6219 5.07605 13.294 5.60339C13.1254 5.87457 12.8286 6.03644 12.5 6.03644C12.1713 6.03644 11.8746 5.87457 11.7059 5.60339C11.3783 5.07605 10.819 4.32239 10.016 3.7262C9.1152 3.0575 8.09496 2.71838 6.98393 2.71838Z" fill="#C4C4C4"/>
                    </svg>
                    <svg class="picto urgent" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    `+advert.created_at+`
                </div>
                `;
        }

        this.toggleAdvert();
    }

    initMap(fLocation) {

        let x;
        let y;

        //$("#js-map").innerHTML = "<div id='mapid'></div>"

        $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q='+fLocation, function(data){
            x = parseFloat(data[0].lat);
            y = parseFloat(data[0].lon);

            var map = L.map('mapid').setView([x,y], 6/data[0].importance);

            L.marker([x, y]).addTo(map);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoidnprbml6cW4iLCJhIjoiY2thejNpczhqMGEyMDJycGpxZWFpMDZkNiJ9.PFRuOm6POv773ECXsIFPrQ', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1Ijoidnprbml6cW4iLCJhIjoiY2thejNpczhqMGEyMDJycGpxZWFpMDZkNiJ9.PFRuOm6POv773ECXsIFPrQ'
            }).addTo(map);

            map.invalidateSize();
        });
    }


    changeOrder() {
        var _this = this;

        this.$els.order_btn.change(function(){
            var value = this.value;

            $.ajax({
                method: "get",
                url: "/sortAdverts",
                data: {type: value, adverts: JSON.stringify(_this.$els.adverts)},
                success: function (data) {
                    _this.$els.adverts = data;
                    _this.displayAdverts();
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            })
        });  
    }

    filter() {
        var _this = this;
        var filter_on = this.$els.filter_on;

        this.$els.filter_btn.change(function(){

            // recup every filter
            filter_on[this.id] = this.value;
            if(this.value == "")
                delete filter_on[this.id];

            $.ajax({
                method: "get",
                url: "/filterAdverts",
                data: {filter_on: filter_on},
                success: function (data) {
                    data = Object.keys(data).map(i => data[i]);
                    _this.$els.adverts = data;
                    _this.displayAdverts();
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            })

        });  
    }

    toggleAdvert() {

        var _this = this;

        $('.js-toggleAnnonce').on("click", function(event) {

            // toggle open / close
            console.log($('#sectionContent')[0].innerHTML);

            event.preventDefault(); // Avoid the link click from loading a new page
            $('#sectionContent').load($(this).attr('id'), function(data) {
                var location = $(data).find('.firstL')[0].id
                _this.initMap(location);
                $(".modalAnnonce").scrollTop(0);
            })
            $("body").toggleClass("stopScrolling");          
        }); 
    }

    getCities() {
        $('.select2-container').on("click", function() {
            checkChange();
        });

        function checkChange() {
            $('.select2-search__field:eq(1)').on("input", function() {
                var value = this.value;

                $.ajax({
                    method: "get",
                    url: "https://api.teleport.org/api/cities/?search="+value,

                    success: function (data) {
                        var res = Object.entries(data._embedded)[0][1]
                        if(value != "") {
                            $('#place')[0].innerHTML = "";

                            for(var item of res){
                                $('#place')[0].innerHTML += '<option value="e">'+item.matching_full_name+'</option>'
                            }

                        }
                    },
                    error: function(data) {
                        console.log(data.responseJSON);
                    }
                })
            }); 
        }
    } 

    getActs() {
        $.ajax({
            method: "get",
            url: "/getActs",

            success: function (data) {
                $('#activities')[0].innerHTML = "";

                for(var item of data){
                    $('#activities')[0].innerHTML += '<option value="e">'+item.activity+'</option>'
                }

            },
            error: function(data) {
                console.log(data.responseJSON);
            }
        }) 
    }      
}