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
            }),
            btn: $('#js-modifyProfile'),
            back: $('.js-back-profile-updatePanel')
        }
    }

    initEvents(){
        this.bannerParallax();
        this.getUpdatePanel();
        this.langUpdate();
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

    langUpdate(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })

        $('.js-userLangUpdate').click(function(event){
            event.preventDefault();
            //let that = event.currentTarget;
            let str = $(".data-checkbox").serialize();
            $.ajax({
                method: 'post',
                url: '/updateLang',
                data: str
            })
            /*.done((data) => {
                console.log('success');
                console.log(data);
            })
            .fail((data) => {
                console.log('failed');
                console.log(data);
            });*/

            //console.log(event.currentTarget);
        });
    }
}
