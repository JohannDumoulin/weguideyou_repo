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
        this.modifInfosPerso();
        this.modifInfosA();
        this.modifPrefNotif();
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
                $("#siret")[0].value = res.siret;
                $("#num_licence")[0].value = res.num_licence;
                $("#IBAN")[0].value = res.IBAN;
                $("#notif_alerte")[0].checked = res.notif_alerte;
            },
            error : function(res) {
                console.log(res.responseJSON);
            }
        });

    }

    modifInfosPerso() {
        $(document).on('click', '.js-btnModifyInfos', function(event) {
            
            let infos = {}
            infos.oldMdp = $("#oldMdp")[0].value;
            infos.mail = $("#mail")[0].value;
            infos.mdp = $("#mdp")[0].value;

            $(".msgErreurOld")[0].innerHTML = "";
            $(".msgErreurNew")[0].innerHTML = "";

            $.ajax({ type: "GET",   
                url: "/changeInfosPerso",
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

    modifInfosA() {
        $(document).on('click', '.js-btnModifyInfosA', function(event) {
            
            let infos = {}
            infos.siret = $("#siret")[0].value;
            infos.num_licence = $("#num_licence")[0].value;
            infos.IBAN = $("#IBAN")[0].value;

            $.ajax({ type: "GET",   
                url: "/changeInfosA",
                data: {infos: infos},
                success : function(res) {
                    window.location.href = "/parametres";
                },
                error : function(res) {
                    console.log(res.responseJSON);
                }
            });

        });
    }

    modifPrefNotif() {

        $(document).on('change', '#notif_alerte', function(event) {
            $('.switch_alerte')[0].style.pointerEvents = "none";

            let infos = {};
            infos.notif_alerte = this.checked;

            $.ajax({
                method: "get",
                url: "/modifPrefNotif",
                data: {infos : infos},
                success: function (data) {
                    $('.switch_alerte')[0].style.pointerEvents = "default";
                    window.location.href = "/parametres";
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            })
        })
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
