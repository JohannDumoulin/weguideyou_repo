import $ from "jquery";

export default class RegisterForm {
    constructor() {
        this.initEls();
        this.initEvents();
    }
    initEls(){
        this.$els ={
            selectButton: $('#typeAccount'),
        }
    }

    initEvents(){
        this.formGenerator();
    }

    formGenerator(){
        this.$els.selectButton.change(function(){
            let accountStatus = $(this).val();

            if (accountStatus === ''){
                $('.account-par').addClass('hidden');
                $('.account-pro').addClass('hidden');
                $('.account-nso').addClass('hidden');
                /*$('.account-so').addClass('hidden');*/
                $('.account-all').addClass('hidden');
            }
            if (accountStatus === 'PRO'){
                $('.account-par').addClass('hidden');
                $('.account-nso').addClass('hidden');
                /*$('.account-so').addClass('hidden');*/

                $('.account-pro').removeClass('hidden');
                $('.account-all').removeClass('hidden');
            }
            if (accountStatus === 'PAR'){
                $('.account-pro').addClass('hidden');
                $('.account-nso').addClass('hidden');
                /*$('.account-so').addClass('hidden');*/

                $('.account-par').removeClass('hidden');
                $('.account-all').removeClass('hidden');
            }
            if (accountStatus === 'NSO'){
                $('.account-pro').addClass('hidden');
                $('.account-par').addClass('hidden');
                /*$('.account-so').addClass('hidden');*/

                $('.account-nso').removeClass('hidden');
                $('.account-all').removeClass('hidden');
            }
            if (accountStatus === 'SO'){
                $('.account-nso').addClass('hidden');
                $('.account-pro').addClass('hidden');
                $('.account-par').addClass('hidden');

                /*$('.account-so').removeClass('hidden');*/
                $('.account-all').removeClass('hidden');
            }

        });
    }
}
