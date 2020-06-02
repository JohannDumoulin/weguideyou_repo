import $ from 'jquery';
import Flickity from 'flickity';

export default class RegistrationForm {
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            flky: new Flickity( '.registration-carousel', {
                freeScroll: true,
                contain: true,
                // disable previous & next buttons and dots
                prevNextButtons: false
            }),
        }
    }

    initEvents(){

    }

}
