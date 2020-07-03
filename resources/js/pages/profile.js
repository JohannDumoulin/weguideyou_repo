import $ from 'jquery';
import Flickity from "flickity";

export default class Profile {
    constructor() {
        if ($('body').data('content') === "userProfile"){
            this.initEls();
            this.initEvents();
        }
    }

    initEls(){
        this.$els ={
            flkyProfile: new Flickity( '.profile-main-carousel', {
                freeScroll: false,
                contain: true,
                // disable previous & next buttons and dots
                prevNextButtons: false,
                groupCells: 2,
                cellAlign: 'left',
                pageDots: true,
            }),
            btn: $('#js-modifyProfile'),
            back: $('.js-back-profile-updatePanel'),
            btn_img: $('#js-modifyImg'),
            back_img: $('.js-back-img-updatePanel')
        }
    }

    initEvents(){
        this.bannerParallax();
        this.getUpdatePanel();
        this.getUpdatePanel_img();
    }

    bannerParallax(){
        $(window).on("scroll",function() {
            $(".profile-Banner").css({backgroundPositionY: -window.scrollY*0.07+'px'});
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
    getUpdatePanel_img(){
        this.$els.btn_img.click(function(){
            $('.js-img-updatePanel').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
        this.$els.back_img.click(function(){
            $('.js-img-updatePanel').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
    }
}
