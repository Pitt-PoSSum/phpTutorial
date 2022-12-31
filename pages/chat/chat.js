$( document ).ready(function() {

    iniChat();

    $('#formChat').on("submit",function(event){
        event.preventDefault();
        postMessage();
    });

    function iniChat(){
        whatsUp();
        var intervalId = window.setInterval(function(){
            whatsUp();
        }, 2000);
    }

    function whatsUp(){
        $.ajax({
            method: "POST",
            url: "ChatAjax",
            data: { action: "get"}
        })
        .done(function( json ) {
            writeChat(json);
        });
    }

    function postMessage(){
        $.ajax({
            method: "POST",
            url: "ChatAjax",
            data: { action: "post", user: $('#user').val(), myMessage: $('#myMessage').val()}
        })
        .done(function( json ) {
            addLine($('#user').val(), $('#myMessage').val());
        });
    }

    function writeChat(json){
        chat = $('#chatContent');
        chat.text('');
        $.each(json, function( index, value ) {
            addLine(value['user'], value['message']);
        });
        chat.scrollTop(chat[0].scrollHeight - chat.height());
    }

    function addLine(user, message){
        chat = $('#chatContent');
        chat.text(chat.text()+user+': '+message+'\n');
    }
});