import $ from "jquery";

export default class Admin {
    constructor() {
        if ($('body').data('content') === "mailbox"){
            this.initEls();
            this.initEvents();
        }
    }

    initEls(){
        this.$els ={

        }
    }

    initEvents(){
        this.setActive();
    }

    setActive() {
        var id_page = window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1);

        $("#"+id_page)[0].classList.toggle('selected');
    }
}
