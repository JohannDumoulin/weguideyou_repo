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

        var c = $('body').data('content')
        if(c == "annonces" || c == "home" || c == "parameters")
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

                if(data.length == 0){
                    $('#js-container')[0].innerHTML = "Aucune offres à afficher"
                    $(".divPage")[0].innerHTML = ""
                    return 0;
                }

                var params = data[data.length-1];
                if(params.id === undefined) {

                    _this.$els.filter_on = params;

                    if(params.activity)
                        $("#activity")[0].value = params.activity;
                    if(params.place)
                        $("#place")[0].value = params.place;
                    if(params.date)
                        $("#date")[0].value = params.date;

                    data.pop();
                }

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

        if(page == undefined)
            page = 0

        let _this = this;
        var adverts = this.$els.adverts;
        var advertsM = this.$els.advertsM;

        // affiche nbr total d'annonces
        if($('.nbrAdverts').length > 0)
            $('.nbrAdverts')[0].innerHTML = adverts.length

        //
        if($('#js-container').length > 0)
            $('#js-container')[0].innerHTML = "";
        if($('#js-container-premium').length > 0)
            $('#js-container-premium')[0].innerHTML = "";

        //
        if(advertsM[page] === undefined){
            $('#js-container')[0].innerHTML = "Aucune offres ne correspond à vos critères"
            $(".divPage")[0].innerHTML = ""
            return 0;
        }

        // Bannière A la une

        if($('body').data('content') == "advertisement") {
            var tempBanner = [];
            var banner = [];
            var r

            // récup les annonces premium
            adverts.forEach(function (advert, index) {
                if(advert.premium_banner_week) {
                    tempBanner.push(advert);  
                }
            })
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

            // Afficher les annonces en avant
            for(let b of banner) {

                $.ajax({ type: "GET",   
                    url: "/advert/"+b.id,
                    success : function(res) {
                        $('#js-container-premium').append(res)
                    },
                    error : function(res) {
                        console.log(res.responseJSON);
                    }
                });
            }
        }

        var c = 0;
        var url;
        
        // affiche les annonces
        for(let advert of advertsM[page]) {

            url = "/advert/"+advert.id;
            if($('body').data('content') == "mes_annonces")
                url = "/mAdvert/"+advert.id;

            $.ajax({ type: "GET",   
                url: url,
                success : function(res) {

                    $('#js-container').append(res)

                    c++;
                    if(c === advertsM[page].length) {
                        _this.initFav();
                    }
                },
                error : function(res) {
                    console.log(res.responseJSON);
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

        $(document).on('change', '.js-filter', function(event) {

            var filter_on = _this.$els.filter_on;

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

        var urgent = this.$els.filter_on["urgent"];

        var _this = this;
        var filter_on = this.$els.filter_on;

        if(data != false) {
            var desc = [];
            for(var item of data) {
                desc.push(item.desc);
                delete item.desc;
            }
        }

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

            var url = $(this).attr('id');

            if($('#sectionContent')[0].innerHTML == "") {
                $('#sectionContent').load(url, function(data) {
                    var location = $(data).find('.firstL')[0].id;
                    _this.initMap(location);
                    _this.initFav();

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
            }  

            $("body").toggleClass("stopScrolling");     
        }); 
    }

    getCities() {

        var _this = this;

        $.ajax({
            method: "get",
            url: "/getCities",
            success: function (data) {
                var cities = Object.keys(data).map(function(key) {
                  return data[key].ville_nom;
                });
                _this.$els.cities = cities;
                _this.autocomplete();
            },
            error: function(data) {
                console.log(data.responseJSON);
            }
        }) 
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

    autocomplete(inp, arr) {

        inp = $("#place")[0];
        arr = this.$els.cities;

          var currentFocus;
          /*execute a function when someone writes in the text field:*/
          inp.addEventListener("input", function(e) {

              var a, b, i, val = this.value;
              /*close any already open lists of autocompleted values*/
              closeAllLists();
              if (!val) { return false;}
              currentFocus = -1;
              /*create a DIV element that will contain the items (values):*/
              a = document.createElement("DIV");
              a.setAttribute("id", this.id + "autocomplete-list");
              a.setAttribute("class", "autocomplete-items");
              /*append the DIV element as a child of the autocomplete container:*/
              this.parentNode.appendChild(a);
              /*for each item in the array...*/
              var c = 0;
              for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    c++;
                    if(c > 15)
                        return 0;
                  /*create a DIV element for each matching element:*/
                  b = document.createElement("DIV");
                  /*make the matching letters bold:*/
                  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                  b.innerHTML += arr[i].substr(val.length);
                  /*insert a input field that will hold the current array item's value:*/
                  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                  /*execute a function when someone clicks on the item value (DIV element):*/
                      b.addEventListener("click", function(e) {
                      /*insert the value for the autocomplete text field:*/
                      inp.value = this.getElementsByTagName("input")[0].value;
                      /*close the list of autocompleted values,
                      (or any other open lists of autocompleted values:*/
                      closeAllLists();
                  });
                  a.appendChild(b);
                }
              }
          });
          /*execute a function presses a key on the keyboard:*/
          inp.addEventListener("keydown", function(e) {
              var x = document.getElementById(this.id + "autocomplete-list");
              if (x) x = x.getElementsByTagName("div");
              if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 9) { // quand on appui sur TAB
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault()
                if (x) x[0].click() // autocomple avec le 1er element proposé
                if (currentFocus > -1) {
                  /*and simulate a click on the "active" item:*/
                  if (x) x[currentFocus].click() // autocomple avec l'élément actulement séléctionné
                }
              }
          });
          function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
          }
          function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
              x[i].classList.remove("autocomplete-active");
            }
          }
          function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
              if (elmnt != x[i] && elmnt != inp) {
              x[i].parentNode.removeChild(x[i]);
            }
          }
        }
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