import $ from 'jquery';

export default class Annonce{
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={

        }
    }

    initEvents(){
        this.toggleFavorite();
        this.getFavorites();
    }

    toggleFavorite() {

        $(document).on("click", ".buttonFav", function(event) {

            event.stopPropagation();

            this.classList.toggle("buttonFavOn");

            var value = this.className.includes("buttonFavOn"); // true => add favoris - false => remove favoris
            var id = this.id

            $.ajax({
                method: "get",
                url: "/toggleFavorite",
                data: {type: value, id: id},
                success: function (data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            })
        });
    }

    getFavorites() {
        $.ajax({
            method: "get",
            url: "/getFavorites",
            success: function (data) {
                //console.log(data);
            },
            error: function(data) {
                console.log(data.responseJSON);
            }
        })
    }

}
