$(function () {
    var cookie = new Cookies();
    cookie.get('user_id', function (c) {
        var ticket = new Ticket(c.token);

        $(document).trigger('ticketLoaded', {ticket: ticket, user: c.user_id});
        $(document).trigger('listStatus', {ticket: ticket});
    });
});

$(document).on('ticketLoaded', function (e, data) {
    var ticketID = $('#txt_TicketID');
    data.ticket.show(ticketID.val(), function (response) {
        console.log(response);
        if (response.data != undefined) {
            $('#lbl_TicketID').text(response.data.ticket_id);
            $('#lbl_Title').text(response.data.name);
            $('#lbl_Description').text(response.data.description);
            $('#lbl_Status').text(response.data._status.description);
            $('#lbl_Category').text(response.data._category.description);

            $('#dpl_Status').val(response.data.status);

            if (response.data.category == '1')
                $('#div_Map').show();

            if (response.data.status == '4')
                $('[data-open-modal=modal_Change_Status]').remove();

            created = '-';
            updated = '-';
            if (response.data.created_at != null) {
                response.data.created_at = response.data.created_at.replace('T', ' ');
                created = new Date(response.data.created_at);
            }
            if (response.data.updated_at != null) {
                response.data.updated_at = response.data.updated_at.replace('T', ' ');
                updated = new Date(response.data.updated_at);
            }

            created = created.setFullDate('full');
            updated = updated.setFullDate('full');

            $('#lbl_Created').text(created);
            $('#lbl_Updated').text(updated);

            // Comments
            if (response.data.comments.length > 0) {
                var commentsList = $('.chat-application > .chats');
                $.each(response.data.comments, function (_, v) {
                    classWho = v.user != data.user_id ? 'chat-left' : '';

                    attachmentC = '';
                    if (v.attachments.length > 0) {
                        $.each(v.attachments, function (_, a) {
                            if (a.type == '2') {
                                attachmentC += '<div class="chat-content">' +
                                    '<div><audio controls>' +
                                    '<source src="'+a.path+'" type="audio/ogg">' +
                                    'Seu navegador não suporta reproduzir áudio' +
                                    '</audio></div>' +
                                    '<small>'+commentCreated+'</small>' +
                                    '</div>';
                            } else if (a.type == '1') {
                                attachmentC += '<div class="chat-content">' +
                                    '<div><img src="'+a.path+'" style="max-width: 80%;max-height: 80%;"></div>' +
                                    '<small>'+commentCreated+'</small>' +
                                    '</div>';
                            }
                        });
                    }

                    commentCreated = '-';
                    if (v.created_at != null) {
                        v.created_at = v.created_at.replace('T', ' ');
                        commentCreated = new Date(v.created_at);
                    }

                    commentCreated = commentCreated.setFullDate('full');
                    commentsList.append(
                        '<div class="chat '+classWho+'">' +
                        '<div class="chat-body">' +
                        '<div class="chat-content">' +
                        '<p>'+v.comment+'</p>' +
                        '<small>'+commentCreated+'</small>' +
                        '</div>' +
                        attachmentC +
                        '</div>' +
                        '</div>'
                    );
                });
            }
        }

        if (response.dweller != undefined) {
            $('#lbl_D_Name').text(response.dweller.name);
            $('#lbl_D_Document').text(response.dweller.document);

            if (response.dweller.addresses.length > 0)
                $('#lbl_D_Address').text(response.dweller.addresses[0].street + ', ' + response.dweller.addresses[0].number);

            if (response.dweller.contacts.length > 0) {
                $.each(response.dweller.contacts, function (_, v) {
                    $('#list_D_Contacts').append(
                        '<p>'+v.contact+'</p>'
                    );
                });
            }
        }
    });
});

$(document).on('listStatus', function (e, data) {
    data.ticket.listStatus(function (response) {
        if (response.data.length > 0) {
            $.each(response.data, function (_, v) {
                $('#dpl_Status').append(
                    '<option value="'+v.ticket_status_id+'">'+v.description+'</option>'
                );
            });
        }
    });
});

$('#btn_Change_Status').on('click', function (e) {
    e.preventDefault();

    var cookie = new Cookies();
    cookie.get('user_id', function (c) {
        var ticket = new Ticket(c.token);
        var ticketID = $("#txt_TicketID");
        var status = $('#dpl_Status');

        ticket.changeStatus(ticketID.val(), status.val(), function (response) {
            console.log(response);
            if (response.data != undefined) {
                $('#modal_Change_Status').modal('toggle');
                $.alertMessage('success', 'Status atualizado com sucesso. ');
            }
        });
    });
});

$('[data-open-modal]').on('click', function () {
    $('#' + $(this).attr('data-open-modal')).modal();
});