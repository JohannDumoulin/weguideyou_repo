import $ from 'jquery';


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
        }
    }

    initEvents(){
        this.getAdvertisementPage();
    }

    initEventsAdverts() {
        this.getAdverts($('title')[0].innerHTML);
        this.getActs();
        this.getCities();
        this.toggleAdvert();
        this.deleteAdvert();
        this.getUrgent();
        this.changePage();
        this.addEventSort();
        this.addEventFilter();
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

        // afficher qu'une seule annonce
        var url = window.location.pathname;
        if(url.includes("a/")) {
            var id = url[url.length -1];
            type = id;
        }

        $.ajax({
            method: "get",
            url: "/getAdverts",
            data: {type: type},
            success : function(data) {

                _this.$els.adverts = data;
                _this.$els.advertsM = _this.splitInPages(data)

                _this.filter(data); // => changeOrder => display
            },
            error : function(data) {
                console.log(data.responseJSON)
            }
        })
    }

    displayAdverts(page) {

        if(page == undefined)
            page = 0

        let _this = this;
        var adverts = this.$els.adverts;
        var advertsM = this.$els.advertsM;

        // affiche nbr total d'annonces
        $('.nbrAdverts')[0].innerHTML = adverts.length

        $('#js-container')[0].innerHTML = "";
        var c = 0;
        var url;

        if(advertsM[page] === undefined) {
            $('#js-container')[0].innerHTML = "Aucune offres ne correspond à vos critères"
            $(".divPage")[0].innerHTML = ""
            return 0;
        }

        // affiche toutes les annonces d'une page
        for(let advert of advertsM[page]) {

            url = "/advert/"+advert.id;
            if($('body').data('content') == "mes_annonces") {
                url = "/mAdvert/"+advert.id;
            }

            $.ajax({ type: "GET",   
                url: url,
                success : function(res) {
                    $('#js-container').append(res);
                    c++;
                    if(c === advertsM[page].length) {
                        _this.initFav();
                        _this.initMapAdverts(adverts);
                    }
                }
            });
        }

        // Display btn change page

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
            }
        });   
    }

    initMap(place) {

        let x;
        let y;

        $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q='+place, function(data){
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


    initMapAdverts(adverts) {
        // get every city
        // init map
        // set markers
        /*
        var group = new L.featureGroup([marker1, marker2, marker3]);
        map.fitBounds(group.getBounds());
        */
        //console.log(adverts);



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
        var value = this.$els.sortType;

        $.ajax({
            method: "get",
            url: "/sortAdverts",
            data: {type: value, adverts: JSON.stringify(adverts)},
            success: function (data) { 

                _this.$els.adverts = data;
                _this.$els.advertsM = _this.splitInPages(data)

                _this.displayAdverts();
            },
            error: function(data) {
                console.log(data.responseJSON);
            }
        })
    }

    addEventFilter() {
        var _this = this;
        var filter_on = this.$els.filter_on;

        $(document).on('change', '.js-filter', function(event) {

            console.log("change");

            filter_on[this.id] = this.value; // add filter
            if(this.value == "")
                delete filter_on[this.id]; // remove filter

            _this.$els.filter_on = filter_on; // save filters

            _this.filter();
        }); 
    }

    filter(data) {

        if(data == undefined)
            data = false;

        var urgent = this.$els.urgent;

        var _this = this;
        var filter_on = this.$els.filter_on;

        $.ajax({
            method: "get",
            url: "/filterAdverts",
            data: {filter_on: filter_on, adverts: JSON.stringify(data), urgent: urgent},
            success: function (data) {
                data = Object.keys(data).map(i => data[i]);

                _this.$els.adverts = data;
                _this.$els.advertsM = _this.splitInPages(data)

                _this.changeOrder(data);
            },
            error: function(data) {
                console.log(data.responseJSON);
            }
        })
    }

    toggleAdvert() {

        var _this = this;

        $(document).on('click', '.js-toggleAnnonce', function(event) {

            if($('#sectionContent')[0].innerHTML == "") {
                $('#sectionContent').load($(this).attr('id'), function(data) {
                    var location = $(data).find('.firstL')[0].id;
                    _this.initMap(location);
                    _this.initFav();
                })  
            } else {
                $('#sectionContent')[0].innerHTML = "";
                _this.initFav();
            }  

            $("body").toggleClass("stopScrolling");     
        }); 
    }

    getCities() {
/*
        $('#place').on("input", function() {

            var value = this.value;

            $.ajax({
                method: "get",
                url: "https://api.teleport.org/api/cities/?search="+value,

                success: function (data) {
                    var res = Object.entries(data._embedded)[0][1]

                    if(value != "") {
                        $('#dataPlaces')[0].innerHTML = "";

                        for(var item of res){
                            //$('#dataPlaces')[0].innerHTML += '<option value='+item.matching_full_name+'>'
                            $('#dataPlaces')[0].innerHTML += '<option value='+item.matching_full_name+'>'+item.matching_full_name+'</option'
                        }
                    }
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            })
        });*/ 
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

    deleteAdvert() {
        $(document).on('click', '.js-btnDeleteAdvert', function(event) {

            if ( confirm( "Voulez vous vraiment supprimer cette annonce ? \n\nCette annonce sera définitivement supprimer." ) ) {

                var id = this.id;

                $('.mAdvert.'+this.id).remove();

                $.ajax({
                    method: "get",
                    url: "/deleteAdvert",
                    data: {id: id},
                    success: function (data) {
                        //console.log(data);
                    },
                    error: function(data) {
                        console.log(data.responseJSON);
                    }
                })
            }
        }); 
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
        var i,j,temparray,chunk = 10;

        for (i=0,j=array.length; i<j; i+=chunk) {
            temparray = array.slice(i,i+chunk);
            resultat.push(temparray);
        }

        return resultat;
    }
}