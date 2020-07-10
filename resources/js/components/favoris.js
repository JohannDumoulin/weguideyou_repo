import $ from 'jquery';

export default class Annonce{
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            base: "",
        }
    }

    initEvents(){
        this.toggleFavorite();
        this.getFavorites();
    }

    toggleFavorite() {

        var _this = this;

        $(document).on("click", ".buttonFav", function(event) {

            event.stopPropagation();

            this.classList.toggle("buttonFavOn");

            var value = this.className.includes("buttonFavOn"); // true => add favoris - false => remove favoris
            var id = this.id

            $.ajax({
                method: "get",
                url: _this.$els.base + "/toggleFavorite",
                data: {type: value, id: id},
                success: function (data) {
                    //console.log(data);
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            })
        });
    }

    getFavorites() {

        var _this = this;

        $.ajax({
            method: "get",
            url: _this.$els.base + "/getFavorites",
            success: function (data) {
                //console.log(data);
            },
            error: function(data) {
                console.log(data.responseJSON);
            }
        })
    }
}
