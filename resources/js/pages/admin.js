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
            base: "",
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

        var _this = this;

        $('.data-content-main').click(function(event){

            if(event.target.classList == "js-btnDeleteAccount") {
                let id = event.target.id;

                if(confirm (`
Voulez vous vraiment supprimer ce compte ?

Le compte sera définitivement supprimer ainsi que toutes les données lui étant liées (annonces, favoris, commentaires...).
                    `)) {

                    $.ajax({
                        method: "get",
                        data: {id: id},
                        url: _this.$els.base + "/deleteAccount",
                        success: function (data) {
                            window.location.href = "/admin";
                        },
                        error: function(data) {
                            console.log(data.responseJSON);
                        }
                    })
                }
            }
            else if(event.target.classList == "js-btnDeleteAdvert")
                _this.deleteAdvert(event.target.id);
            else {
                if ($(this).siblings('.js-dataDetail').hasClass("is-hidden")){
                    $('.js-dataDetail').addClass("is-hidden");
                    $(this).siblings('.js-dataDetail').removeClass("is-hidden");
                } else{
                    $('.js-dataDetail').addClass("is-hidden");
                }
            }
        });
    }

    deleteAdvert(id) {

        var _this = this;

        if(confirm (`
Voulez vous vraiment supprimer cette annonce ?
Cette annonce sera définitivement supprimer.
        `)) {

            $.ajax({
                method: "get",
                url: _this.$els.base + "/deleteAdvert",
                data: {id: id},
                success: function (data) {
                    window.location.href = "/admin";
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            })
        }
    }
}
