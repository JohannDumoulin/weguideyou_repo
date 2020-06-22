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
        let length = $('.admin-nav').children();
        console.log(length);
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
            $('.js-dataDetail').siblings().removeClass("is-hidden");
        });
    }
}
