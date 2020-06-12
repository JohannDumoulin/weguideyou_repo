import $ from 'jquery';

export default class CreateAdvertisementPage {
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            form: $('form'),
            left_btn: $('#left'),
            right_btn: $('#right'),
        }
    }

    initEvents(){
        this.getCreateAdvertisementPage();
    }

    getCreateAdvertisementPage(){
        this.$els.left_btn.click(function(){
            if($(this).hasClass('js-active')) {
            	if ($('form').hasClass('js-second')) {
            		$('form').removeClass('js-second');
            		$('#left').removeClass('js-active');
            	}

            	else {
            		$('form').addClass('js-second');
            		$('form').removeClass('js-third');
            		$('#right').addClass('js-active');
            	}
            }
        });

        this.$els.right_btn.click(function(){
            if($(this).hasClass('js-active')) {
            	if(!$('form').hasClass('js-second')) {
            		$('form').addClass('js-second');
            		$('#left').addClass('js-active');
            	}

            	else {
            		$('form').addClass('js-third');
            		$('form').removeClass('js-second');
            		$('#right').removeClass('js-active');
            		
            	}
            }
        });
    }   
}