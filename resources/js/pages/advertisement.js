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
        this.getActs();
        this.getCities();
    }

    initEventsAdverts() {
        this.filter();
        this.getAdverts($('title')[0].innerHTML);
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

    getAdverts(type) {
        let _this = this;

        $.ajax({
            method: "get",
            url: "/getAdverts",
            data: {type: type},
            success : function(data) {
                _this.$els.adverts = data
                _this.displayAdverts();
                _this.changeOrder();
            },
            error : function(data) {
                console.log(data.responseJSON)
            }
        })
    }

    displayAdverts() {
        let _this = this;
        var adverts = this.$els.adverts;

        var container = document.querySelector("#js-container");
        container.innerHTML = "";

        var c = 0

        for(let advert of adverts) {
            $.ajax({ type: "GET",   
                url: "/advert/"+advert.id,
                success : function(res) {
                    $('#js-container').append(res);
                    c++;
                    if(c === adverts.length) {
                        _this.toggleAdvert();
                        _this.initFav();
                    }
                }
            });
        }
    }

    initFav() {

        $.ajax({ type: "GET",   
            url: "getFavorites",
            success : function(favorites) {

                var btnFavs = $('.buttonFav');

                for(let favorite of favorites) {
                    for(let btnFav of btnFavs) {
                        if(favorite.id == btnFav.id) {
                            btnFav.classList.toggle("buttonFavOn");
                        }
                    }
                }
            }
        });   
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

        $(document).on('click', '.js-toggleAnnonce', function(event) {

            // toggle open / close
            if($('#sectionContent')[0].innerHTML == "") {
                $('#sectionContent').load($(this).attr('id'), function(data) {
                    var location = $(data).find('.firstL')[0].id
                    _this.initMap(location);
                    $(".modalAnnonce").scrollTop(0);

                    //_this.toggleAdvert();
                })  
            } else {
                $('#sectionContent')[0].innerHTML = "";
            }  

            $("body").toggleClass("stopScrolling");     
        }); 
    }

    getCities() {
        $('.select2-container').on("click", function() {
            
            if(this.parentNode.childNodes[3].id == "place") {
                checkChange();
            }
        });

        function checkChange() {

            $('.select2-search__field').on("input", function() {
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