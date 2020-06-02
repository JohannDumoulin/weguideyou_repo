import $ from 'jquery';

export default class Annonce{
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            btn: $('.js-toggleAnnonce'),
        }
    }

    initEvents(){
        this.toggleAnnonce();
        this.initMap();
    }

    toggleAnnonce() {
        this.$els.btn.on("click", function() {
            $(".annonce").toggleClass("hidden");
            $("body").toggleClass("stopScrolling");
            $(".modalAnnonce").scrollTop(0);
        });
    }

    initMap() {
        var pos= {lat: 45.420258, lng: 6.613953};
        var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 12, center: pos});
        var marker = new google.maps.Marker({position: pos, map: map});
    }

}
