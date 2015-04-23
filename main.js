function makeId() {
    var text = '';
    var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for (var i = 0; i < 6; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return text;
}

var socket = io('http://blvdia.herokuapp.com:80/');
var clientId = '';

function go() {
    clientId = makeId();
    socket.emit('shutter', {
        cameraId: 0,
        clientId: clientId
    });
}

socket.on('shutter', function(msg) {
    console.log('shutter', msg);
});

socket.on('complete', function(msg) {
    console.log('complete', msg);
    document.getElementById('photo').src = msg.url;
});

socket.on('snap', function(msg) {
    document.getElementById('status').innerHTML = 'Snapping photo ' + (parseInt(msg.index) + 1);
    console.log('snap', msg);
});