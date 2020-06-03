import $ from 'jquery';

export default class Annonce{
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            select: $('.js-inputSort'),
        }
    }

    initEvents(){
        this.sort();
    }

    sort() {
        this.$els.select.change(function(){
            var value = $("select option:selected")[0].value
            
        });
    }


}
