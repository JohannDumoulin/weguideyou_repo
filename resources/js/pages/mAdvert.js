import $ from 'jquery';

export default class Annonce{
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={

        }
    }

    initEvents(){

        if ($('body').data('content') == "mes_annonces"){
            this.toggleCheckbox();
            this.toggleOnglet();
        }
        
    }

    toggleCheckbox() {
        $(document).on('click', '.js-checkAll', function(event) {
            $('input').prop( "checked", this.checked );
        }); 
    }

    toggleOnglet() {
        $(document).on('click', '.js-toggleOnglet', function(event) {
            $(".js-toggleOnglet").toggleClass("selected");
            $(".mAdvert").toggleClass("hidden");
            $(".divHead").toggleClass("hidden");
        }); 
    }
}
