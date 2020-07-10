import $ from 'jquery';

export default class CreateAdvertisementPage {
    constructor() {
        this.initEls();
        this.initEvents();
    }

    initEls(){
        this.$els ={
            form: $('form'),
            left_btn: $('#left'),
            right_btn: $('#right'),
        }
    }

    initEvents(){

        if($('body').data('content') == "create_advertisement") {
            this.getCreateAdvertisementPage();
            this.changeAdvertType();
            this.setMaxPictures();
        }

    }

    changeAdvertType() {
        var _this = this;

        $('.inpType').change(function() {
            _this.toggleVisibilityInp(this.value)
        })
    }

    toggleVisibilityInp(type) {

        var divInps = $('.form-group');
        let inps = []

        for(let divInp of divInps) {
            if(divInp.classList.contains(type)) {
                divInp.style.display = "block";
                inps = divInp.querySelectorAll('input, select');
                toggleRequired(inps, true)
            }
            else {
                divInp.style.display = "none";
                inps = divInp.querySelectorAll('input, select');
                toggleRequired(inps, false)
            }
        }

        function toggleRequired(inps, value) {
            for(let inp of inps) {
                if(inp.classList.contains("required"))
                    inp.required = value;
            }
        }
    }

    getCreateAdvertisementPage(){
        this.$els.left_btn.click(function(){
            if($(this).hasClass('js-active')) {
            	if ($('form').hasClass('js-second')) {
            		$('form').removeClass('js-second');
            		$('#left').removeClass('js-active');
            	}

            	else {
            		$('form').addClass('js-second');
            		$('form').removeClass('js-third');
            		$('#right').addClass('js-active');
            	}
            }
        });

        this.$els.right_btn.click(function(){
            if($(this).hasClass('js-active')) {
            	if(!$('form').hasClass('js-second')) {
            		$('form').addClass('js-second');
            		$('#left').addClass('js-active');
            	}

            	else {
            		$('form').addClass('js-third');
            		$('form').removeClass('js-second');
            		$('#right').removeClass('js-active');
            		
            	}
            }
        });
    }

    setMaxPictures() {
        $("input[type='file']").change(function(){

            if(this.files.length > 5) {
                $('.msgFiles')[0].style.display = "block";
                $('#submit')[0].classList = 'cantClick';    
            } else {
                $('#submit')[0].classList = '';
                $('.msgFiles')[0].style.display = "none";
            }
        });   
    }
}