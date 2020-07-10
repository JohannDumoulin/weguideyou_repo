import $ from 'jquery';

export default class Parameters {
    constructor() {
        this.initEls();

        if ($('body').data('content') == "parameters" || $('body').data('content') == "Administrateur"){
            this.initEvents();
        }
    }

    initEls(){
        this.$els ={
            base: "",
        }
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

        var _this = this;

    	$(document).on('click', '.btnAddAlerte', function(event) {

            var alerte = {};

            alerte.type = $('#type')[0].value;
            alerte.act = $('#activity')[0].value;
            alerte.place = $('#place')[0].value;

            $.ajax({ type: "GET",   
                url: _this.$els.base + "/addAlerte",
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

        var _this = this;

        $(document).on('click', '.buttonSup', function(event) {
            this.parentNode.remove();

            var id = this.id

            $.ajax({ type: "GET",   
                url: _this.$els.base + "/removeAlerte",
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
            url: _this.$els.base + "/getAlertes",
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

        var _this = this;

        $.ajax({ type: "GET",   
            url: _this.$els.base + "/displayAlerte",
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

        var _this = this;

        $.ajax({ type: "GET",   
            url: _this.$els.base + "/getInfos",
            success : function(res) {
                $("#mail")[0].value = res.email;
                // $("#siret")[0].value = res.siret;
                // $("#num_licence")[0].value = res.num_licence;
                // $("#IBAN")[0].value = res.IBAN;
                $("#notif_alerte")[0].checked = res.notif_alerte;
            },
            error : function(res) {
                console.log(res.responseJSON);
            }
        });

    }

    modifInfosPerso() {

        var _this = this;

        $(document).on('click', '.js-btnModifyInfos', function(event) {
            
            let infos = {}
            infos.oldMdp = $("#oldMdp")[0].value;
            infos.mail = $("#mail")[0].value;
            infos.mdp = $("#mdp")[0].value;

            $(".msgErreurOld")[0].innerHTML = "";
            $(".msgErreurNew")[0].innerHTML = "";

            $.ajax({ type: "GET",   
                url: _this.$els.base + "/changeInfosPerso",
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

        var _this = this;

        $(document).on('click', '.js-btnModifyInfosA', function(event) {
            
            let infos = {}
            infos.siret = $("#siret")[0].value;
            infos.num_licence = $("#num_licence")[0].value;
            infos.IBAN = $("#IBAN")[0].value;

            $.ajax({ type: "GET",   
                url: _this.$els.base + "/changeInfosA",
                data: {infos: infos},
                success : function(res) {

                },
                error : function(res) {
                    console.log(res.responseJSON);
                }
            });

        });
    }

    modifPrefNotif() {

        var _this = this;

        $(document).on('change', '#notif_alerte', function(event) {
            $('.switch_alerte')[0].style.pointerEvents = "none";

            let infos = {};
            infos.notif_alerte = this.checked;

            $.ajax({
                method: "get",
                url: _this.$els.base + "/modifPrefNotif",
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

        var _this = this;

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

        var _this = this;

        $(document).on('click', '.js-btnDeleteAccount', function(event) {

            if(confirm ($(this).data('confirm'))) {
                $.ajax({
                    method: "get",
                    data: {id: null},
                    url: _this.$els.base + "/deleteAccount",
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
