

var wsServer = 'ws://127.0.0.1:9502';
var websocket = new WebSocket(wsServer);
$(function(){
    connnec();
    $("#send_msg").on('click',function(){
        var msg = $("#message_txt").val();
        var data = {"msg":msg,"to":123,"type":1};
        websocket.send(JSON.stringify(data).toString());
    });
});

function connnec(){
    websocket.onopen = function (evt) {
        console.log("Connected to WebSocket server.");
    };

    websocket.onclose = function (evt) {
        console.log("Disconnected");
    };

    websocket.onmessage = function (evt) {
        console.log('Retrieved data from server: ' + evt.data);
    };

    websocket.onerror = function (evt, e) {
        console.log('Error occured: ' + evt.data);
    };
}