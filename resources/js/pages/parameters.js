import $ from 'jquery';

export default class Parameters {
    constructor() {
        this.initEls();

        if ($('body').data('content') == "parameters"){
            this.initEvents();
        }
    }

    initEls(){

    }

    initEvents(){
        this.addAlerte();
        this.removeAlerte();
        this.getAlertes();
        this.modifInfos();
        this.setInfos();
        this.toggleVisibilityPassword();
        this.deleteAccount();
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

                },
                error : function(res) {
                    console.log(res.responseJSON);
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

    setInfos() {

        $.ajax({ type: "GET",   
            url: "/getInfos",
            success : function(res) {
                $("#mail")[0].value = res.email;
            },
            error : function(res) {
                console.log(res.responseJSON);
            }
        });

    }

    modifInfos() {
        $(document).on('click', '.js-btnModifyInfos', function(event) {
            
            var infos = {}
            infos.oldMdp = $("#oldMdp")[0].value;
            infos.mail = $("#mail")[0].value;
            infos.mdp = $("#mdp")[0].value;

            $(".msgErreurOld")[0].innerHTML = "";
            $(".msgErreurNew")[0].innerHTML = "";

            $.ajax({ type: "GET",   
                url: "/changeInfos",
                data: {infos: infos},
                success : function(res) {

                    if(res == 0)
                        $(".msgErreurOld")[0].innerHTML = "Mot de passe incorrect";
                    else if(res == "c")
                        $(".msgErreurNew")[0].innerHTML = "Mot de passe trop court (minimum 6 caractères)";
                    else
                        window.location.href = "/parametres";
                },
                error : function(res) {
                    console.log(res.responseJSON);
                }
            });

        });
    }

    toggleVisibilityPassword() {
        $(document).on('click', '.js-visiPassword', function(event) {

            var inp = $("#mdp")[0];

            if (inp.type === "password") {
                inp.type = "text";
            } else {
                inp.type = "password";
            }

            this.classList.toggle("fa-eye-slash");
        });
    }

    deleteAccount() {
        $(document).on('click', '.js-btnDeleteAccount', function(event) {

            if ( confirm( `
Voulez vous vraiment supprimer votre compte ? \n
Votre compte sera définitivement supprimer ainsi que toutes les données lui étant liées (annonces, favoris, commentaires...).\n` ) ) {

                $.ajax({
                    method: "get",
                    url: "/deleteAccount",
                    success: function (data) {
                       window.location.href = "/";
                    },
                    error: function(data) {
                        console.log(data.responseJSON);
                    }
                })
            }
        });     
    }
}
