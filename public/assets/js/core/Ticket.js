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
}