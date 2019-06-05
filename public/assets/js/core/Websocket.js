$(function () {
    window.conn = new WebSocket('ws://18.229.50.99:6001');
    window.conn.onmessage = function(e) {
        console.log(e);
        if (e.data != undefined) {
            var obj = JSON.parse(e.data);

            if (obj.command != undefined)
                websocketCommand(obj);
        }

    };
    window.conn.onopen = function(e) {
        var sessionId = localStorage.getItem('sessionId');
        if (sessionId == null || sessionId == '')
            window.conn.send('{"command": "connect", "secret": "rIyCgHH2j8fQnyCKhGgJjjzGIInlaA0O"}');
        else
            window.conn.send('{"command": "connect", "sessionId": "'+sessionId+'", "secret": "rIyCgHH2j8fQnyCKhGgJjjzGIInlaA0O"}');
    };
    window.conn.onerror = function(e) {

    };
});

function websocketCommand(obj) {
    switch (obj.command) {
        case 'connect':
            if (obj.sessionId != undefined)
                localStorage.setItem('sessionId', obj.sessionId);

            break;

        case 'subscribe':
            if (obj.data == 'success')
                window.location.href = '/';
            else
                alert('Erro ao se inscrever no canal websocket');

            break;

        case 'unsubscribe':
            if (obj.data == 'success') {
                window.location.href = '/login';
                localStorage.clear();
            }

            break;

        case 'disconnect':
            if (obj.data == 'success')
                return true;

            break;

        case 'queue':
            if (obj.data == 'success') {
                var m = JSON.parse(obj.message);

                messageType(m);
            }

            break;
    }
}

function messageType(message) {
    switch (message.type) {
        case 'storeComment':
            var comment = JSON.parse(message.comment);
            if (comment.data.ticket == $('#txt_TicketID').val()) {
                var cookie = new Cookies();
                cookie.get('user_id', function (c) {
                    var ticket = new Ticket(c.token);

                    ticket.buildComment(comment.data, c.user_id, 'prepend');
                });
            } else {
                toastr.info(message.message, 'Novo comentário');
            }

            break;

        case 'storeTicket':
            var checkPage = $('#txt_Current_Page');

            if (checkPage.val() != undefined) {
                cookie = new Cookies();
                cookie.get('app_id', function (c) {
                    var ticket = new Ticket(c.token);

                    $(document).trigger('ticketLoaded', {ticket: ticket, page: 1, app_id: c.app_id});
                });
            } else {
                toastr.info(message.message, 'Novo ticket');
            }

            break;

        case 'updatePanicLocalization':
            var localization = JSON.parse(message.localization);
            var ticket = JSON.parse(message.ticket);
            console.log(localization);
            console.log(ticket);

            if (ticket.status == '1')
                $(document).trigger('removeFeature', {ticket_id: ticket.ticket_id, refresh: true, localization: localization, ticket: ticket});

            break;

        case 'storePanic':
            var panicStore = JSON.parse(message.panic);
            toastr.warning(message.message, 'Pânico!');


            if ($('#alert_Sound').html() != '') {
                console.log('play audio');
                $("#alert_Sound audio")[0].play();
            } else {
                console.log('monta audio');
                var mp3Source = '<source src="/assets/sounds/panic-alert.mp3" type="audio/mpeg">';
                var embedSource = '<embed hidden="true" autostart="true" loop="false" src="/assets/sounds/panic-alert.mp3">';
                document.getElementById("alert_Sound").innerHTML='<audio autoplay="autoplay">' + mp3Source + embedSource + '</audio>';
                $("#alert_Sound audio")[0].play();
            }

            $(document).trigger('storeNewPanic', {ticket_id: panicStore.data.ticket_id, ticket: panicStore.data});

            break;

        case 'updateTicket':
            toastr.info(message.message, 'Ticket atualizado');
            var ticketUpdate = JSON.parse(message.ticket);

            if (ticketUpdate.data.category == '1' && ticketUpdate.data.status == '4')
                $(document).trigger('removeFeature', {ticket_id: ticketUpdate.data.ticket_id});


            break;
    }
}