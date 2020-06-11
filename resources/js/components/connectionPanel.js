import $ from 'jquery';

export default class ConnectionPanel {
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            btn: $('.js-toggleConnectionContainer'),
            back: $('.js-back')
        }
    }

    initEvents(){
        this.getConnectionContainer();
    }

    getConnectionContainer(){
        this.$els.btn.click(function(){
            $('.js-ConnectionContainer').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
        this.$els.back.click(function(){
            $('.js-ConnectionContainer').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
    }
}

