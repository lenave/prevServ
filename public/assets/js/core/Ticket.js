function Ticket(token) {

    this.token = token;
    this.error = new ErrorResponser();

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
            error: function(data) {
                self.error.error(data.status, data.responseJSON.error);
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
            error: function(data) {
                console.log(data);
                self.error.error(data.status, data.responseJSON.error);
            },
            complete: function() {
                $('body .overlay').remove();
            }
        });
    }

    this.storeComment = function(ticket, comment, appID, attachment, callback) {
        var self = this;

        $.ajax({
            url: window.API_URL + '/tickets/comment/' + ticket,
            type: 'POST',
            crossDomain: true,
            data: {
                app: appID,
                comment: comment,
                attachment: attachment,
            },
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", self.token);
                $('body').append('<div class="overlay"></div>');
            },
            success: function(data) {
                callback(data);
            },
            error: function(data) {
                console.log(data);
                self.error.error(data.status, data.responseJSON.error);
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
            error: function(data) {
                console.log(data);
                self.error.error(data.status, data.responseJSON.error);
            },
            complete: function() {
                //$('body .overlay').remove();
            }
        });
    }

    this.changeStatus = function(ticket, status, callback) {
        var self = this;

        $.ajax({
            url: window.API_URL + '/tickets/' + ticket,
            type: 'PUT',
            data: {status: status},
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", self.token);
            },
            success: function(data) {
                callback(data);
            },
            error: function(data) {
                console.log(data);
                self.error.error(data.status, data.responseJSON.error);
            }
        });
    }

    this.listStatus = function (callback) {
        var self = this;

        $.ajax({
            url: window.API_URL + '/tickets/status',
            type: 'GET',
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", self.token);
            },
            success: function(data) {
                callback(data);
            },
            error: function(data) {
                console.log(data);
                self.error.error(data.status, data.responseJSON.error);
            }
        });
    }

    this.buildComment = function (v, user_id, order) {
        var commentsList = $('.chat-application > .chats');

        classWho = v.user != user_id ? 'chat-left' : '';

        attachmentC = '';
        if (v.attachments != undefined) {
            if (v.attachments.length > 0) {
                $.each(v.attachments, function (_, a) {
                    commentCreated = '-';
                    if (a.created_at != null) {
                        a.created_at = a.created_at.replace('T', ' ');
                        commentCreated = new Date(a.created_at);
                        commentCreated = commentCreated.setFullDate('full');
                    }

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
        }

        commentCreated = '-';
        if (v.created_at != null) {
            v.created_at = v.created_at.replace('T', ' ');
            commentCreated = new Date(v.created_at);
            commentCreated = commentCreated.setFullDate('full');
        }


        if (order == 'prepend') {
            commentsList.prepend(
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
        } else {
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
        }

    }
}