$( document ).ready(function() {
    const objWordle = new Wordle();
});

class Wordle {
    #round = 1;

    constructor() {
        const me = this;

        $('.letterContainer.aktivWordle input').first().focus();

        $('.letterInput').keyup(function (e) {
            var value = $(this).val(),
                date_regex = /^[A-z]{1}$/;
            if (e.which == 13 || e.which == 10) {
                $(this).focusout();
                $('#checkButton').focus();
                me.#checkIt();
            } else if ($(this).val() && (date_regex.test(value))) {
                $(this).removeClass('inputEmpty');
                me.#focusNextLetter(this);
            } else if (e.which == 8 || e.which == 46) {
                me.#focusPreviosLetter(this);
            }
        });

        $('#checkButton').click(function () {
            me.#checkIt();
        });

        $('#reloadButton').click(function () {
            location.reload();
        });
    }

    #toastThis(message){
        $(".toast-body").html(message);
        $(".toast").toast("show");
    }

    #checkIt(){
        if(this.#validateWordle()) {
            this.#checkWordle();
        }else{
            this.#toastThis('Bitte alle Felder ausfüllen');
        }
    }

    #validateWordle(){
        var success = true;
        $.each($('.letterContainer.aktivWordle input'), function( key, value ) {
            if(!$(this).val()){
                $(this).addClass('inputEmpty');
                success = false;
            }
        });
        return success;
    }

    #checkWordle(){
        var wort = $('#wort').val().toUpperCase(),
            aWort = [],
            $wordleInput = $('.letterContainer.aktivWordle input');

        for(var i=0;i<wort.length;i++){
            aWort[i] = wort.substring(i, i+1);
        }

        $.each($wordleInput, function( key, value ) {
            if($(this).val().toUpperCase() === aWort[key]){
                $(this).addClass('rightLetter');
                aWort[key] = null;
            }
        });

        $.each($wordleInput, function( key, value ) {
            if(!$(this).hasClass('rightLetter')){
                for(var i=0;i<aWort.length;i++){
                    if(aWort[i] === $(this).val().toUpperCase()){
                        $(this).removeClass('coldLetter');
                        $(this).addClass('warmLetter');
                    }else if(!$(this).hasClass('warmLetter')){
                        $(this).addClass('coldLetter');
                    }
                }
            }
        });
        this.#prepareNextRound();
    }

    #prepareNextRound(){
        var $aktivWordle = $('.letterContainer.aktivWordle');
        if(!this.#checkFinal($aktivWordle)) {
            $aktivWordle.find('input').attr('readonly', true);
            $aktivWordle.addClass('pastWordle').removeClass('aktivWordle');
            $aktivWordle.next().addClass('aktivWordle');
            $('.letterContainer.aktivWordle input').first().focus();
            this.#round += 1;
        }
    }

    #checkFinal($obj){
        if($obj.find('input.rightLetter').length === 5){
            this.#toastThis('Super! Du hast es geschafft');
            $obj.find('input').attr('readonly', true);
            $('#reloadButton').show();
            return true;
        }else if(this.#round === 6){
            $obj.find('input').attr('readonly', true);
            this.#toastThis('Deine 5 Versuche sind verbraucht. '+$('#wort').val()+' war gesucht. Versuche es nochmal.');
            $('#reloadButton').show();
            return true;
        }
        return false;
    }

    #focusPreviosLetter(obj){
        var $objInput = $(obj);
        var $prevInput = $objInput.parent().prev().find('input');
        if($prevInput){
            $prevInput.focus();
        }
    }

    #focusNextLetter(obj){
        var $objInput = $(obj),
            saveKey = null,
            $nextInput= null;

        $.each($('.letterContainer.aktivWordle input'), function( key, value ) {
            if(saveKey !== null && !$nextInput){
                $nextInput = $(this);
                $nextInput.focus();
                return false;
            }

            if($(this).attr('id') === $objInput.attr('id')){
                saveKey = key;
            }
        });
    }
}