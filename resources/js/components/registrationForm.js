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
        }
    }

    initEvents(){

    }

}
