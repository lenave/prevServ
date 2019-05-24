$(function () {
    var cookie = new Cookies();
    cookie.get('app_id', function (c) {
        var ticket = new Ticket(c.token);

        $(document).trigger('ticketLoaded', {ticket: ticket, page: 1, app_id: c.app_id});
    });
});

$(document).on('ticketLoaded', function (e, data) {

    data.ticket.index(data.app_id, data.page, function (response) {
        console.log(response);
        if (response.data != undefined && response.data.data.length > 0) {
            var table = $('#table_Tickets');

            table.find('tbody > tr').remove();
            $('.card-list').fadeIn();
            $('#empty_Tickets').fadeOut();


            $.each(response.data.data, function (_, v) {
                created = '-';
                updated = '-';
                if (v.created_at != null) {
                    v.created_at = v.created_at.replace('T', ' ');
                    created = new Date(v.created_at);
                }
                if (v.updated_at != null) {
                    v.updated_at = v.updated_at.replace('T', ' ');
                    updated = new Date(v.updated_at);
                }

                created = created.setFullDate('full');
                updated = updated.setFullDate('full');
                table.find('tbody').append(
                    '<tr>' +
                    '<td><a href="/tickets/'+v.ticket_id+'">'+v.ticket_id+'</a></td>' +
                    '<td>'+v.name+'</td>' +
                    '<td>'+v._status.description+'</div></td>' +
                    '<td>'+v._category.description+'</td>' +
                    '<td>'+created+'</td>' +
                    '<td>'+updated+'</td>' +
                    '</tr>'
                );
            });


            $('.tickets-pagination').twbsPagination({
                totalPages: response.data.last_page,
                visiblePages: 10,
                startPage : data.page,
                prev: '<',
                next: '>',
                first: null,
                last: null,
                onPageClick: function (event, page) {
                    window.scrollTo(0,0);

                    $(document).trigger('ticketLoaded', {ticket: data.ticket, app_id: data.app_id, page: page});
                }
            });



        } else {
            $('.card-list').fadeOut();
            $('#empty_Tickets').fadeIn();
        }
    });
});