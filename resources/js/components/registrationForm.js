import $ from 'jquery';
import Flickity from 'flickity';

export default class RegistrationForm {
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            flky: new Flickity( '.main-carousel', {
                freeScroll: false,
                contain: true,
                // disable previous & next buttons and dots
                prevNextButtons: false
            }),
            registrationBtn: $('#js-registrationBtn'),
            registrationBack : $('#close-registration'),
        }
    }

    initEvents(){
        this.getRegistrationPanel();
    }

    getRegistrationPanel(){
        $('.registration').toggleClass("hidden");
        this.$els.registrationBtn.click(function(){
            $('.registration').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
        this.$els.registrationBack.click(function(){
            $('.registration').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
    }

}
