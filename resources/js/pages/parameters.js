import $ from 'jquery';

export default class Parameters {
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){

    }

    initEvents(){
        this.addAlerte();
        this.removeAlerte();
        this.getAlertes();
    }

    addAlerte() {

    	$(document).on('click', '.btnAddAlerte', function(event) {

            var alerte = {};

            alerte.type = $('#type')[0].value;
            alerte.act = $('#activity')[0].value;
            alerte.place = $('#place')[0].value;

            $.ajax({ type: "GET",   
                url: "/addAlerte",
                data: {alerte: alerte},
                success : function(res) {
                    console.log(res);
                    $('.divElemAlertes').append(res);
                },
                error : function(res) {
                    console.log(res.responseJSON);
                }
            });
    	});
    }    

    removeAlerte() {

        $(document).on('click', '.buttonSup', function(event) {
            this.parentNode.remove();

            var id = this.id

            $.ajax({ type: "GET",   
                url: "/removeAlerte",
                data: {id: id},
                success : function(res) {
                    console.log(res);
                }
            });
        });
    }

    getAlertes() {

        var _this = this;

        $.ajax({ type: "GET",   
            url: "/getAlertes",
            success : function(alertes) {
                for(var alerte of alertes) {
                    _this.displayAlerte(alerte)
                }
            },
            error : function(res) {
                console.log(res.responseJSON);
            }
        });
    }

    displayAlerte(alerte) {

        $.ajax({ type: "GET",   
            url: "/displayAlerte",
            data: {id: alerte.id},
            success : function(res) {
                $('.divElemAlertes').append(res);
            },
            error : function(res) {
                console.log(res.responseJSON);
            }
        });
    }
}
