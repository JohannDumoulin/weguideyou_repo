import $ from "jquery";

export default class Profil {
    constructor() {
        if ($('body').data('content') === "admin"){
            this.initEls();
            this.initEvents();
        }
    }

    initEls(){
        this.$els ={

        }
    }

    initEvents(){
        this.adminNav();
    }

    adminNav(){
        $('.nav-admin>')
    }
}
