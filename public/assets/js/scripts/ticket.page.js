$(function () {
    var cookie = new Cookies();
    cookie.get('app_id', function (c) {
        var ticket = new Ticket(c.token);

        $(document).trigger('ticketLoaded', {ticket: ticket});
    });
});


$(document).on('ticketLoaded', function (e, data) {
    var ticketID = $('#txt_TicketID');
    data.ticket.show(ticketID.val(), function (response) {
        console.log(response);
    });
});