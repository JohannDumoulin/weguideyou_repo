import $ from 'jquery';
import Flickity from "flickity";

export default class Profil {
    constructor() {
        if ($('body').data('content') === "userProfil"){
            this.initEls();
            this.initEvents();
        }
    }

    initEls(){
        this.$els ={
            flkyProfil: new Flickity( '.profil-main-carousel', {
                freeScroll: false,
                contain: true,
                // disable previous & next buttons and dots
                prevNextButtons: false,
                groupCells: 2,
                cellAlign: 'left',
            }),
        }
    }

    initEvents(){
        this.bannerParallax();
    }

    bannerParallax(){
        $(window).on("scroll",function() {
            $(".profil-Banner").css({backgroundPositionY: -window.scrollY*0.07+'px'});
        });
    }
}
