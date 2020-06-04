import $ from 'jquery';

export default class Nav {
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={

        }
    }

    initEvents(){
        this.onMoveNav();
    }

    onMoveNav(){
        /*let lastScrollTop = 0;
        $(window).on( "scroll", function(){
            let st = $( this ).scrollTop();
            if (st<150){
                // top
                $('.js-onMoveNav').removeClass("navShow");
                $('.js-onMoveNav').addClass("navHidden");
            }else{
                if ( st > lastScrollTop ){
                    // to bottom
                    $('.js-onMoveNav').removeClass("navShow");
                    $('.js-onMoveNav').addClass("navHidden");
                } else {
                    // to top
                    $('.js-onMoveNav').removeClass("navHidden");
                    $('.js-onMoveNav').addClass("navShow");
                }
            }
            lastScrollTop = st;
        });*/
    }
}
