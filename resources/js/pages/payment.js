import $ from "jquery";

export default class Admin {
    constructor() {
        if ($('body').data('content') === "payment"){
            this.initEls();
            this.initEvents();
        }
    }

    initEls(){
        this.$els ={

        }
    }

    initEvents(){

    }

}
