import $ from 'jquery';

export default class MenuProfil {
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            btn: $('.js-toggleModalProfil'),
            back: $('.js-reste')
        }
    }

    initEvents(){
        this.getMenuProfil();
    }

    getMenuProfil(){
        this.$els.btn.click(function(){
            $('.js-menuProfil').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
        this.$els.back.click(function(){
            $('.js-menuProfil').toggleClass("hidden");
            $('body').toggleClass("stopScrolling");
        });
    }
}

