$( document ).ready(function() {
    function showMessage(messageHTML) {
        $('#chatContent').text( $('#chatContent').text()+messageHTML+'\n');
        chat = $('#chatContent')
        chat.scrollTop(chat[0].scrollHeight - chat.height());
	}

	$(document).ready(function(){
        var websocket = new WebSocket("ws://phptutorial.localhost:8090/pages/chatExample/php-socket.php");

		websocket.onopen = function(event) {
			showMessage("Verbindung hergestellt");
		}
		websocket.onmessage = function(event) {
			var Data = JSON.parse(event.data);
			showMessage(Data.message);
            $('#myMessage').val('');
		};

		websocket.onerror = function(event){
			showMessage("Fehler");
		};
		websocket.onclose = function(event){
			showMessage("Verbindung geschlossen");
		};

		$('#formChat').on("submit",function(event){
			event.preventDefault();

			var messageJSON = {
				chat_user: $('#user').val(),
                chat_message: $('#myMessage').val()
			};
			websocket.send(JSON.stringify(messageJSON));
		});
    });
});