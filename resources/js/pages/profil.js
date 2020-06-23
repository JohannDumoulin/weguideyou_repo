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
            btn: $('#js-modifyProfile'),
            back: $('.js-back-profile-updatePanel')
        }
    }

    initEvents(){
        this.bannerParallax();
        this.getUpdatePanel();
    }

    bannerParallax(){
        $(window).on("scroll",function() {
            $(".profil-Banner").css({backgroundPositionY: -window.scrollY*0.07+'px'});
        });
    }

    getUpdatePanel(){
        this.$els.btn.click(function(){
            $('.js-profile-updatePanel').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
        this.$els.back.click(function(){
            $('.js-profile-updatePanel').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
    }
}
