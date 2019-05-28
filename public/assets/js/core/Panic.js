function Panic(token) {

    this.token = token;
    this.error = new ErrorResponser();

    this.index = function(app, callback) {
        var self = this;

        // Call ajax that do the login
        $.ajax({
            url: window.API_URL + '/panic/active',
            type: 'GET',
            data: {AppID: app},
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

    this.show = function(ticket, callback) {
        var self = this;

        // Call ajax that do the login
        $.ajax({
            url: window.API_URL + '/panic/localization/' + ticket,
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
    
    this.build = function (ticket, order = 'append') {
        var list = $('#panic_Alert_List');

        console.log(ticket);
        
        var card = '<div class="card pr-0 card-inline card-hover" data-href="/tickets/'+ticket.ticket_id+'" data-target="_blank" data-panic-id="'+ticket.ticket_id+'">' +
            '<div class="card-content">' +
            '<div class="card-body">' +
            '<div class="card-text">' +
            '<h3>Ticket #'+ticket.ticket_id+'</h3>' +
            '<p>'+ticket.name+'</p>' +
            '<a href="/tickets/'+ticket.ticket_id+'" target="_blank">Clique para ver mais <i class="mdi mdi-open-in-new"></i></a>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>'; 
        
        if (order === 'append')
            list.append(card);
        else if (order === 'prepend')
            list.prepend(card);
            
    }

    this.removeCard = function (ticket_id) {
        $('[data-panic-id='+ticket_id+']').remove();
    }
}