function Ticket(token) {

    this.token = token;

    this.index = function(app, page, callback) {
        var self = this;

        // Call ajax that do the login
        $.ajax({
            url: window.API_URL + '/tickets/app/' + app + '?page=' + page,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", self.token);
                //$('body').append('<div class="overlay"></div>');
            },
            success: function(data) {
                callback(data);
            },
            error: function(dataError) {
                console.log(dataError);
                var response = {
                    'status': dataError.status,
                    'response': dataError.responseJSON
                };

                callback(response);
            },
            complete: function() {
                //$('body .overlay').remove();
            }
        });
    }

    this.store = function(ticket, callback, token, btn) {
        $.ajax({
            url: window.API_URL + '/tickets',
            type: 'POST',
            crossDomain: true,
            data: {
                ticket: ticket
            },
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", token);
                $('body').append('<div class="overlay"></div>');
            },
            success: function(data) {
                callback(data);
            },
            error: function(dataError) {
                console.log(dataError);
                var response = {
                    'status': dataError.status,
                    'response': dataError.responseJSON
                };

                callback(response);
            },
            complete: function() {
                $('body .overlay').remove();
            }
        });
    }

    this.storeComment = function(ticket, comment, attachment, callback, token, btn) {
        $.ajax({
            url: window.API_URL + '/tickets/comment/' + ticket,
            type: 'POST',
            crossDomain: true,
            data: {
                comment: comment,
                attachment: attachment,
            },
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", token);
                $('body').append('<div class="overlay"></div>');
            },
            success: function(data) {
                callback(data);
            },
            error: function(dataError) {
                console.log(dataError);
                var response = {
                    'status': dataError.status,
                    'response': dataError.responseJSON
                };

                callback(response);
            },
            complete: function() {
                $('body .overlay').remove();
            }
        });
    }

    this.show = function(ticket, callback) {
        var self = this;

        // Call ajax that do the login
        $.ajax({
            url: window.API_URL + '/tickets/show/' + ticket,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", self.token);
                //$('body').append('<div class="overlay"></div>');
            },
            success: function(data) {
                callback(data);
            },
            error: function(dataError) {
                console.log(dataError);
                var response = {
                    'status': dataError.status,
                    'response': dataError.responseJSON
                };

                callback(response);
            },
            complete: function() {
                //$('body .overlay').remove();
            }
        });
    }

    this.changeStatus = function(ticket, status, callback, token) {
        var self = this;

        $.ajax({
            url: window.API_URL + '/tickets/' + ticket,
            type: 'PUT',
            data: {status: status},
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", token);
            },
            success: function(data) {
                callback(data);
            },
            error: function(dataError) {
                console.log(dataError);
                var response = {
                    'status': dataError.status,
                    'response': dataError.responseJSON
                };

                callback(response);
            }
        });
    }

    this.buildTicket = function (ticketID, callback) {
        var storage = new Storage();
        var ticket = new Ticket();
        var dialog = new Dialog();

        ticket.show(ticketID,function(response) {
            console.log(response);
            if (response.response != undefined && response.response.error != undefined && response.response.error.code != 200) {
                if (response.response.code == 401) {
                    $(document).trigger('sessionEnd');
                } else {
                    dialog.alert(response.response.error.error, 'Ops', 'OK');
                }
            } else {
                if (response.data != undefined) {
                    $('#txt_Ticket_ID').val(response.data.ticket_id);
                    $('#ticket h1').text(response.data.name);
                    $('#lbl_Ticket_Name').text(response.data.name);

                    date = new Date(response.data.created_at);
                    d = date.formatDate('full');

                    $('#lbl_Ticket_Date').text(d);
                    $('#lbl_Ticket_Status').text(response.data._status.description);
                    $('#lbl_Ticket_Category').text(response.data._category.description);
                    $('#lbl_Ticket_Comments').text(response.data.comments.length + ' comentário(s)');
                    $('#lbl_Ticket_Description').text(response.data.description);

                    var list = $('#list_Comments');
                    list.find('li').remove();

                    if (response.data.status == '4' || response.data.status == '6') {
                        $('#btn_Cancel_Ticket').hide();
                    } else {
                        $('#btn_Cancel_Ticket').show();
                    }

                    if (response.data.comments.length > 0) {
                        $('#lbl_Comments_Empty').fadeOut();

                        $.each(response.data.comments, function(_, v) {
                            date = new Date(v.created_at);
                            d = date.formatDate('full');

                            who = v.user == storage.get('user') ? 'Eu' : 'Resposta';

                            attHTML = '';
                            if (v.attachments.length > 0) {
                                if (v.attachments[0].type == 2) {
                                    attHTML = '<br><div data-media-play="'+v.attachments[0].path+'" data-media-status="stopped" style="background-color: rgba(255,255,255,.1);-webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8px;position: relative;min-height: 90px;padding: 10px 25px;">\n' +
                                        '<div style="position: absolute;left: 0;padding: 0 15px;top: 0;bottom: 0;margin: auto;display: table;">\n' +
                                        '<button class="btn-rounded">\n' +
                                        '<i class="mdi mdi-play mdi-24px"></i>\n' +
                                        '</button>\n' +
                                        '</div>\n' +
                                        '<div style="padding-top: 10px;padding-left:80px;">\n' +
                                        '<p>Clique para reproduzir</p>\n' +
                                        '<small>E clique novamente para parar</small>\n' +
                                        '</div>\n' +
                                        '</div>';
                                } else if (v.attachments[0].type == 1) {
                                    attHTML = '<br><img src="'+v.attachments[0].path+'" style="max-with:100%;display:block;margin:auto;">';
                                }
                            }

                            list.append(
                                '<li class="collection-item collection-color">\
                                    <small>'+who+'</small>\
                                <p>'+v.comment+'</p>\
                                '+attHTML+'\
                                <span class="secondary-content">\
                                    <small>'+d+'</small>\
                                </span>\
                            </li>'
                            );
                        });
                    } else {
                        $('#lbl_Comments_Empty').fadeIn();
                    }

                } else {
                    dialog.alert('Erro ao mostrar o ticket. Entre em contato com o administrador.', 'Ops', 'OK');
                }
            }
        }, storage.get('token'));


        callback();
    }
}