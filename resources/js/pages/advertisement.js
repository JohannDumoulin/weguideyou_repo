import $ from 'jquery';

export default class AdvertisementPage {
	constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            more_filter_btn: $('.js-more_filter'),
            less_filter_btn: $('.js-less_filter')
        }
    }

    initEvents(){
        this.getAdvertisementPage();
    }

    getAdvertisementPage(){
        this.$els.more_filter_btn.click(function(){
            $(this).removeClass("js-active");
            $('.js-first_filter_more').addClass("js-active");
        });

        this.$els.less_filter_btn.click(function(){
        	console.log('test');
            $('.js-first_filter_more').removeClass("js-active");
            $('.js-more_filter').addClass("js-active");
        });
    }
}