import $ from "jquery";

export default class Admin {
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
        this.dataDetails();
    }

    adminNav(){
        $('.admin-nav>span').click(function(){
            let position = $(this).index();

            $('.admin-nav>span').removeClass('is-selected');
            $(this).addClass('is-selected');

            $('.admin-data').addClass('hidden');
            $('.data-nth-'+position).removeClass('hidden');
        });
    }

    dataDetails(){
        $('.data-content-main').click(function(){
            if ($(this).siblings('.js-dataDetail').hasClass("is-hidden")){
                $('.js-dataDetail').addClass("is-hidden");
                $(this).siblings('.js-dataDetail').removeClass("is-hidden");
            } else{
                $('.js-dataDetail').addClass("is-hidden");
            }
        });
    }
}
