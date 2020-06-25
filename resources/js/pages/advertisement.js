import $ from 'jquery';
import Flickity from "flickity";


export default class AdvertisementPage {
    constructor() {
        this.initEls();
        this.initEvents();

        this.initEventsAdverts();
    }

    initEls(){
        this.$els ={
            more_filter_btn: $('.js-more_filter'),
            less_filter_btn: $('.js-less_filter'),
            order_btn: $('.js-order'),
            filter_on: {},
            adverts: "", // every adverts
            advertsM: "", // every adverts splited in a multidimentional array for every pages
            sortType: "",
            urgent: false,
            cities: "",
            fAff: true,
        }
    }

    initEvents(){
        this.getAdvertisementPage();
    }

    initEventsAdverts() {
        this.getAdverts($('title')[0].innerHTML);
        this.getActs();
        this.toggleAdvert();
        this.getUrgent();
        this.changePage();
        this.addEventSort();
        this.addEventFilter();
        this.hideMap();
        this.expandMap();

        var c = $('body').data('content') 
        if(c == "advertisement" || c == "advertisementPro" || c == "home" || c == "parameters" || c == "homeIndividual" || c == "create_advertisement")
            this.getCities();
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

    getAdverts(type, filterUrl) {
        let _this = this;

        if(filterUrl == undefined)
            filterUrl = true;
        if(type == undefined) {
            type = $('title')[0].innerHTML;
        }

        // afficher qu'une seule annonce
        var url = window.location.pathname;
        if(url.includes("a/")) {
            var id = url.split('/')[2];
            type = id;
            filterUrl = false;
        }

        $.ajax({
            method: "get",
            url: "/getAdverts",
            data: {type: type, filterUrl : filterUrl},
            success : function(data) {

                if(data.length == 0){
                    $('.js-divLoading')[0].innerHTML = "Aucune offres à afficher"
                    $(".divPage")[0].innerHTML = ""
                    return 0;
                }

                if(filterUrl) {

                    var params = data[data.length-1];
                    _this.$els.filter_on = params;

                    // Fill input
                    if(params.activity)
                        $("#activity")[0].value = params.activity;
                    if(params.place)
                        $("#place")[0].value = params.place;
                    if(params.date)
                        $("#date")[0].value = params.date;
                    if(params.type)
                        $("#type")[0].value = params.type;
                }

                data.pop();

                _this.$els.adverts = data;
                _this.$els.advertsM = _this.splitInPages(data)

                _this.filter(data); // => changeOrder => display
            },
            error : function(data) {
                console.log(data);
            }
        })
    }

    displayAdverts(page) {

        if($('#js-container').length > 0)
            $('#js-container')[0].innerHTML = "";
        if($('#js-container-premium').length > 0)
            $('#js-container-premium')[0].innerHTML = "";

        if(page == undefined)
            page = 0

        let _this = this;
        var adverts = this.$els.adverts;
        var advertsM = this.$els.advertsM;

        // affiche nbr total d'annonces
        if($('.nbrAdverts').length > 0)
            $('.nbrAdverts')[0].innerHTML = adverts.length

        // aucune offres
        if(advertsM[page] === undefined){
            $('#js-container')[0].innerHTML = "Aucune offres ne correspond à vos critères"
            $('.js-divLoading')[0].innerHTML = "";
            $(".divPage")[0].innerHTML = ""
            return 0;
        }

        // Bannière A la une
        if($('body').data('content') == "advertisement" || $('body').data('content') == "advertisementPro") {
            banner()
        }

        function banner() {
            var tempBanner = [];
            var banner = [];
            var r;

            // récup les annonces premium
            adverts.forEach(function (advert, index) {
                if(advert.premium_banner_week) {
                    tempBanner.push(advert);  
                }
            })

            if(tempBanner.length == 0 && _this.$els.fAff) {
                $(".divRight")[0].remove();
                return 0;
            }

            // en choisir au hasard
            var l = 2;
            if(tempBanner.length < l) 
                l = tempBanner.length;

            for (var i = 0; i < l; i++) {
                r = Math.floor(Math.random() * tempBanner.length); 
                tempBanner[r].dBanner = 1;
                banner.push(tempBanner[r]);
                tempBanner.splice(r, 1);
            }
            // les delete de leur position innitial
            advertsM[page].forEach(function (advert, index) {
                banner.forEach(function (b, i) {
                    if(advert == b) {
                        advertsM[page].splice(index, 1);
                    }
                })
            })

            //Afficher les annonces en avant
            $.ajax({ type: "GET",   
                url: "/adverts",
                data: {adverts : banner},
                success : function(res) {
                    $('#js-container-premium').append(res)

                    if($('.js-divLoading').length > 0)
                        $('.js-divLoading')[0].innerHTML = "";
                },
                error : function(res) {
                    console.log(res.responseJSON);
                }
            });
        }

        // affiche les annonces
        $.ajax({ type: "GET",   
            url: "/adverts",
            data: {adverts : advertsM[page], type : $('body').data('content')},
            success : function(res) {

                if(_this.$els.fAff && $('.mapContainer').length > 0) {
                    _this.initMapAdverts(adverts);
                    _this.$els.fAff = false;
                }

                if($('.js-divLoading').length > 0)
                    $('.js-divLoading')[0].innerHTML = "";

                $('#js-container').append(res)

                if($('.divPage').length > 0)
                    _this.displayBtnPage(advertsM, page);

                _this.initFav();
            },
            error : function(res) {
                console.log(res.responseJSON);
            }
        });
    }

    displayBtnPage(advertsM, page) {

        $(".divPage")[0].innerHTML = ""

        var nbPage = advertsM.length
        if(nbPage > 1) {
            $(".divPage")[0].innerHTML = "<p>pages</p>"

            var p;
            for (var i = 0; i < nbPage; i++) {
                p = i+1
                if(i == page) // page actuelle
                    $(".divPage")[0].innerHTML += "<span class='selected' id='changePage'>"+p+"</span>"
                else
                    $(".divPage")[0].innerHTML += "<span id='changePage'>"+p+"</span>"
            }             
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
            },
            error : function(data) {
                console.log(data.responseJSON);
            }
        });   
    }

    initMap(lat, lng) {

        let x;
        let y;

        $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q=france', function(data){

            x = lat;
            y = lng;

            var map1 = L.map('mapid').setView([x,y], 10); //6/data[0].importance

            L.marker([x, y]).addTo(map1);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoidnprbml6cW4iLCJhIjoiY2thejNpczhqMGEyMDJycGpxZWFpMDZkNiJ9.PFRuOm6POv773ECXsIFPrQ', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1Ijoidnprbml6cW4iLCJhIjoiY2thejNpczhqMGEyMDJycGpxZWFpMDZkNiJ9.PFRuOm6POv773ECXsIFPrQ'
            }).addTo(map1);

            map1.invalidateSize();
        });
    }


    initMapAdverts(adverts) {

        if(adverts == undefined)
            adverts = this.$els.adverts;

        var _this = this;

        if($('#mapAdverts')[0].innerHTML != "") {
            var div = document.createElement("div");
            div.id = "mapAdverts";
            div.classList = "divMap";
            $('#mapAdverts')[0].replaceWith(div);
        }

        // get every city
        let cities = adverts.map((node) => [node.place, node.place_lat, node.place_lng]);

        // remove duplicate cities
        cities = cities.filter(function(item, pos) {
            return cities.indexOf(item) == pos;
        })

        // display map
        $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q=france', function(data){

            var x = parseFloat(data[0].lat);
            var y = parseFloat(data[0].lon);

            var map = L.map('mapAdverts').setView([x,y], 10);
            _this.$els.map = map;

            var tileLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoidnprbml6cW4iLCJhIjoiY2thejNpczhqMGEyMDJycGpxZWFpMDZkNiJ9.PFRuOm6POv773ECXsIFPrQ', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1Ijoidnprbml6cW4iLCJhIjoiY2thejNpczhqMGEyMDJycGpxZWFpMDZkNiJ9.PFRuOm6POv773ECXsIFPrQ'
            }).addTo(map);

            // display markers
            var markers = []
            for(var city of cities) {

                var m = L.marker([city[1], city[2]])
                    .bindPopup(city[0])
                    .on('click', function() { 
                        $("#place")[0].value = this._popup._content;
                        _this.$els.filter_on["place"] = this._popup._content;
                        _this.getAdverts($('title')[0].innerHTML, false);
                    });

                markers.push(m);
            }

            var group = new L.featureGroup(markers)
                .addTo(map);
            
            map.fitBounds(group.getBounds());
            map.invalidateSize();

            // get cities in current map bounds
            function getFeaturesInView() {

                var features = [];
                var layers = Object.entries(map._layers);

                // teste si la ville est présente sur la carte actuelle
                for(var layer of layers) {
                    if(layer[1]._latlng != undefined) {
                        if(map.getBounds().contains(layer[1]._latlng)) {
                            features.push(layer[1]._popup._content);
                        }
                    }
                }

                var c = _this.$els.filter_on["place"]

                if(arraysEqual(c, features) == false) {
                    _this.$els.filter_on["place"] = features;
                    _this.getAdverts($('title')[0].innerHTML, false);
                }
            }

            map.on("moveend", function(e){
                getFeaturesInView();
            })

            function arraysEqual(a, b) {
              if (a === b) return true;
              if (a == null || b == null) return false;
              if (a.length !== b.length) return false;

              for (var i = 0; i < a.length; ++i) {
                if (a[i] !== b[i]) return false;
              }
              return true;
            }

        });


    }


    addEventSort() {
        var _this = this;

        this.$els.order_btn.change(function(){
            _this.$els.sortType = this.value; 
            _this.changeOrder();
        }); 
    }

    changeOrder(adverts) {

        if(adverts == undefined)
            adverts = this.$els.adverts;

        var _this = this;
        var sortType = this.$els.sortType;
        if(sortType == "")
            sortType = "plusRecent";

        // sort
        if(sortType == "prixCroissant")
            adverts.sort((a,b) => (a.price_one_h > b.price_one_h) ? 1 : ((b.price_one_h > a.price_one_h) ? -1 : 0));
        else if(sortType == "prixDecroissant")
            adverts.sort((a,b) => (a.price_one_h > b.price_one_h) ? -1 : ((b.price_one_h > a.price_one_h) ? 0 : 0));
        else if(sortType == "plusRecent")
            adverts.sort((a,b) => (a.created_at > b.created_at) ? -1 : ((b.created_at > a.created_at) ? -1 : 0));
        else if(sortType == "plusAncien")
            adverts.sort((a,b) => (a.created_at > b.created_at) ? 0 : ((b.created_at > a.created_at) ? 0 : 0));


        this.$els.adverts = adverts;
        this.$els.advertsM = _this.splitInPages(adverts)
        this.displayAdverts();
    }

    addEventFilter() {
        var _this = this;

        $(document).on('change', '.js-filter', function(event) {

            var filter_on = _this.$els.filter_on;

            if(this.type == "checkbox") {
                filter_on[this.id] = this.checked;
                if(this.checked == true) 
                    delete filter_on[this.id];
            } 
            else {
                filter_on[this.id] = this.value; // add filter
                if(this.value == "") 
                    delete filter_on[this.id]; // remove filter
            }


            _this.$els.filter_on = filter_on; // save filters

            _this.getAdverts($('title')[0].innerHTML, false);

        }); 
    }

    filter(adverts) {

        if(adverts == false || adverts == undefined)
            adverts = this.$els.adverts;

        // reduce the description length
        for(let d of adverts) {
            if(d.desc.length > 0)
                d.desc = d.desc.substring(0, 300) + "...";
        }

        if(adverts == undefined)
            adverts = false;

        var urgent = this.$els.urgent;

        var _this = this;
        var filter_on = this.$els.filter_on;

        filter_on = Object.entries(filter_on); // convertion en array

        var value;
        var key;

        // filters
        for ([key, value] of filter_on) {

            if(key == "place" && typeof value == "object") {
                adverts = adverts.filter(function(v){
                    return value.includes(v[key]);
                });
            }
            else if(key == "PAR" || key == "PRO") {
                adverts = adverts.filter(function(v){
                    return (v["user_status"] != key)
                });
            }
            else if(key == "activity" || key == "place" || key == "user_language") {
                adverts = adverts.filter(function(v){
                    var a = v[key].toLowerCase();
                    var b = value.toLowerCase();
                    return a.includes(b);
                });
            }
            else if(key == "date") {
                adverts = adverts.filter(function(v){
                    return (value >= v["date_from"] && value <= v["date_to"]);
                });
            }
            else if(key == "inpSalMin") {
                adverts = adverts.filter(function(v){
                    return (v["salaire"] >= value);
                });
            }
            else if(key == "inpSalMax") {
                adverts = adverts.filter(function(v){
                    return (v["salaire"] <= value);
                });      
            }
            else {
                adverts = adverts.filter(function(v){
                    return (value == v[key]);
                });   
            }
            if(urgent) {
                adverts = adverts.filter(function(v){
                    return (v["premium_urgent_week"] == 1);
                });  
            }
        }

        this.$els.adverts = adverts;
        this.$els.advertsM = _this.splitInPages(adverts);
        this.changeOrder(adverts);
    }

    toggleAdvert() {

        var _this = this;

        $(document).on('click', '.js-toggleAnnonce', function(event) {

            var url = $(this).attr('id');

            if($('#sectionContent')[0].innerHTML == "") {
                $('#sectionContent').load(url, function(data) {

                    if($(data).find('.lat').length > 0) {
                        var lat = $(data).find('.lat')[0].innerHTML;
                        var lng = $(data).find('.lng')[0].innerHTML;
                        _this.initMap(lat, lng);
                    }

                    _this.initFav();
                    $("body").toggleClass("stopScrolling");

                    flkyProfil: new Flickity('.main-carousel', {
                        autoPlay: true,
                        wrapAround: true,
                        contain: true,
                        cellAlign: 'center',
                        pageDots: true,
                        pauseAutoPlayOnHover: true,
                        autoPlay: 5000,
                        prevNextButtons: false,
                    })
                })  
            } else {
                $('#sectionContent')[0].innerHTML = "";
                _this.initFav();
                $("body").toggleClass("stopScrolling");
            }       
        }); 
    }

    getActs() {

        if($('#activity').length == 1) {
        
            $.ajax({
                method: "get",
                url: "/getActs",
                success: function (data) {

                    for(var item of data){
                        $('#dataActivities')[0].innerHTML += "<option value="+item.activity+">";
                    }

                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            }) 
        }
    } 

    getCities() {

        var _this = this;

        // make the request only after the user finish tiping (wait 1s)

        var typingTimer;
        var doneTypingInterval = 1000;
        var $input = $('#place');

        //on keyup, start the countdown
        $input.on('keyup', function (event) {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
            $('.searchCity')[0].id = "";
        });

        //on keydown, clear the countdown 
        $input.on('keydown', function () {
            clearTimeout(typingTimer);
        });

        //user is "finished typing,"
        function doneTyping () {

            $('.searchCity')[0].id = "hidden";

            var city = $('#place')[0].value;
            var url = "http://api.geonames.org/searchJSON?q="+city+"&maxRows=5&username=gwendal"

            if(city.length > 0) {
                $.ajax({
                    method: "get",
                    url: url,
                    success: function (data) {

                        $('.suggestions')[0].innerHTML = "";

                        for (var value of data.geonames) {

                            if(value.countryName != undefined)
                                $('.suggestions')[0].innerHTML += "<div class='itemSug "+value.lat+" "+value.lng+"'>"+value.name+", "+value.countryName+"</div>";
                            else
                                $('.suggestions')[0].innerHTML += "<div class='itemSug'>"+value.name+"</div>";
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                }) 
            } else {
                $('.suggestions')[0].innerHTML = "";
            }
        }

        $(document).on('click', '.itemSug', function(event) {

            $('.suggestions')[0].innerHTML = "";

            if($('#place_lat').length > 0) {
                $('#place_lat')[0].value = this.classList[1]
                $('#place_lng')[0].value = this.classList[2]
            }

            $('#place')[0].value = this.innerHTML.split(', ')[0];
        })

        $(document).on("click", function(e) {
            $('.suggestions')[0].innerHTML = "";
        })
    }
    
    getUrgent() {
        var _this = this
        $(document).on('click', '.js-inpUrgent', function(event) { 
            _this.getAdverts("Urgent");
            _this.$els.urgent = true;
        })
        $(document).on('click', '.js-inpTout', function(event) { 
            _this.getAdverts("Annonce");
            _this.$els.urgent = false;
        })       
    } 

    changePage() {
        var _this = this;

        $(document).on('click', '#changePage', function(event) { 
            var page = this.innerHTML - 1;
            window.scrollTo(0,0);    
            _this.displayAdverts(page);
        })
    } 

    splitInPages(array) {

        var resultat = [];
        var i,j,temparray,chunk = 8;

        for (i=0,j=array.length; i<j; i+=chunk) {
            temparray = array.slice(i,i+chunk);
            resultat.push(temparray);
        }

        return resultat;
    }

    hideMap() {

        var _this = this;

        $(".hideMap").on("click", function() {
            $('.divM').removeClass("mapFull");
            $('.divM').toggleClass("mapHidden");
            _this.initMapAdverts();
        })
    }

    expandMap() {

        var _this = this;

        $(".expandMap").on("click", function() {
            $('.divM').removeClass("mapHidden");
            $('.divM').toggleClass("mapFull");
            _this.initMapAdverts();
        })
    }
}