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

        if ($('body').data('content') == "mes_annonces"){
            this.toggleCheckbox();
            this.toggleOnglet();
            this.deleteAdvert();
            this.saveModif();
        }
        
    }

    toggleCheckbox() {
        $(document).on('click', '.js-checkAll', function(event) {
            $('input').prop( "checked", this.checked );
        }); 
    }

    toggleOnglet() {
        $(document).on('click', '.js-toggleOnglet', function(event) {
            $(".js-toggleOnglet").toggleClass("selected");
            $(".mAdvert").toggleClass("hidden");
            $(".divHead").toggleClass("hidden");
            $(".divPage").toggleClass("hidden");
        }); 
    }

    deleteAdvert() {
        $(document).on('click', '.js-btnDeleteAdvert', function(event) {

            if ( confirm( "\nVoulez vous vraiment supprimer cette annonce ? \n\nCette annonce sera définitivement supprimer.\n" ) ) {

                var id = this.id;

                $('.mAdvert.'+this.id).remove();

                $.ajax({
                    method: "get",
                    url: "/deleteAdvert",
                    data: {id: id},
                    success: function (data) {
                        //console.log(data);
                    },
                    error: function(data) {
                        console.log(data.responseJSON);
                    }
                })
            }
        }); 
    }

    saveModif() {
        $(document).on('click', '.js-btnSaveModif', function(event) {

            var advert = {};
            advert.id = $(".modalAnnonce")[0].id;
            advert.name = $("#ad-title")[0].value;
            advert.price_one_h = $("#ad-price")[0].value;
            advert.place = $("#ad-place")[0].value;
            advert.date_from = $("#ad-dateStart")[0].value;
            advert.date_to = $("#ad-dateEnd")[0].value;
            advert.desc = $("#ad-description")[0].value;
            if($('#ad-duration').val())
                advert.duration = $("#ad-duration")[0].value;
            if($('#ad-job').val())
                advert.job = $("#ad-job")[0].value;
            if($('#ad-salaire').val())
                advert.salaire = $("#ad-salaire")[0].value;
            if($('#ad-loge').val())
                advert.loge = $("#ad-loge")[0].value;
            if($('#ad-nbPers').val())
                advert.nbPers = $("#ad-nbPers")[0].value;
            if($('#ad-activity').val())
                advert.activity = $("#ad-activity")[0].value;

            var imgs = "";
            var inpImgs = $('.ad-img');
            for(var inpImg of inpImgs) {
                imgs +=inpImg.value + ", ";
            }
            advert.img = imgs;

            $.ajax({
                method: "get",
                url: "/saveModif",
                data: {advert: advert},
                success: function (data) {
                    window.location.href = "/mes_annonces";
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            })
        });
    }
}
