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
    }

    toggleAnnonce() {
        this.$els.btn.on("click", function() {
            $(".annonce").toggleClass("hidden");
            $("body").toggleClass("stopScrolling");
        });
    }

}
